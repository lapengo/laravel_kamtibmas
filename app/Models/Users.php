<?php

namespace KANTIBMAS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
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
                        'pic_name'      => 'Nama PIC',
                        'picto'         => 'PIC Tujuan',
                    ];

        return $attributes;
    }


    public function attr2()
    {
        $attributes = [
                        'name'          => 'Nama Lengkap',
                        'email'         => 'Email Aktif',
                        'password'      => 'Password',
                        'pic_name'      => 'Nama PIC',
                    ];

        return $attributes;
    }


    public function rule1()
    {
        $rule = [
                    'name'          => 'required|string|max:191',
                    'email'         => 'required|unique:users,email',
                    'password'      => [
                                            'required',
                                            'string',
                                            'min:8',             // must be at least 10 characters in length
                                            // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                                            // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                            // 'regex:/[0-9]/',      // must contain at least one digit
                                            // 'regex:/[@$!%*#?&]/', // must contain a special character
                                        ],
                    'pic_name'      => 'required|string|max:191',
                ];
        return $rule;
    }


    public function rule2()
    {
        $rule = [
                    'name'          => 'required|string|max:191',
                    'email'         => 'required|unique:users|email:rfc|max:50l',
                    'password'      => [
                                            'required',
                                            'string',
                                            'min:8',             // must be at least 10 characters in length
                                            // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                                            // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                            // 'regex:/[0-9]/',      // must contain at least one digit
                                            // 'regex:/[@$!%*#?&]/', // must contain a special character
                                        ],
                    'pic_name'      => 'required|string|max:191',
                ];
        return $rule;
    }

    public function getValidation1($request)
    {
        $validator = Validator::make($request, $this->rule1(), [], $this->attr())->validate();

        return $validator;
    }

    public function getValidation2($request)
    {
        $validator = Validator::make($request, $this->rule2(), [], $this->attr())->validate();

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
