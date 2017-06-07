<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\Paginator;
use App\Http\Controllers\LookupController;
use Auth;

class ProductsController extends Controller
{
    protected $_productRepository;

    public function __construct(ProductRepository $_productRepository)
    {
        $this->_productRepository = $_productRepository;
    }

    public function getProductsList(ProductSearchRequest $data)
    {
        // TODO: add paginate here
        return view('products.listproducts')
            ->with('products', $this->_productRepository->searchProducts($data));
        // return view('products.listproducts')->with('products',$products);
    }

    public function getProduct($id)
    {
        $product = $this->_productRepository->find($id);
        $product->increment('views');
        return view('products.singleview')->with('product', $product);
    }

    public function addProduct()
    {
        return view('products.add');
    }

    public function submitAddProduct(Request $request)
    {
          // call the controller directly
        //   $new_request = new Request;
        //   $new_request->upc_code = $request->barcode;
          $id = app('App\Http\Controllers\LookupController')->addProduct($request);
          return redirect()->route('products.singleview', $id);
          // return view('products.listproducts')->with('product', $this->_productRepository->find($id));
    }
}
