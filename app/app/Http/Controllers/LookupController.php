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
        $request = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup?upc=752203011184');
        $res = $request->getBody();

        $data = json_decode($res, true);
        $items = $data['items'];
        // print_r($items);

        foreach($items as $k => $v) {
            // echo $k . '<br>';
            foreach ($v as $key => $value) {
              if($key ==='images')
              {
                echo '<br />';
                print_r($key);
                foreach ($value as $p => $q)
                {
                    echo '<br />';
                    print_r($p);
                    echo '--->';
                    print_r($q);
                }
              }
              else if ($key !== 'offers')
              {
                    echo '<br />';
                    print_r($key);
                    echo '--->';
                    print_r($value);
              }
            }
        }
        // Send an asynchronous request.
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });
        // $promise->wait();
    }
}
