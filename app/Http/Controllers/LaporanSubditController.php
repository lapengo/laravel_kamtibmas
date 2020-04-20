<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

use KANTIBMAS\Models\Laporan as LaporanModel;
use DataTables;
use Carbon\Carbon;
use Auth;

class LaporanSubditController extends Controller
{
    public function index(Request $request)
    {
        $userid = Auth::user()->id;

        if ($request->ajax()) {
            $data = LaporanModel::where('to_userid', '=', $userid)->get();

            return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        $button = '<a class="btn btn-info btn-sm"  href="' . route('laporan.show', $data->id) .'"><i class="fa fa-eye"></i></a>';

                        return $button;
                      })
                    ->editColumn('tanggal_situasi', function ($data) {
                        return $data->tanggal_situasi ? with(new Carbon($data->tanggal_situasi))->translatedFormat('l, d F Y') : '';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('laporan.index2');
    }
}
