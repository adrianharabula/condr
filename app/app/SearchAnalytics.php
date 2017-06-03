<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchAnalytics extends Model
{
    protected $table="search_analytics";

    protected $fillable=['keyword', 'searches'];

    public $timestamps=false;
}
