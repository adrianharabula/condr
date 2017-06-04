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
    private $_userRepository;

    public function __construct(UserRepository $_userRepository)
    {
        $this->_userRepository = $_userRepository;
    }

    public function addFavoriteGroup(Request $request)
    {
        $response = $this->_userRepository->addFavoriteGroup($request->id);
        
        if ($response) {
            request()->session()->flash('message', 'You have registered the group succesfully!');
        } else {
            request()->session()->flash('message', 'You are aleardy registered in the group!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->route('my.groups.listgroups');
    }

    public function deleteFavoriteGroup(Request $request)
    {
        $response = $this->_userRepository->deleteFavoriteGroup($request->id);

        if ($response) {
            request()->session()->flash('message', 'You have unregistered the group!');
        } else {
            request()->session()->flash('message', 'You are not registered to the group!');
            request()->session()->flash('alert-class', 'alert-danger');
        }

        return redirect()->route('my.groups.listgroups');
    }

    public function getFavoriteGroups()
    {
        return view('user.favorite-groups')->with('groups', $this->_userRepository->getUserFavoriteGroups());
    }
}
