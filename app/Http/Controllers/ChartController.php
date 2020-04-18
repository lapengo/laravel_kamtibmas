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
    public function getDataByUnit(Request $request)
    {  
        $now = Carbon::now()->format('Y-m-d');

        $status     = false;
        $unit       = $request->get('unit');
        $date       = $request->get('tanggal_situasi'); 

        if($unit == 0){
            $unit   = Auth::user()->id;
            $status = true;
        }

        if($date == '')
        {
            $date = $now;
        }  

        $models = new Laporan;
        $arrayJml = $models->getJmlDataSubditUnit($unit, $date, $status); 
 

        $laporan_polisi         = 0;
        $perkara_sidik          = 0; 
        $perkara_lidik          = 0;
        $perkara_selra          = 0; 
        $perkara_sp3            = 0; 
        $perkara_henti_lidik    = 0;
        $perkara_p21            = 0; 
        $upp_pemanggilan        = 0; 
        $upp_penangkapan        = 0;
        $upp_penahanan          = 0; 
        $upp_penggeledahan      = 0; 
        $upp_penyitaan          = 0; 
        $jlh_tahanan            = 0;

        foreach($arrayJml as $r){
            $laporan_polisi         = $r->laporan_polisi; 
            $perkara_sidik          = $r->perkara_sidik; 
            $perkara_lidik          = $r->perkara_lidik;
            $perkara_selra          = $r->perkara_selra; 
            $perkara_sp3            = $r->perkara_sp3; 
            $perkara_henti_lidik    = $r->perkara_henti_lidik;
            $perkara_p21            = $r->perkara_p21; 
            $upp_pemanggilan        = $r->upp_pemanggilan; 
            $upp_penangkapan        = $r->upp_penangkapan;
            $upp_penahanan          = $r->upp_penahanan; 
            $upp_penggeledahan      = $r->upp_penggeledahan; 
            $upp_penyitaan          = $r->upp_penyitaan; 
            $jlh_tahanan            = $r->jlh_tahanan;
        }

        $jmlData =  $laporan_polisi . "," . $perkara_sidik  . "," . $perkara_lidik  . "," . 
                    $perkara_selra . "," . $perkara_sp3  . "," . $perkara_henti_lidik  . "," . 
                    $perkara_p21 . "," . $upp_pemanggilan  . "," . $upp_penangkapan  . "," . 
                    $upp_penahanan . "," . $upp_penggeledahan  . "," . $upp_penyitaan  . "," . $jlh_tahanan ;


        $userSubdit = Users::getUnitSubdit(Auth::user()->id)->get(); //Untuk Combobox
        $allData = [
                        'unit'      => $userSubdit,
                        'dataku'    => $jmlData,
                        'date'      => $date,
                    ]; 
        
        return view('chart.subditchart', $allData); 
        
    }
}
