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
    public function index()
    {
        $all = Users::where('role','subdit')->get();

        $bibnopsal = Users::where('role','bibnopsal')->get();

        $data2 = [];
        foreach ($all as $r)
        {
            $data2[] = [
                'atasan_id' => $r->id,
                'atasan_name' => $r->name,
                'atasan_email' => $r->email,
                'atasan_pic_name' => $r->pic_name,
                'detail' => Users::where('picto', $r->id)->get(),
            ];
        }

        $data = ['data2' => $data2, 'bibnopsal' => $bibnopsal];

        return view('admins.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Users::where('role', 'subdit')->get();

        return view('admins.create', ['data' => $data]);
    }

    public function create2()
    {
//        return view('admins.create2');
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
        $model->getValidation2($request->all());

        $new_user = new Users;


        $new_user->name              = $request->get('name');
        $new_user->email             = $request->get('email');
        $new_user->password          = $request->get('password');
        $new_user->role              = 'unit';
        $new_user->pic_name          = $request->get('pic_name');
        $new_user->picto             = $request->get('picto');


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
