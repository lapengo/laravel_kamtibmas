@extends('master')

@section('title_page', 'Laporan - Update')

@section('content')
 
<form
    action="{{route('laporan.update', $data->id)}}"
    enctype="multipart/form-data"
    method="POST"
    class="form-horizontal form-label-left"
>
@method('PUT')
@csrf 

<div class="row" >
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                    <h2>Form Edit Data</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">           
                
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 " for="tanggal_situasi"><b>Tanggal Situasi</b></label>
                    <div class="col-md-3 col-sm-3 ">
                        <div class='input-group date' id='myDatepicker2'>
                            <input id="tanggal_situasi" name="tanggal_situasi" value="{{old('tanggal_situasi') ? old('tanggal_situasi') : $data->tanggal_situasi}}" type='text' class="form-control{{($errors->first('tanggal_situasi') ? " parsley-error" : "")}}" />
                            <span class="input-group-addon">
                               <span class="fa fa-calendar-o "></span>
                            </span>
                            
                    
                        </div>
                        @if($errors->has('tanggal_situasi')) 

                            <ul class="parsley-errors-list filled" id="parsley-id-38">
                                <li class="parsley-required">{{ $errors->first('tanggal_situasi') }}</li>
                            </ul> 

                        @endif
                    </div>
                </div>

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 " for="situasi_umum"><b>Situasi Umum</b></label>
                    <div class="col-md-7 col-sm-7 ">
                        
                        <textarea id="situasi_umum" name="situasi_umum" class="resizable_textarea form-control{{($errors->first('situasi_umum') ? " parsley-error" : "")}}" placeholder="Situasi Umum">{{old('situasi_umum') ? old('situasi_umum') : $data->situasi_umum}}</textarea>
                        
                        @if($errors->has('situasi_umum')) 

                            <ul class="parsley-errors-list filled" id="parsley-id-38">
                                <li class="parsley-required">{{ $errors->first('situasi_umum') }}</li>
                            </ul> 

                        @endif
                    </div>
                </div>

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 " for="kejahatan_menonjol_desc"><b>Deskripsi Kejahatan Menonjol</b></label>
                    <div class="col-md-7 col-sm-7 ">
                        
                        <textarea id="kejahatan_menonjol_desc" name="kejahatan_menonjol_desc" class="resizable_textarea form-control{{($errors->first('kejahatan_menonjol_desc') ? " parsley-error" : "")}}" placeholder="Deskripsikan kejahatan menonjol yang mau dilaporkan" >{{old('kejahatan_menonjol_desc') ? old('kejahatan_menonjol_desc') : $data->kejahatan_menonjol_desc}}</textarea>
                        
                        @if($errors->has('kejahatan_menonjol_desc')) 

                            <ul class="parsley-errors-list filled" id="parsley-id-38">
                                <li class="parsley-required">{{ $errors->first('kejahatan_menonjol_desc') }}</li>
                            </ul> 

                        @endif
                    </div>
                </div>
                

            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                        <h2>Perkara </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                   
    

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="laporan_polisi"><b>Laporan polisi</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="laporan_polisi" name="laporan_polisi" value="{{old('laporan_polisi') ? old('laporan_polisi') : $data->laporan_polisi}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('laporan_polisi') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('laporan_polisi')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('laporan_polisi') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>               

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_sidik"><b>Perkara Sidik</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_sidik" name="perkara_sidik" value="{{old('perkara_sidik') ? old('perkara_sidik') : $data->perkara_sidik}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_sidik') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_sidik')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_sidik') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>
                    

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_lidik"><b>Perkara Lidik</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_lidik" name="perkara_lidik" value="{{old('perkara_lidik') ? old('perkara_lidik') : $data->perkara_lidik}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_lidik') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_lidik')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_lidik') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_selra"><b>Perkara Selra</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_selra" name="perkara_selra" value="{{old('perkara_selra') ? old('perkara_selra') : $data->perkara_selra}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_selra') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_selra')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_selra') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_sp3"><b>Perkara SP3</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_sp3" name="perkara_sp3" value="{{old('perkara_sp3') ? old('perkara_sp3') : $data->perkara_sp3}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_sp3') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_sp3')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_sp3') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_p21"><b>Perkara P21</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_p21" name="perkara_p21" value="{{old('perkara_p21') ? old('perkara_p21') : $data->perkara_p21}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_p21') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_p21')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_p21') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="perkara_henti_lidik"><b>Perkara Henti Lidik</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="perkara_henti_lidik" name="perkara_henti_lidik" value="{{old('perkara_henti_lidik') ? old('perkara_henti_lidik') : $data->perkara_henti_lidik}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('perkara_henti_lidik') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('perkara_henti_lidik')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('perkara_henti_lidik') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div>  
    
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                        <h2>Upaya </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">              
                    

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="upp_pemanggilan"><b>Upaya Pemanggilan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="upp_pemanggilan" name="upp_pemanggilan" value="{{old('upp_pemanggilan') ? old('upp_pemanggilan') : $data->upp_pemanggilan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('upp_pemanggilan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('upp_pemanggilan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('upp_pemanggilan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 
                    
                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="upp_penangkapan"><b>Upaya Penangkapan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="upp_penangkapan" name="upp_penangkapan" value="{{old('upp_penangkapan') ? old('upp_penangkapan') : $data->upp_penangkapan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('upp_penangkapan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('upp_penangkapan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('upp_penangkapan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 
                    
                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="upp_penahanan"><b>Upaya Penahanan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="upp_penahanan" name="upp_penahanan" value="{{old('upp_penahanan') ? old('upp_penahanan') : $data->upp_penahanan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('upp_penahanan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('upp_penahanan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('upp_penahanan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 
                    
                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="upp_penggeledahan"><b>Upaya Penggeledahan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="upp_penggeledahan" name="upp_penggeledahan" value="{{old('upp_penggeledahan') ? old('upp_penggeledahan') : $data->upp_penggeledahan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('upp_penggeledahan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('upp_penggeledahan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('upp_penggeledahan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 
                    
                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="upp_penyitaan"><b>Upaya Penyitaan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="upp_penyitaan" name="upp_penyitaan" value="{{old('upp_penyitaan') ? old('upp_penyitaan') : $data->upp_penyitaan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('upp_penyitaan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('upp_penyitaan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('upp_penyitaan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 

                    <div class="form-group row ">
                        <label class="control-label col-md-5 col-sm-5 " for="jlh_tahanan"><b>Jumlah tahanan</b></label>
                        <div class="col-md-7 col-sm-7 ">
                            
                            <input id="jlh_tahanan" name="jlh_tahanan" value="{{old('jlh_tahanan') ? old('jlh_tahanan') : $data->jlh_tahanan}}"  type="number" placeholder="Jumlah Data" class="form-control{{($errors->first('jlh_tahanan') ? " parsley-error" : "")}}">
                            
                            @if($errors->has('jlh_tahanan')) 
    
                                <ul class="parsley-errors-list filled" id="parsley-id-38">
                                    <li class="parsley-required">{{ $errors->first('jlh_tahanan') }}</li>
                                </ul> 
    
                            @endif
                        </div>
                    </div> 
                    
    
                </div>
            </div>
        </div>
    </div>

     

</div> 

<hr>

<a class="btn btn-dark " href="{{route('laporan.index')}}"><i class="fa fa-arrow-circle-left"></i> Lihat Semua Data</a>

<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>

<hr>

</form>
@endsection

@push('scripts')

<script>
$(function() {        

    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });

});
</script>
@endpush