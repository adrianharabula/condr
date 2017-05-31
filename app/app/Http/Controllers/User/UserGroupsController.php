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

class UserGroupsController extends Controller
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

    public function addFavoriteGroup(Request $request)
    {
        $this->_userRepository->addFavoriteGroup($request->id);
        return redirect()->route('my.groups.listgroups');
    }

    public function deleteFavoriteGroup(Request $request)
    {
        $this->_userRepository->deleteFavoriteGroup($request->id);
        return redirect()->route('my.groups.listgroups');
    }

    public function getFavoriteGroups()
    {
        return view('user.favorited-groups')->with('groups', $this->_userRepository->getUserFavoritesGroups());
    }
}
