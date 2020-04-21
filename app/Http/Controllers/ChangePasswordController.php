<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request; 

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

use KANTIBMAS\Models\Users; 
use Carbon\Carbon;
use Auth;


class ChangePasswordController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
    }

    public function index()
    {
        return view('change.index');
    }

    public function store(Request $request)
    {
        
        $this->_getValidation($request->all());

        $id                     = Auth::user()->id;
        $change                 = Users::findOrFail($id);
        $change->password       = \Hash::make($request->get('password'));
        $change->save();
        return redirect()->route('change.password', $id)->with('status', 'Password Berhasil dirubah.');
    }

    private function _getValidation($request)
    {  

        $validator = Validator::make($request, $this->_rules(), [], $this->_setAtr())->validate();
        
        return $validator;
    }

    private function _setAtr(){
        $attributes = [
            'password' => 'Password Baru',
            'password2' => 'Re-Password',  
        ];

        return $attributes;
    }

    private function _rules(){
        $rule = [ 
            'password'          => [
                                    'required',
                                    'string',
                                    'min:8', 
                                ],
            'password2'         => 'required_with:password|same:password',
        ];

        
        return $rule;
    }

}
