<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Auth;
use \App\Product as Product;

class MyProductsController extends Controller
{

    /**
     * @var \App\Repositories\ProductRepository
     */
    private $_productRepository;


    /**
     * MyProductsController constructor.
     *
     * @param \App\Repositories\ProductRepository $_productRepository
     */
    public function __construct(ProductRepository $_productRepository)
    {
        $this->_productRepository = $_productRepository;
        $this->middleware('auth');
    }


    function index()
    {
        $user = Auth::user();
        // return $user->products;
        return view('myproducts')->with('user', $user);
    }

    function delete(Product $product, Request $request)
    {
        Auth::user()->products()->detach($product);
        $request->session()->flash('message', 'You have deleted this product from your history!');
        return redirect()->route('viewproduct', ['id' => $product->id]);
    }

    function store(Product $product, Request $request)
    {
        Auth::user()->products()->syncWithoutDetaching($product);
        $request->session()->flash('message', 'You have added this product to your history!');
        return redirect()->route('viewproduct', ['id' => $product->id]);
    }
}
