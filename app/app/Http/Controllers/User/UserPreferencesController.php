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
use Auth;

class UserPreferencesController extends Controller
{
    private $_userRepository;

    public function __construct(UserRepository $_userRepository)
    {
        $this->_userRepository = $_userRepository;
    }

    public function addFavoritePreferenceByYourself()
    {
        // $this->_userRepository->addFavoritePreference($request->id);
        return view('user.favorite-preferences-add');
    }

    public function submitAddFavoritePreferenceByYourself(Request $request)
    {
        $str = explode(":", $request->preference_name);
        // print_r($str[0]); //nume
        // print_r($str[1]); //valoarea

        $characteristic = \App\Characteristic::firstOrCreate(['name' => $str[0]]);
        $characteristic->save();

        Auth::user()->characteristics()->syncWithoutDetaching([$characteristic->id => ['cvalue' => $str[1]]]);

        return view('user.favorite-preferences')->with('preferences', $this->_userRepository->getUserFavoritesPreferences());
    }

    public function getFavoritePreferences()
    {
        return view('user.favorite-preferences')->with('preferences', $this->_userRepository->getUserFavoritesPreferences());
    }
}
