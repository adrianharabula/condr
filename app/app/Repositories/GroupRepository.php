<?php

namespace App\Repositories;

use \App\Condrgroup as Group;
use App\Repositories\Eloquent\EloquentRepository;
use App\SearchAnalytics;
use stdClass;

class GroupRepository extends EloquentRepository
{
    public function getModel()
    {
        return Group::class;
    }

    public function searchGroups($data)
    {
        $groups = $this->_model->all();
        return $groups;
    }
}
