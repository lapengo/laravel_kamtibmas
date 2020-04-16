@extends('master')

@section('title_page', 'Laporan - Detail')

@section('content')


<div class="row">
    <div class="col-md-12 col-sm-12">
        <a class="btn btn btn-primary btn-sm" href="{{route('laporan.index')}}"><i class="fa fa-arrow-circle-left"></i> Lihat Semua Data</a>
            
        @can('isUnit')
            <a class="btn btn-danger btn-sm" href="{{route('laporan.printpdfunit', $data->id)}}"><i class="fa fa-file-pdf-o"></i> Cetak PDF</a>
        @elsecan('isSubdit')
            <a class="btn btn-danger btn-sm" href="{{route('laporan.printpdfsubdit', $data->id)}}"><i class="fa fa-file-pdf-o"></i> Cetak PDF</a>
        @elsecan('isBibnopsal')
            <a class="btn btn-danger btn-sm" href="{{route('laporan.printpdfbibnopsal', $data->id)}}"><i class="fa fa-file-pdf-o"></i> Cetak PDF</a>
        @else
            {{-- <b> </b> --}}
        @endcan
    
    </div>
</div>

@if(session('status'))  
<div class="row">    
    <div class="col-md-12 col-sm-12">       
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{session('status')}}
        </div>
        <br>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
            <h2>Detail Laporan | {{date('d M Y', strtotime($data->tanggal_situasi))}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            {{-- Row Data --}}

                <div class="row" style="color:#000000;">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-12 col-sm-12">Selamat Malam</div>
                        <div class="col-md-12 col-sm-12">Kepada Yth. User</div>  
                        <div class="col-md-12 col-sm-12">Dari User</div>  

                        <br>                       

                    </div>

                    <div class="col-md-12 col-sm-12">
                        <p>
                            <div class="col-md-12 col-sm-12">
                                Mohon izin melaporkan situasi kamtibmas pada 
                                    hari  
                                    {{Carbon\Carbon::parse($data->tanggal_situasi)->translatedFormat('l')}}
                                    
                                    tanggal 
                                    {{Carbon\Carbon::parse($data->tanggal_situasi)->translatedFormat('d')}} 
                                    bulan 
                                    {{Carbon\Carbon::parse($data->tanggal_situasi)->translatedFormat('F')}}
                                    tahun 
                                    {{Carbon\Carbon::parse($data->tanggal_situasi)->translatedFormat('Y')}}
                                    selama 1 X 24 jam sebagai berikut:
                            </div>
                        </p>
                    </div>
                    
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-borderless table-hover table-sm">
                            {{-- <table class="table table-striped table-hover table-sm"> --}}
                            <tbody>
                                <tr>
                                    <td valign="top" align="center" width="50px">a. </td>
                                    <td style="text-align: justify;">Situasi keamanan secara umum {{$data->situasi_umum}}</td>
                                </tr>
                                <tr>
                                    <td valign="top" align="center" width="50px">b. </td>
                                    <td style="text-align: justify;">Jumlah laporan polisi : {{$data->laporan_polisi}}</td>
                                </tr>
                                <tr>
                                    <td valign="top" align="center" width="50px">c. </td>
                                    <td style="text-align: justify;">Proses Perkara {{$data->situasi_umum}}</td>
                                </tr>  
                                
                                <tr>
                                    <td valign="top" align="center" width="50px"></td>
                                    <td style="text-align: justify;">
                                        <ul>
                                            <li>Sidik : {{$data->perkara_sidik}} </li>
                                            <li>Lidik : {{$data->perkara_lidik}} </li>
                                            <li>Selra : {{$data->perkara_selra}} </li>
                                        </ul>
                                    </td>
                                </tr>   
                                
                                <tr>
                                    <td valign="top" align="center" width="50px">1) </td>
                                    <td style="text-align: justify;">SP3 : {{$data->perkara_sp3}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">2) </td>
                                    <td style="text-align: justify;">Henti Lidik : {{$data->perkara_henti_lidik}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">3) </td>
                                    <td style="text-align: justify;">P21 : {{$data->perkara_p21}}</td>
                                </tr> 

                                <tr>
                                    <td colspan="2">
                                        <ul>
                                            <li>Jumlah kegiatan upaya paksa</li> 
                                        </ul>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td valign="top" align="center" width="50px">1) </td>
                                    <td style="text-align: justify;">Pemanggilan : {{$data->upp_pemanggilan}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">2) </td>
                                    <td style="text-align: justify;">Penangkapan : {{$data->upp_penangkapan}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">3) </td>
                                    <td style="text-align: justify;">Penahanan : {{$data->upp_penahanan}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">4) </td>
                                    <td style="text-align: justify;">Penggeledahan : {{$data->upp_penggeledahan}}</td>
                                </tr> 
                                <tr>
                                    <td valign="top" align="center" width="50px">5) </td>
                                    <td style="text-align: justify;">Penyitaan : {{$data->upp_penyitaan}}</td>
                                </tr> 

                                
                                <tr>
                                    <td valign="top" align="center" width="50px">d. </td>
                                    <td style="text-align: justify;">Kejahatan menonjol, meliputi : {{$data->kejahatan_menonjol_desc}}</td>
                                </tr>  
                                <tr>
                                    <td valign="top" align="center" width="50px">e. </td>
                                    <td style="text-align: justify;">Jumlah tahanan : {{$data->jlh_tahanan}}</td>
                                </tr>  
                                <tr>
                                    <td colspan="2">
                                        <div class="col-md-12 col-sm-12">Demikian disampaikan dan terima kasih</div>
                                    </td>
                                </tr>
                                
                            </tbody> 
                        </table>
                    </div>
                    
                </div>

            </div>

            {{-- END ROW DATA --}}

        </div>
    </div>
</div>

@endsection