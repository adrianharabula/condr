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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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
        return view('user.favorite-preferences-add');
    }

    public function submitAddFavoritePreferenceByYourself(Request $request)
    {
        $str = explode(":", $request->preference_name);

        $characteristic = \App\Characteristic::firstOrCreate(['name' => $str[0]]);
        $characteristic->save();

        Auth::user()->characteristics()->syncWithoutDetaching([$characteristic->id => ['cvalue' => $str[1]]]);

        return view('user.favorite-preferences')->with('preferences', $this->_userRepository->getUserFavoritesPreferences());
    }

    public function getFavoritePreferences()
    {
        return view('user.favorite-preferences')->with('preferences', $this->_userRepository->getUserFavoritesPreferences());
    }

    public function searchByFavoritePreferences()
    {
      $datas = Input::get('preferences_name');
      // print_r($datas);
      foreach ($datas as $data)
      {
          $str = explode(":", $data);
          $name = $str[0];
          $value = $str[1];

          if ($name!='' && $value !='')
          {
            $products = DB::table('products')
            ->select(DB::raw("*"))
            ->where('name', 'LIKE','%'.$name.'%')
            ->orWhere('description', 'LIKE','%'.$name.'%')
            ->orWhere('name', 'LIKE','%'.$value.'%')
            ->orWhere('description', 'LIKE','%'.$value.'%')
            ->get();
          }
          // print_r($result);
      }

      return view('products.listproducts')
            ->with('products', $products);
    }
}
