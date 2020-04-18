<?php

namespace KANTIBMAS\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{   
    protected $table        = 'users'; 
    public $timestamps      = true;
    protected $primaryKey   = 'id';
    protected $fillable     =   [
                                    'name',
                                    'email',
                                    'password',
                                    'role',
                                    'pic_name',
                                    'picto',
                                ];

    public function attr()
    {
        $attributes = [
                        'name'          => 'Nama Lengkap',
                        'email'         => 'Email Aktif',
                        'password'      => 'Password',
                        'role'          => 'Role',
                        'pic_name'      => 'Nama PIC',
                        'picto'         => 'PIC Tujuan',
                    ];

        return $attributes;
    }


    public function rule()
    {
        $rule = [
                    'name'          => 'required|string|max:191',
                    'email'         => 'required|unique:users,email:rfc',
                    'password'      => [
                                            'required',
                                            'string',
                                            'min:10',             // must be at least 10 characters in length
                                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                                            'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                            'regex:/[0-9]/',      // must contain at least one digit
                                            'regex:/[@$!%*#?&]/', // must contain a special character
                                        ],
                    'password2'     => 'required_with:password|same:password',
                    'role'          => 'required|string|max:191',
                    'pic_name'      => 'required|string|max:191',
                    'picto'         => 'required|numeric|regex:/^[0-9]+$/',
                ];
        return $rule;
    }

    public function getValidation($request)
    { 
        $validator = Validator::make($request, $this->rule(), [], $this->attr())->validate();
        
        return $validator;
    }


    public function scopeGetUnitSubdit($query, $idSubdit)
    {
        return $query->where('picto', $idSubdit);
    }  

    
    public function scopeGetPicName($query, $id)
    { 

        $data = DB::table($this->table)
                ->select('picto', 'id')
                ->where('id', $id)
                ->first();

                
        $picname = DB::table($this->table)
                    ->select('*')
                    ->where('id', $data->picto)
                    ->first();

        return $picname;
    } 
}
