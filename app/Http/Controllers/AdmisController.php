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

        $edit = new Users;

        $edit->name              = $request->get('name');
        $edit->email             = $request->get('email');
        $edit->password          = \Hash::make($request->get('password'));
        $edit->role              = 'unit';
        $edit->pic_name          = $request->get('pic_name');
        $edit->picto             = $request->get('picto');


        $edit->save();
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
        $data = Users::findOrFail($id);
        return view('admins.edit', ['data' => $data]);
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
        $model = new Users;
        $model->getValidation3($request->all(), $id);

        $edit = Users::findOrFail($id);
        $edit->name              = $request->get('name');
        $edit->email             = $request->get('email');
        $edit->password          = \Hash::make($request->get('password'));
        $edit->pic_name          = $request->get('pic_name');
        $edit->picto             = $request->get('picto');


        $edit->save();
        return redirect()->route('admin.index')->with('status', 'User berhasil disimpan');
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
