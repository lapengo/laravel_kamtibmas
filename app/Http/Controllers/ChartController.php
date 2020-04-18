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

        $status     = 2;
        $unit       = $request->get('unit');
        $date       = $request->get('tanggal_situasi');
        
        
        $pilihUnit = "";         

        if($unit == 0){
            $unit   = Auth::user()->id;
            $status = 1;
            $pilihUnit = "Semua Unit";
        }else{
            $qryUser    = Users::findOrFail($unit);  
            $pilihUnit  = $qryUser->pic_name; 
        }

        if($date == '')
        {
            $date = $now;
        }  

        $models = new Laporan;
        $description    = $models->getDescLoporan($unit, $date, $status); 
        $jmlData        = $models->getJmlDataSubditUnit($unit, $date, $status);



        $userSubdit = Users::getUnitSubdit(Auth::user()->id)->get(); //Untuk Combobox
        $allData = [
                        'unit'      => $userSubdit,
                        'dataku'    => $jmlData,
                        'date'      => $date,
                        'unitPilih' => $pilihUnit,
                        'desc'      => $description,
                    ]; 
        
        return view('chart.subditchart', $allData); 
        
    }

    public function getDataBySubdit(Request $request)
    {  
        $now = Carbon::now()->format('Y-m-d');

        $status     = 1;
        $unit       = $request->get('unit');
        $date       = $request->get('tanggal_situasi');
        
        
        $pilihUnit = "";         

        if($unit == 0){
            $unit   = Auth::user()->id;
            $status = 3;
            $pilihUnit = "Semua Subdit";
        }else{
            $qryUser    = Users::findOrFail($unit);  
            $pilihUnit  = $qryUser->pic_name; 
        }

        if($date == '')
        {
            $date = $now;
        }  

        $models = new Laporan;
        $description    = $models->getDescLoporan($unit, $date, $status); 
        $jmlData        = $models->getJmlDataSubditUnit($unit, $date, $status);



        $userSubdit = Users::getUnitSubdit(Auth::user()->id)->get(); //Untuk Combobox
        $allData = [
                        'unit'      => $userSubdit,
                        'dataku'    => $jmlData,
                        'date'      => $date,
                        'unitPilih' => $pilihUnit,
                        'desc'      => $description,
                    ]; 
        
        return view('chart.subditchart', $allData); 
        
    }
}
