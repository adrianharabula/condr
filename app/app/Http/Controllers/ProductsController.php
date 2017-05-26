<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Auth;

// class ProductsController extends Controller
// {
//     private $_productRepository;

//     public function __construct(ProductRepository $products)
//     {
//            parent::__construct();

//         $this->_productRepository = $products;
//     }

//     public function index()
//     {
//         $x = $this->_productRepository;
//         dd($x);
//         return view('products')->with('products', $this->_productRepository->getAll());
//     }

//     // function viewProduct(Products $product, Characteristics $cr)
//     // {
//     //     $crv = $cr->values($product);
//     //     return view('product')->with('product', $product)
//     //                           ->with('crv', $crv);
//     // }

//     // function search(Request $request)
//     // {
//     //     $name = $request->product_name;
//     //     $products = Product::search($name)->get();
//     //     return view('products')->with('products', $products);
//     // }

//     // function store(Product $product, Request $request)
//     // {
//     //     Auth::user()->products()->syncWithoutDetaching($product);
//     //     $request->session()->flash('status', 'You have added this product to your history!');
//     //     return redirect()->route('viewproduct', ['id' => $product->id]);
//     // }
// }


class ProductsController extends Controller
{

    protected $_productRepository;

    public function __construct(ProductRepository $_productRepository){
        $this->_productRepository = $_productRepository;
    }
    public function getProductsList(ProductSearchRequest $data)
    {
        return view('product.list')
            ->with('products',$this->_productRepository->searchProducts($data));
    }
    public function getProduct($id){
        return view('product.view')->with('dataProduct',$this->_productRepository->findProduct($id));
    }
    public function postProductToFavorite(){

    }
}
