<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;

class Condrgroup extends Model
{
    use Searchable;
    use AlgoliaEloquentTrait;

    public function users()
    {
        return $this->belongsToMany('\App\User');
    }

    public function characteristics()
    {
        return $this->morphToMany('\App\Characteristic', 'characterizable');
    }
    public function searchableAs()
    {
        return 'groups_index';
    }
}
