<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Pagination\Paginator;
use \App\Product as Product;
use Auth;

class ProductsController extends Controller
{
    function index()
    {
        //$products = Product::all();
        $products = Product::paginate(5);
        return view('products')->with('products',$products);
    }

    function viewProduct(Product $product)
    {
        return view('viewProduct')->with('product', $product);
    }

    function search(Request $request)
    {
        $name = $request->product_name;
        $products = Product::search($name)->get();
        return view('products')->with('products', $products);
    }

    function store(Product $product, Request $request)
    {
        Auth::user()->products()->syncWithoutDetaching($product);
        $request->session()->flash('status', 'You have added this product to your history!');
        return redirect()->route('viewproduct', ['id' => $product->id]);
    }
}
