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
    private $_productRepository;
    private $_groupRepository;
    // private $_preferenceRepository;

    public function __construct(GroupRepository $_groupRepository, ProductRepository $_productRepository)
    {
        $this->_groupRepository = $_groupRepository;
        $this->_productRepository = $_productRepository;
        // $this->_preferenceRepository = $_preferenceRepository;
    }

    public function getModel()
    {
        return User::class;
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

    /*
     * Favorite products functions
     */
    public function getUserFavoriteProducts($userId = null)
    {
        return $this->getUser($userId)->products;
    }

    public function attachUserFavoriteProduct($productId, $userId = null)
    {
        $this->getUser($userId)->products()->syncWithoutDetaching($productId);
    }

    public function detachUserFavoriteProduct($productId, $userId = null)
    {
        $this->getUser($userId)->products()->detach($productId);
    }

    public function existsUserFavoriteProduct($productId, $userId = null)
    {
        return $this->getUserFavoriteProducts($userId)->contains($productId);
    }

    public function addFavoriteProduct($productId, $userId = null)
    {
        if (!$this->existsUserFavoriteProduct($productId, $userId)) {
            $this->attachUserFavoriteProduct($productId, $userId);
            request()->session()->flash('message', 'Product saved for later use!');
        } else {
            request()->session()->flash('message', 'Product aleardy in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;
    }

    public function deleteFavoriteProduct($productId, $userId = null)
    {
        if ($this->existsUserFavoriteProduct($productId, $userId)) {
            $this->detachUserFavoriteProduct($productId, $userId);
            request()->session()->flash('message', 'Product deleted from your history!');
        } else {
            request()->session()->flash('message', 'Product not in your basket!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;
    }

    public function getUserFavoriteGroups($userId = null)
    {
        return $this->getUser($userId)->groups;
    }

    public function addFavoriteGroup($groupId)
    {
        $groupFavored = auth()->user()->groups->where('id', $groupId)->first();
        if (!$groupFavored) {
            auth()->user()->groups()->syncWithoutDetaching($groupId);
            request()->session()->flash('message', 'You have registered the group succesfully!');
        } else {
            auth()->user()->groups()->syncWithoutDetaching($groupId);
            request()->session()->flash('message', 'You are aleardy registered in the group!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;
    }

    public function deleteFavoriteGroup($groupId)
    {
        $groupFavored = auth()->user()->groups->where('id', $groupId)->first();
        if($groupFavored) {
            auth()->user()->groups()->detach($groupId);
            request()->session()->flash('message', 'You have unregistered the group!');
        } else {
            request()->session()->flash('message', 'You are not registered to the group!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return true;
    }

    // public function deleteFavoritePreference($preferenceId)
    // {
    //     $preferenceFavored = auth()->user()->characteristics->where('id', $preferenceId)->first();
    //     if($preferenceFavored) {
    //         auth()->user()->characteristics()->detach($preferenceId);
    //         request()->session()->flash('message', 'You have deleted this characteristic from your preferences!');
    //     } else {
    //         request()->session()->flash('message', 'This characteristic is not added to your preferences!');
    //         request()->session()->flash('alert-class', 'alert-danger');
    //     }

    //     return true;
    // }

    // public function addFavoritePreference($preferenceId)
    // {
    //     $preferenceFavored = auth()->user()->characteristics->where('id', $preferenceId)->first();
    //     if (!$preferenceFavored) {
    //         auth()->user()->characteristics()->syncWithoutDetaching($preferenceId);
    //         request()->session()->flash('message', 'Preference saved for later use!');
    //     } else {
    //         auth()->user()->characteristics()->syncWithoutDetaching($preferenceId);
    //         request()->session()->flash('message', 'Preference already added to your list!');
    //         request()->session()->flash('alert-class', 'alert-danger');
    //     }

    //     return true;
    // }

    // public function getUserFavoritesPreferences($userId = null)
    // {
    //     return $this->getUser($userId)->characteristics;
    // }
}
