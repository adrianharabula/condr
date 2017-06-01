<?php

namespace App\Http\Controllers;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use \App\Condrgroup as Group;

class MyGroupsController extends Controller
{
        /**
     * @var \App\Repositories\GroupRepository
     */
    private $_groupRepository;


    /**
     * MyGroupsController constructor.
     *
     * @param \App\Repositories\ProductRepository $_groupRepository
     */
    public function __construct(GroupRepository $_groupRepository)
    {
        $this->_groupRepository = $_groupRepository;
        $this->middleware('auth');
    }

    function index()
    {
        $user = Auth::user();
        $groups = $user->groups;
        return view('mygroups')->with('user', $user)
                                ->with('groups', $groups);
    }

    function delete(Group $group, Request $request)
    {
        Auth::user()->groups()->detach($group);
        $request->session()->flash('message', 'You have exited the group succesfully!');
        return redirect()->route('viewGroup', ['id' => $group->id]);
    }

    function store(Group $group, Request $request)
    {
        if ($exists = Auth::user()->groups->contains($group->id)) {
            $request->session()->flash('message', 'You are already in the group!');
            $request->session()->flash('alert-class', 'alert-danger');
        } else {
            Auth::user()->groups()->syncWithoutDetaching($group);
            $request->session()->flash('message', 'You have joined the group succesfully!');
        }
        return redirect()->route('viewGroup', ['id' => $group->id]);
    }
}
