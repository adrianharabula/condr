<?php

namespace App\Repositories;

use App\Repositories\Eloquent\EloquentRepository;
use \App\Condrgroup as Group;

class GroupRepository extends EloquentRepository
{  
    public function getModel()
    {
        return Group::class;
    }
}
