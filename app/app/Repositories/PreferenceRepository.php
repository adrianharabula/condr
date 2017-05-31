<?php

namespace App\Repositories;

use \App\Characteristic as Characteristic;
use App\Repositories\Eloquent\EloquentRepository;
use App\SearchAnalytics;
use stdClass;

class PreferenceRepository extends EloquentRepository
{
    public function getModel()
    {
        return Characteristic::class;
    }

    public function searchCharacteristics($data)
    {
        $characteristics = $this->_model->all();
        return $characteristics;
    }
}
