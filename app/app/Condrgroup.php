<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Condrgroup extends Model
{
    // relatie many to many
    // un grup are mai multi useri
    public function users()
    {
        return $this->belongsToMany('\App\User');
    }

    // relatie many to many polimorfica
    // pentru a retine preferintele grupului
    public function characteristics()
    {
        // hint: access desired values with
        // $characteristic->pivot->charvalue;
        return $this->morphToMany('\App\Characteristic', 'characterizable')
                    ->withPivot('cvalue', 'cvotes');
    }
}
