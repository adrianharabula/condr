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
                if($key ==='images')
                {
                  // $key = record's number
                  // r = random number generated between 0 and count($value)
                  foreach ($value as $p => $q)
                  {
                    // print_r($p); -- number of the image
                    // print_r($q); -- url of the image
                      if($p === $r)
                      {
                        //insert image_url into products
                      }
                  }
                }
                else if ($key === 'offers')
                {
                  //insert into DB the offerers
                }
                else if ($key ==='color')
                {
                  //insert color into characteristics
                  //insert characteristic_id in products if it doesn't exist
                }
                else if ($key === 'size')
                {
                  //insert size into characteristics
                  //insert characteristic_id in products if it doesn't exist

                }
                else if ($key === 'dimension')
                {
                  //insert dimension into characteristics
                  //insert characteristic_id in products if it doesn't exist

                }
                else if ($key === 'weight')
                {
                  //insert weight into characteristics
                  //insert characteristic_id in products if it doesn't exist

                }
                else if ($key === 'currency')
                {
                  //insert currency into characteristics
                  //insert characteristic_id in products if it doesn't exist

                }
                else if ($key ==='ean')
                {
                      // insert ean_code in products
                      // print_r($key);
                      // echo '-->';
                      // print_r($value);
                }
                else if ($key === 'title')
                {
                  // insert name in products

                }else if ($key === 'description')
                {
                  // insert description in products

                }
                else if ($key ==='upc')
                {
                  // insert upc_code in products

                }
                else if ($key === 'brand')
                {
                  // insert brand in products

                }
                else if ($key === 'lowest_recorded_price')
                {
                  //insert lowest_price into products

                }
            }
        }

        // update number of view in products!!!

        //insert category "none" if the user doesn't specify it 


        // Send an asynchronous request.
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });
        // $promise->wait();
    }
}
