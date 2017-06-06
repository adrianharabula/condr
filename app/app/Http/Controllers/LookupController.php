<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function addProduct(Request $request)
    {        
        $client = new \GuzzleHttp\Client(array(
            'curl' => array(
                CURLOPT_SSL_VERIFYPEER => env('CURLOPT_SSL_VERIFYPEER') ,
            ) ,
        ));

        $request = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup', ['query' => 'upc=' . $request->upc_code]);
        $res = $request->getBody();
        $data = json_decode($res, true);
        $items = $data['items'];

        // print_r($items);

        foreach($items as $item)
        {
            $product = \App\Product::firstOrNew(['ean_code' => $item['ean']]);
            $product->name = $item['title'];
            $product->brand = $item['brand'];
            $product->description = $item['description'];
            $product->lowest_recorded_price = $item['lowest_recorded_price'];

            // check if an array of images exists first
            // fix for https://github.com/adrianharabula/condr/issues/169

            if ($item['images'])
            {
                $product->image_url = $item['images'][0];
            }

            // insert category "none" if the user doesn't specify it

            $product->category_id = '9';
            $product->save();
            if ($item['color'])
            {
                $cistic = \App\Characteristic::firstOrCreate(['name' => 'color']);

                // alternative way of inserting custom data into pivot
                // $pivot_data = ['cvalue' => $item['color']];
                // $data_to_sync[$product->id] = $pivot_data;
                // $cistic->products()->syncWithoutDetaching($data_to_sync);

                $cistic->products()->syncWithoutDetaching([$product->id => ['cvalue' => $item['color']]]);
                $cistic->save();
            }

            if ($item['size'])
            {
                $cistic = \App\Characteristic::firstOrCreate(['name' => 'size']);
                $cistic->products()->syncWithoutDetaching([$product->id => ['cvalue' => $item['size']]]);
                $cistic->save();
            }

            if ($item['dimension'])
            {
                $cistic = \App\Characteristic::firstOrCreate(['name' => 'dimension']);
                $cistic->products()->syncWithoutDetaching([$product->id => ['cvalue' => $item['dimension']]]);
                $cistic->save();
            }

            if ($item['weight'])
            {
                $cistic = \App\Characteristic::firstOrCreate(['name' => 'weight']);
                $cistic->products()->syncWithoutDetaching([$product->id => ['cvalue' => $item['weight']]]);
                $cistic->save();
            }

            foreach($item['offers'] as $offer)
            {
                $offer_model = \App\Offer::firstOrNew(['merchant' => $offer['merchant'], 'product_id' => $product->id]);
                $offer_model->domain = $offer['domain'];
                $offer_model->title = $offer['title'];
                $offer_model->currency = $offer['currency'];
                $offer_model->price = $offer['price'];
                $offer_model->shipping = $offer['shipping'];
                $offer_model->condition = $offer['condition'];
                $offer_model->availability = $offer['availability'];
                $offer_model->shop_link = $offer['link'];
                $offer_model->remote_updated_at = $offer['updated_t'];
                // associate offer with product
                $offer_model->product()->associate($product);
                $offer_model->save();
            }
        }
    }

    public function populateProducts()
    {
            $upc_codes = array();
            $upc_codes[] = '0693804125002'; // dog biscuits
            $upc_codes[] = '0885909918188'; // macbook pro
            $upc_codes[] = '0752203039690'; // coca cola
            $upc_codes[] = '0611269426724'; // red bull
            $upc_codes[] = '0715660702828'; // iphone 6
            $upc_codes[] = '0635753611328'; // samsung black toner
            $upc_codes[] = '0693804125002';
            $upc_codes[] = '0885909918188';
            $upc_codes[] = '0752203039690';
            $upc_codes[] = '0611269426724';
            $upc_codes[] = '0715660702828';
            $upc_codes[] = '0635753611328';
            $upc_codes[] = '0755179023922';
            $upc_codes[] = '0801248078604';
            $upc_codes[] = '0629227426372';
            $upc_codes[] = '0886227369225';
            $upc_codes[] = '0613902913806';
            $upc_codes[] = '0883349738281';
            $upc_codes[] = '0712392149204';
            $upc_codes[] = '0715757399610';
            $upc_codes[] = '0679113203457';
            $upc_codes[] = '0760194188471';
            $upc_codes[] = '0842217116781';
            $upc_codes[] = '0766288179462';
            $upc_codes[] = '0846137014325';
            $upc_codes[] = '0700580389259';
            $upc_codes[] = '0006162240155';
            $upc_codes[] = '0815442014887';
            $upc_codes[] = '0641427613871';
            $upc_codes[] = '0641427614229';
            $upc_codes[] = '0793573434210';
            $upc_codes[] = '0309975963069';
            $upc_codes[] = '0797734581904';
            $upc_codes[] = '0846137038383';
            $upc_codes[] = '0844541073853';
            $upc_codes[] = '0740614980137';
            $upc_codes[] = '0011543602620';
            $upc_codes[] = '0050000314744';
            $upc_codes[] = '0811369000026';
            $upc_codes[] = '0811369000095';
            $upc_codes[] = '0888327036083';
            $upc_codes[] = '0886059376255';

            foreach($upc_codes as $upc) {
                // create a new request
                $request = new Request;
                $request->upc_code = $upc;

                // call the controller directly
                $this->addProduct($request);

                // sleep a bit, don't flood the api
                sleep(1);
            }
    }
}
