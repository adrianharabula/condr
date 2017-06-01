<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class LookupController extends Controller
{
    public function index ()
    {
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //
        // $client = new Client(['base_uri' => 'https://api.upcitemdb.com/prod/trial/lookup']);
        // $response = $client->get('?upc=885909918188');
        // $data = $response->getBody();
        // $data = json_decode($data, true);

        // $client = new Client();
        // $client->setDefaultOption('verify', false);
        // $response = $client->request('GET', 'https://api.upcitemdb.com/prod/trial/lookup?upc=885909918188');
        // $data = $response->getBody();
        // $data = json_decode($data, true);
        // print_r($data);

        // print_r($data);
        // $client = new Client(['base_uri' => 'http://pokeapi.co/api/v1/']);
        // $response = $client->get('pokedex/1');
        // $data = $response->getBody();
        // $data = json_decode($data, true);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        echo $res->getStatusCode();
        // 200
        echo $res->getHeaderLine('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // '{"id": 1420053, "name": "guzzle", ...}'

        // Send an asynchronous request.
        // $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        // $promise = $client->sendAsync($request)->then(function ($response) {
        //     echo 'I completed! ' . $response->getBody();
        // });
        // $promise->wait();
    }
}
