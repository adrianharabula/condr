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

    /**
      * Favorite products functions
      * 
      **/
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
        if ($this->existsUserFavoriteProduct($productId, $userId))
            return false;

        $this->attachUserFavoriteProduct($productId, $userId);
        
        return true;
    }

    public function deleteFavoriteProduct($productId, $userId = null)
    {
        if (!$this->existsUserFavoriteProduct($productId, $userId))
            return false;
        
        $this->detachUserFavoriteProduct($productId, $userId);

        return true;
    }

    /**
      * Favorite groups functions
      * 
      **/

    public function getUserFavoriteGroups($userId = null)
    {
        return $this->getUser($userId)->groups;
    }

    public function attachUserFavoriteGroup($groupId, $userId = null)
    {
        $this->getUser($userId)->groups()->syncWithoutDetaching($groupId);
    }

    public function detachUserFavoriteGroup($groupId, $userId = null)
    {
        $this->getUser($userId)->groups()->detach($groupId);
    }

    public function existsUserFavoriteGroup($groupId, $userId = null)
    {
        return $this->getUserFavoriteGroups($userId)->contains($groupId);
    }

    public function addFavoriteGroup($groupId, $userId = null)
    {
        if ($this->existsUserFavoriteGroup($groupId, $userId))
            return false;

        $this->attachUserFavoriteGroup($groupId, $userId);
        
        return true;
    }

    public function deleteFavoriteGroup($groupId, $userId = null)
    {
        if (!$this->existsUserFavoriteGroup($groupId, $userId))
            return false;
        
        $this->detachUserFavoriteGroup($groupId, $userId);

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
