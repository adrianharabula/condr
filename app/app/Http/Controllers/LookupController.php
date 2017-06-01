<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function index ()
    {
        $product = new \App\Product;
        $characteristic = new \App\Characteristic;

        $client = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $request = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup?upc=0885909918188');
        $res = $request->getBody();

        $data = json_decode($res, true);
        $items = $data['items'];
        // print_r($items);

        foreach($items as $k => $item)
        {
            // $k = item's number
            foreach ($item as $key => $value)
            {
                if ($key ==='ean')
                {
                    // insert ean_code in products
                    $product->ean_code = $value;
                    // print_r($key);
                    // echo '-->';
                    // print_r($value);
                }
                else if ($key === 'title')
                {
                  // insert name in products
                  $product->name = $value;

                }
                else if ($key === 'description')
                {
                  // insert description in products
                  $product->description = $value;

                }
                else if ($key ==='upc')
                {
                  // insert upc_code in products
                  $product->upc_code = $value;

                }
                else if ($key === 'brand')
                {
                  // insert brand in products
                  $product->brand = $value;

                }
                else if ($key === 'lowest_recorded_price')
                {
                  //insert lowest_price into products
                  $product->lowest_price = $value;

                }
                else if($key ==='images')
                {
                  // $key = record's numbe
                  $product->image_url = $value[0];
                }
                else if ($key ==='color' || $key === 'size' || $key === 'dimension' || $key === 'weight' || $key === 'currency')
                {
                  //insert color into characteristics
                  //insert characteristic_id in products if it doesn't exist
                  // $characteristic = \App\Characteristic::firstOrCreate(['name' => $key], ['values' => $value]);
                  $characteristic->name = $key;
                  $characteristic->values = $value;
                }
                else if ($key === 'offers')
                {
                  //insert into DB the offerers
                }
            }
        }

        // update number of view in products!!!

        //insert category "none" if the user doesn't specify it
        $product->category_id = '1';
        $product->save();
        $characteristic->save();

        // $Characteristic->save();

        // Send an asynchronous request.
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });
        // $promise->wait();
    }
}
