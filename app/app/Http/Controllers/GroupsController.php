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
 
    public function getGroupsList() 
    { 
        return view('groups.listgroups')->with('groups', $this->_groupRepository->getAll()); 
    } 
 
    public function getGroup($id)
    { 
        return view('groups.singleview')->with('group', $this->_groupRepository->find($id)); 
    } 
} 