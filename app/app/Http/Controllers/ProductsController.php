<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\Paginator;
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
    }

    public function getProduct($id)
    {
        return view('products.singleview')->with('product', $this->_productRepository->find($id));
    }

    public function postProductToFavorite(){
    }
}
