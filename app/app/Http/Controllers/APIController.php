<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use \App\Characteristic as Characteristic;
use \App\Product as Product;

class APIController extends Controller
{
    // get all groups
    public function getGroups()
    {
        $groups = \App\Condrgroup::all();
        // if no group found show error
        if (!$groups)
            return response()->json([
                'data' => [
                    'message' => 'No groups found.',
                    'status_code' => '404'
                ]
            ]);

        // return groups array
        return response()->json($groups);
    }

    // get all categories
    public function getCategories()
    {
        $categories = \App\Category::all();

        // if no group found show error
        if (!$categories)
            return response()->json([
                'data' => [
                    'message' => 'No categories found.',
                    'status_code' => '404'
                ]
            ]);

        // return groups array
        return response()->json($categories);
    }

}
