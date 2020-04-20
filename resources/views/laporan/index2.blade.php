@extends('master')

@section('title_page', 'Laporan')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12  "> 

        <div class="x_panel">
            <div class="x_title">
                <h2>Data Laporan</h2> 
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table id="datatable" class="table table-striped table-bordere">
                <thead>  
                    <th width="150px">Tgl. Situasi</th>
                    <th>Situasi Umum</th> 
                    <th width="120px">Aksi</th>
                </thead>
                <tbody></tbody>
            </table>
             
        </div>
    </div>
</div>

<div id="confirmModal"  class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Data yang dihapus tidak akan bisa dikembalikan <br/> <b>Anda yakin akan menghapus data ini?</b> </p>
        </div>
        <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
 

@stop

@push('scripts')
<script>
    $(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('laporan.subdit') }}",
            },
            columns: [ 
                {
                    data: 'tanggal_situasi',
                    name: 'tanggal_situasi'
                },
                {
                    data: 'situasi_umum',
                    name: 'situasi_umum'
                }, 
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        }); 


    });
    </script>
@endpush