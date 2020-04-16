<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use KANTIBMAS\Models\Users; 
use KANTIBMAS\Models\Laporan; 
use Carbon\Carbon;
use Auth;
use DB;

class ChartController extends Controller
{
    public function index()
    {        
        $data = DB::table('laporans')
                ->select(
                    DB::raw("SUM(laporan_polisi) as laporan_polisi"), 
                    DB::raw("SUM(perkara_sidik) as perkara_sidik"), 
                    DB::raw("SUM(perkara_lidik) as perkara_lidik"), 
                    DB::raw("SUM(perkara_selra) as perkara_selra"), 
                    DB::raw("SUM(perkara_sp3) as perkara_sp3"), 
                    DB::raw("SUM(perkara_henti_lidik) as perkara_henti_lidik"),
                    DB::raw("SUM(perkara_p21) as perkara_p21"), 
                    DB::raw("SUM(upp_pemanggilan) as upp_pemanggilan"), 
                    DB::raw("SUM(upp_penangkapan) as upp_penangkapan"), 
                    DB::raw("SUM(upp_penahanan) as upp_penahanan"), 
                    DB::raw("SUM(upp_penggeledahan) as upp_penggeledahan"), 
                    DB::raw("SUM(upp_penyitaan) as upp_penyitaan"), 
                    DB::raw("SUM(jlh_tahanan) as jlh_tahanan"), 
                    'tanggal_situasi'
                )
                ->groupBy('tanggal_situasi') 
                ->get();
        
        return response()->json(['status' => 200, 'data' => $data]);
    }

    // public function getAllDateLaporan($user)
    // {
    //     $quser = ''; 
    //     if($user != 0)
    //     {
    //         $quser = 'WHERE from_userid = "'. $user .'"';
    //     }

    //     $data = DB::select('SELECT tanggal_situasi FROM laporans '. $quser .' GROUP BY tanggal_situasi ORDER BY tanggal_situasi DESC LIMIT 14');

    //     return $data;
    // } 


    public function getDataByUnit()
    { 
        $userSubdit = Users::getUnitSubdit(Auth::user()->id)->get(); 

        $allData = [
                        'unit' => $userSubdit,
                    ];

        
        return view('chart.subditchart', $allData); 
        
    }
}
