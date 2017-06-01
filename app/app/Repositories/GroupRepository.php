<?php

namespace App\Repositories;

use \App\Condrgroup as Group;
use App\Repositories\Eloquent\EloquentRepository;
use App\SearchAnalytics;
use stdClass;

class GroupRepository extends EloquentRepository
{
	    /**
     * @var \App\SearchAnalytics
     */
    private $_searchAnalytics;


    /**
     * ProductRepository constructor.
     *
     * @param \App\SearchAnalytics $_searchAnalytics
     */
    public function __construct(SearchAnalytics $_searchAnalytics)
    {
        parent::__construct();
        $this->_searchAnalytics = $_searchAnalytics;
    }
    
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
