<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function addProduct(Request $request)
    {

        // use each $id one time to add products to database
        // $id = '0693804125002'; // dog biscuits
        // $id = '0885909918188'; // macbook pro
        // $id = '0885909918188'; // macbook pro
        // $id = '0752203039690'; // coca cola
        // $id = '0611269426724'; // red bull
        // $id = '0715660702828'; // iphone 6
        // $id = '0635753611328'; // samsung black toner

        $upc_codes = ['0693804125002','0885909918188','0752203039690','0611269426724','0715660702828','0635753611328','825633402287','801248078604','887276076652','022548313527','664911502208', 
         '755179023922','629227426372','886227369225','613902913806','883349738281','712392149204', 
         '715757399610','679113203457','760194188471','842217116781','766288179462','846137014325' 
         , '700580389259','006162240155','815442014887','641427613871', '641427613871','641427614229' 
         '793573434210','309975963069','797734581904','846137038383','844541073853','740614980137', 
         '011543602620','050000314744','811369000026','811369000095','888327036083','886059376255']; 
               
        
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
}
