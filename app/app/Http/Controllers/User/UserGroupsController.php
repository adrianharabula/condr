<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 26.05.2017
 * Time: 22:05
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
    private $_groupRepository;

    public function __construct(GroupRepository $_groupRepository)
    {
        $this->_groupRepository = $_groupRepository;
    }

    public function addFavoriteGroup(Request $request)
    {
        $this->_groupRepository->addFavoriteGroup($request->id);
        return redirect()->route('my.groups.listgroups');
    }

    public function deleteFavoriteGroup(Request $request)
    {
        $this->_groupRepository->deleteFavoriteGroup($request->id);
        return redirect()->route('my.groups.listgroups');
    }

    public function getFavoriteGroups()
    {
        return view('user.favorite-groups')->with('groups', $this->_groupRepository->getUserFavoriteGroups());
    }
}
