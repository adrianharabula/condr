<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class User extends Authenticatable
{
    use Notifiable;

    // deactivate timestamps for users table
    // public $timestamps = false;

    // set id column to user_id
    // protected $primaryKey = 'user_id';

    // set user_id seq
    // public $sequence = 'users_user_id_seq';

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
}
