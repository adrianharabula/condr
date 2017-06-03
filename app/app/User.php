<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // relatie many to many
    // pentru functia favorited products
    public function products()
    {
        return $this->belongsToMany('\App\Product');
    }

    // relatie many to many
    // un user apartine mai multor grupuri
    public function groups()
    {
        return $this->hasMany('\App\Condrgroup');
    }

    // relatie many to many polimorfica
    // pentru a retine preferintele userului
    public function characteristics()
    {
        // hint: access desired values with
        // $characteristic->pivot->charvalue;
        return $this->morphToMany('\App\Characteristic', 'characterizable')
                    ->withPivot('cvalue', 'cvotes');
    }
}
