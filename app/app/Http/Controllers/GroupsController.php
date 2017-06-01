<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Condrgroup as Group;
use App\Repositories\GroupRepository;
Use Auth;

class GroupsController extends Controller
{
    protected $_groupRepository;
    public function __construct(GroupRepository $_groupRepository){
        $this->_groupRepository = $_groupRepository;
    }

    function getGroupsList()
    {
        $groups = Group::all();
        return view('groups.listgroups')->with('groups', $groups);
    }

    public function getGroup($id){
        return view('groups.singleview')->with('group', $this->_groupRepository->find($id));
    }

  /*  function store(Group $group, Request $request)
    {
        if ($exists = Auth::user()->groups->contains($group->id)) {
            $request->session()->flash('message', 'You are already in the group!');
            $request->session()->flash('alert-class', 'alert-danger');
        } else {
            Auth::user()->groups()->syncWithoutDetaching($group);
            $request->session()->flash('message', 'You have joined the group succesfully!');
        }
        return redirect()->route('viewGroup', ['id' => $group->id]);
    }*/
    
    // public function getGroupsList(/*GroupSearchRequest $data*/)
    // {
    //     // TODO: add paginate here
    //     return view('groups.listgroups')->with('groups', $groups);
    // }
    //
    // public function getGroup($id){
    //     //$x = $this->_productRepository->find($id);
    //     //$z = $x->characteristics()->first();
    //     //$f = $z->votes()->get();
    //     //
    //     //    dd($x,$z,$f);
    //     //dd('wrong seed relation');
    //     return view('groups.singleview')->with('group', $this->_groupRepository->find($id));
    // }
}
