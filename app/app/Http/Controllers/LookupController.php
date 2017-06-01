<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function index ()
    {

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
                      $product = \App\Product::firstOrNew(['ean_code' => $value]);
                      // insert ean_code in products
                      if($product !=='')
                      {
                        $product->ean_code = $value;
                      }
                      else
                      {
                        echo 'Product already exists in our database!';
                        // exit;
                      }
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
                    //insert characteristic_id in characterizables if it doesn't exist
                    // $characteristic = \App\Characteristic::firstOrCreate(['name' => $key], ['values' => $value]);
                    $characteristic = \App\Characteristic::firstOrNew(['name' => $key], ['values' => $value]);
                    // $characteristic->name = $key;
                    // $characteristic->values = $value;
                    $characteristic->save();

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

        // $Characteristic->save();

        // Send an asynchronous request.
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });
        // $promise->wait();
    }
}
