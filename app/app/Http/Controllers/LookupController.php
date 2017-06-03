<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function addProduct ()
    {

        // use each $id one time to add products to database

        // $id = '0693804125002'; // dog biscuits
        $id = '0885909918188'; // macbook pro
        // $id = '0752203039690'; //coca cola
        // $id = '0611269426724'; //red bull
        // $id = '0715660702828'; //iphone 6
        // $id = '0635753611328'; //samsung black toner

        $client = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $request = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup', ['query' => 'upc='.$id]);
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
                      if($product ==='')
                      {
                        $product->ean_code = $value;
                      }
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
                    $characteristic_name = \App\Characteristic::firstOrNew(['name' => $key]);
                    // $characteristic_values = \App\Characteristic::firstOrNew(['values' => $value]);

                    if($characteristic_name === '')
                    {
                      $characteristic->name = $key;
                      $characteristic->values = $value;
                      $characteristic->save();
                    }
                  }
                  else if ($key === 'offers')
                  {
                    //insert into DB the offerers
                    foreach($value as $i => $offer)
                    {
                        // $i = item's number
                        foreach ($offer as $name => $val)
                        {
                          if ($name ==='merchant')
                          {
                              $offerer = \App\Offerer::firstOrNew(['name' => $val]);
                              if($offerer ==='')
                              {
                                $offerer->name = $val;
                              }
                          }
                          else if ($name === 'domain')
                          {
                            $offerer->domain = $val;
                          }
                          else if ($name === 'price')
                          {
                            $offerer->price = $val;
                          }
                          else if ($name === 'shipping')
                          {
                            $offerer->shipping = $val;
                          }
                          else if ($name === 'condition')
                          {
                            $offerer->condition = $val;
                          }
                          else if ($name === 'availability')
                          {
                            $offerer->availability = $val;
                          }
                          else if ($name === 'link')
                          {
                            $offerer->link = $val;
                          }
                          $offerer->save();
                        }
                    }
                  }
            }
        }

        // update number of views in products
        $product->views = '1';

        //insert category "none" if the user doesn't specify it

        $product->category_id = '9';

        $product->save();

    }
}
