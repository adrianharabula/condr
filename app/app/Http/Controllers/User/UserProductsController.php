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

    /**
     * @var \App\Repositories\UserRepository
     */
    private $_userRepository;


    /**
     * UserProductsController constructor.
     *
     * @param \App\Repositories\UserRepository $_userRepository
     */
    public function __construct(UserRepository $_userRepository)
    {
        $this->_userRepository = $_userRepository;
    }

    public function addFavoriteProduct(Request $request)
    {
        $this->_userRepository->addFavoriteProduct($request->id);
        return redirect()->route('my.products.listproducts');
    }

    public function deleteFavoriteProduct(Request $request)
    {
        $this->_userRepository->deleteFavoriteProduct($request->id);
        return redirect()->route('my.products.listproducts');
    }

    public function getFavoriteProducts()
    {
        return view('user.favorited-products')->with('products', $this->_userRepository->getUserFavorites());
    }
}