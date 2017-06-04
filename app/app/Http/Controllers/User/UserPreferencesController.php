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

class UserPreferencesController extends Controller
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

    public function addFavoritePreference(Request $request)
    {
        $this->_userRepository->addFavoritePreference($request->id);
        return redirect()->route('my.preferences.listpreferences');
    }

    public function addFavoritePreferenceByYourself()
    {
        // $this->_userRepository->addFavoritePreference($request->id);
        return view('user.favorite-preferences-add');
    }

    public function deleteFavoritePreference(Request $request)
    {
        $this->_userRepository->deleteFavoritePreference($request->id);
        return redirect()->route('my.preferences.listpreferences');
    }

    public function getFavoritePreferences()
    {
        return view('user.favorite-preferences')->with('preferences', $this->_userRepository->getUserFavoritesPreferences());
    }
}
