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


    public function postToggleFavoriteProduct($id)
    {
        $this->_userRepository->toggleFavoriteProduct($id);

        return redirect()->route('myProducts.list');
    }


    public function getFavoriteProducts()
    {
        return view('user.favorites-products')->with('products', $this->_userRepository->getUserFavorites());
    }
}