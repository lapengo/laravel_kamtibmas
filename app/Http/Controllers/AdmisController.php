<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

use KANTIBMAS\Models\Users;
use DataTables;
use Carbon\Carbon;
use Auth;

class AdmisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 

        if ($request->ajax()) {            
        
            $data = Users::where('role', '!=' , 'bibnopsal')->get(); 

            return DataTables::of($data) 
                    ->addColumn('action', function ($data) {
                        $button = '<a class="btn btn-success btn-sm"  href="' . route('admin.edit', $data->id) .'"><i class="fa fa-edit"></i></a>'; 
                        $button .= '<a class="btn btn-info btn-sm"  href="' . route('admin.show', $data->id) .'"><i class="fa fa-eye"></i></a>';  
                        return $button;
                      })  
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admins.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Users::findOrFail($id);
        $userPicAtasan = Users::getPicName($id); 

        $allData = [
            'data'      => $show, 
            'atasan'      => $userPicAtasan, 
        ]; 

        return view('admins.show', $allData);
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
