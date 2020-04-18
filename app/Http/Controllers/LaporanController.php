<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator; 

use KANTIBMAS\Models\Laporan as LaporanModel;
use DataTables;
use Carbon\Carbon;
use Auth;

class LaporanController extends Controller
{
 

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(function($request, $next){  
                       
            if(Gate::allows('isUnit')){
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
  

    public function index(Request $request)
    {        
        $userid = Auth::user()->id;
        if ($request->ajax()) {
            $data = LaporanModel::where('from_userid', '=', $userid)->get();
            
            return DataTables::of($data) 
                    ->addColumn('action', function ($data) {
                        $button = '<a class="btn btn-success btn-sm"  href="' . route('laporan.edit', $data->id) .'"><i class="fa fa-edit"></i></a>'; 
                        $button .= '<a class="btn btn-info btn-sm"  href="' . route('laporan.show', $data->id) .'"><i class="fa fa-eye"></i></a>'; 

                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></button>';

                        return $button;
                      }) 
                    ->editColumn('tanggal_situasi', function ($data) {
                        return $data->tanggal_situasi ? with(new Carbon($data->tanggal_situasi))->translatedFormat('l, d F Y') : '';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('laporan.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new LaporanModel;
        $model->getValidation($request->all());          

        $request['from_userid']              = Auth::user()->id;
        $request['to_userid']                = Auth::user()->picto;

        $new_laporan = new LaporanModel;
        $new_laporan->situasi_umum              = $request->get('situasi_umum');
        $new_laporan->laporan_polisi            = $request->get('laporan_polisi');
        $new_laporan->perkara_sidik             = $request->get('perkara_sidik');
        $new_laporan->perkara_lidik             = $request->get('perkara_lidik');
        $new_laporan->perkara_selra             = $request->get('perkara_selra');
        $new_laporan->perkara_sp3               = $request->get('perkara_sp3');
        $new_laporan->perkara_henti_lidik       = $request->get('perkara_henti_lidik');
        $new_laporan->perkara_p21               = $request->get('perkara_p21');
        $new_laporan->upp_pemanggilan           = $request->get('upp_pemanggilan');
        $new_laporan->upp_penangkapan           = $request->get('upp_penangkapan');
        $new_laporan->upp_penahanan             = $request->get('upp_penahanan');
        $new_laporan->upp_penggeledahan         = $request->get('upp_penggeledahan');
        $new_laporan->upp_penyitaan             = $request->get('upp_penyitaan');
        $new_laporan->kejahatan_menonjol_desc   = $request->get('kejahatan_menonjol_desc');
        $new_laporan->jlh_tahanan               = $request->get('jlh_tahanan');
        $new_laporan->tanggal_situasi           = $request->get('tanggal_situasi');

        
        $new_laporan->from_userid               = Auth::user()->id;
        $new_laporan->to_userid                 = Auth::user()->picto;
        $new_laporan->save();
        // Laporan::create($request->all()); 
        return redirect()->route('laporan.show', $new_laporan->id)->with('status', 'Laporan berhasil disimpan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = LaporanModel::findOrFail($id);
        return view('laporan.show', ['data' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = LaporanModel::findOrFail($id);
        return view('laporan.edit', ['data' => $edit]);
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
        $model = new LaporanModel;
        $model->getValidation($request->all()); 
        
        $laporan = LaporanModel::findOrFail($id);
        $laporan->from_userid               = Auth::user()->id;
        $laporan->to_userid                 = Auth::user()->picto;   

        $laporan->situasi_umum              = $request->get('situasi_umum');
        $laporan->laporan_polisi            = $request->get('laporan_polisi');
        $laporan->perkara_sidik             = $request->get('perkara_sidik');
        $laporan->perkara_lidik             = $request->get('perkara_lidik');
        $laporan->perkara_selra             = $request->get('perkara_selra');
        $laporan->perkara_sp3               = $request->get('perkara_sp3');
        $laporan->perkara_henti_lidik       = $request->get('perkara_henti_lidik');
        $laporan->perkara_p21               = $request->get('perkara_p21');
        $laporan->upp_pemanggilan           = $request->get('upp_pemanggilan');
        $laporan->upp_penangkapan           = $request->get('upp_penangkapan');
        $laporan->upp_penahanan             = $request->get('upp_penahanan');
        $laporan->upp_penggeledahan         = $request->get('upp_penggeledahan');
        $laporan->upp_penyitaan             = $request->get('upp_penyitaan');
        $laporan->kejahatan_menonjol_desc   = $request->get('kejahatan_menonjol_desc');
        $laporan->jlh_tahanan               = $request->get('jlh_tahanan');
        $laporan->tanggal_situasi           = $request->get('tanggal_situasi');
 
        $laporan->save();  

        return redirect()->route('laporan.show', $id)->with('status', 'Laporan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LaporanModel::findOrFail($id);
        $data->delete();
    }
}
