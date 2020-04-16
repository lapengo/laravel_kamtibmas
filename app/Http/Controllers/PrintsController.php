<?php

namespace KANTIBMAS\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use KANTIBMAS\Models\Laporan;
use PDF;
use Carbon\Carbon;
use Auth;

class PrintsController extends Controller
{
    public function printPDFUnit($id)
    {
        $data = Laporan::findOrFail($id);

        return "a";
    }

    
    public function printPDFSubdit($id)
    {
        $data = Laporan::findOrFail($id);

        return "a";
    }

    
    public function printPDFBibnopsal($id)
    {
        $data = Laporan::findOrFail($id);

        return "a";
    }
}
