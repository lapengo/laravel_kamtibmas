<?php

namespace KANTIBMAS\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{   
    protected $table        = 'users';

    public function scopeGetUnitSubdit($query, $idSubdit)
    {
        return $query->where('picto', $idSubdit);
    }

    // public function getUnitSubdit($idSubdit){
    //     $users = DB::table('users')
    //             ->where('picto', $idSubdit)
    //             ->get();
    //     return $users;
    // }
}
