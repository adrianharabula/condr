<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26.05.2017
 * Time: 22:05
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserProductsController extends Controller
{
    private $_userRepository;

    public function __construct(UserRepository $_userRepository)
    {
        $this->_userRepository = $_userRepository;
    }

    public function addFavoriteProduct(Request $request)
    {
        $response = $this->_userRepository->addFavoriteProduct($request->id);

        if ($response) {
            request()->session()->flash('message', 'Product saved for later use!');
        } else {
            request()->session()->flash('message', 'Product aleardy in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->route('my.products.listproducts');
    }

    public function deleteFavoriteProduct(Request $request)
    {
        $response = $this->_userRepository->deleteFavoriteProduct($request->id);

        if ($response) {
            request()->session()->flash('message', 'Product deleted from your history!');
        } else {
            request()->session()->flash('message', 'Product not in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->route('my.products.listproducts');
    }

    public function getFavoriteProducts()
    {
        return view('user.favorited-products')->with('products', $this->_userRepository->getUserFavoriteProducts());
    }
}
