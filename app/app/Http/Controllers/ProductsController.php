<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProductSearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Pagination\Paginator;
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
//     // function viewProduct(Products $products, Characteristics $cr)
//     // {
//     //     $crv = $cr->values($products);
//     //     return view('products')->with('products', $products)
//     //                           ->with('crv', $crv);
//     // }
//     // function search(Request $request)
//     // {
//     //     $name = $request->product_name;
//     //     $products = Product::search($name)->get();
//     //     return view('products')->with('products', $products);
//     // }
//     // function store(Product $products, Request $request)
//     // {
//     //     Auth::user()->products()->syncWithoutDetaching($products);
//     //     $request->session()->flash('status', 'You have added this products to your history!');
//     //     return redirect()->route('viewproduct', ['id' => $products->id]);
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
        // TODO: add paginate here
        return view('products.listproducts')
            ->with('products', $this->_productRepository->searchProducts($data));
    }
    public function getProduct($id){
        //$x = $this->_productRepository->find($id);
        //$z = $x->characteristics()->first();
        //$f = $z->votes()->get();
        //
        //    dd($x,$z,$f);
        //dd('wrong seed relation');
        return view('products.singleview')->with('product', $this->_productRepository->find($id));
    }
    public function postProductToFavorite(){
    }
}
