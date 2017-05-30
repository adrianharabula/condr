<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26.05.2017
 * Time: 22:11
 */

namespace App\Repositories;

use App\Repositories\Eloquent\EloquentRepository;
use App\User;

class UserRepository extends EloquentRepository
{

    /**
     * @var \App\Repositories\ProductRepository
     */
    private $_productRepository;


    /**
     * UserRepository constructor.
     *
     * @param \App\Repositories\ProductRepository $_productRepository
     */
    public function __construct(ProductRepository $_productRepository)
    {
        $this->_productRepository = $_productRepository;
    }

    public function getModel()
    {
        return User::class;
    }

    public function addFavoriteProduct($productId)
    {
        $productFavored = auth()->user()->products->where('id', $productId)->first();
        if (!$productFavored) {
            auth()->user()->products()->syncWithoutDetaching($productId);
            request()->session()->flash('message', 'Product saved for later use!');
        } else {
            auth()->user()->products()->syncWithoutDetaching($productId);
            request()->session()->flash('message', 'Product aleardy in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;
    }

    public function deleteFavoriteProduct($productId)
    {
        $productFavored = auth()->user()->products->where('id', $productId)->first();
        if($productFavored) {
            auth()->user()->products()->detach($productId);
            request()->session()->flash('message', 'Product deleted from your history!');
        } else {
            request()->session()->flash('message', 'Product not in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;

    }

    public function getUserFavorites($userId = null)
    {
        return $this->getUser($userId)->products;
    }

    private function getUser($userId = null)
    {
        if ($userId) {
            $user = $this->_model->find($userId);
        } else {
            $user = auth()->user();
        }

        return $user;
    }
}