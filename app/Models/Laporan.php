<?php

namespace KANTIBMAS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator; 

class Laporan extends Model
{
    
    protected $table        = 'laporans';
    public $timestamps      = true;
    protected $primaryKey   = 'id';
    protected $fillable     = [ 
        'situasi_umum',
        'laporan_polisi',
        'perkara_sidik',
        'perkara_lidik',
        'perkara_selra',
        'perkara_sp3',
        'perkara_henti_lidik',
        'perkara_p21',
        'upp_pemanggilan',
        'upp_penangkapan',
        'upp_penahanan',
        'upp_penggeledahan',
        'upp_penyitaan',
        'kejahatan_menonjol_desc',
        'jlh_tahanan',
        'tanggal_situasi',       
        'from_userid',
        'to_userid', 
    ];


    public function attr()
    {
        $attributes = [
            'situasi_umum' => 'Situasi Umum',
            'laporan_polisi' => 'Laporan Polisi',
            'perkara_sidik' => 'Perkara Sidik',
            'perkara_lidik' => 'Perkara Lidik',
            'perkara_selra' => 'Perkara Selra',
            'perkara_sp3' => 'Perkara SP3',
            'perkara_henti_lidik' => 'Perkara Hendi Lidik',
            'perkara_p21' => 'Perkara P21',
            'upp_pemanggilan' => 'UPP Pemanggilan',
            'upp_penangkapan' => 'UPP Penangkapan',
            'upp_penahanan' => 'UPP Penahanan',
            'upp_penggeledahan' => 'UPP Penggeledahan',
            'upp_penyitaan' => 'UPP Penyitaan',
            'kejahatan_menonjol_desc' => 'Kejahatan Menonjol',
            'jlh_tahanan' => 'Jumlah Tahanan',
            'tanggal_situasi' => 'Tanggal Situasi',
        ];

        return $attributes;
    } 

    public function rule()
    {
        $rule = [
            'situasi_umum' => 'required|string|max:191',
            'laporan_polisi' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_sidik' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_lidik' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_selra' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_sp3' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_henti_lidik' => 'required|numeric|regex:/^[0-9]+$/',
            'perkara_p21' => 'required|numeric|regex:/^[0-9]+$/',
            'upp_pemanggilan' => 'required|numeric|regex:/^[0-9]+$/',
            'upp_penangkapan' => 'required|numeric|regex:/^[0-9]+$/',
            'upp_penahanan' => 'required|numeric|regex:/^[0-9]+$/',
            'upp_penggeledahan' => 'required|numeric|regex:/^[0-9]+$/',
            'upp_penyitaan' => 'required|numeric|regex:/^[0-9]+$/',
            'kejahatan_menonjol_desc' => 'required|string|max:191',
            'jlh_tahanan' => 'required|numeric|regex:/^[0-9]+$/',
            'tanggal_situasi' => 'required',
        ];
        return $rule;
    }

    public function getValidation($request)
    { 
        $validator = Validator::make($request, $this->rule(), [], $this->attr())->validate();
        
        return $validator;
    }

}
