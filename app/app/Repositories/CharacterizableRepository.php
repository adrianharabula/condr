<?php

namespace App\Repositories;

use App\Characterizable;
use App\Repositories\Eloquent\EloquentRepository;
use stdClass;

class CharacterizableRepository extends EloquentRepository
{

    public function getModel()
    {
        return Characterizable::class;
    }

}