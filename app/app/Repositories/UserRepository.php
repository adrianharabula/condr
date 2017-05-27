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

    public function toggleFavoriteProduct($productId)
    {
        $productFavored = auth()->user()->products->where('id', $productId)->first();
        if ($productFavored) {
            auth()->user()->products()->detach($productId);
            request()->session()->flash('message', 'You have deleted this product from your history!');
        } else {
            auth()->user()->products()->syncWithoutDetaching($productId);
            request()->session()->flash('message', 'You have added this product to your history!');
        }

        return true;
    }

    public function getUserFavorites($userId = null)
    {
        $user = $this->getUser($userId);

        return $user->products;
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