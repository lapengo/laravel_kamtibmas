<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use KANTIBMAS\Models\Users;
use DataTables;
use Carbon\Carbon;
use Auth;

class AdminsSubditController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){

            if(Gate::allows('isAdmin')){
                return $next($request);
            }
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Users;
        $model->getValidation1($request->all());

        $new_user = new Users;

        $new_user->name              = $request->get('name');
        $new_user->email             = $request->get('email');
        $new_user->password          = \Hash::make($request->get('password'));
        $new_user->role              = 'subdit';
        $new_user->pic_name          = $request->get('pic_name');
        $new_user->picto             = 1;


        $new_user->save();
        return redirect()->route('admin.index')->with('status', 'User berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
