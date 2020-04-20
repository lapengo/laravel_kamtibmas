@extends('master')

@section('title_page', 'Admin - Create')

@section('content')

    <form
        action="{{route('admin.update', $data->id)}}"
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
                        <h2>Form Tambah Data - Unit</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" id="lblpicname" for="pic_name">Nama Bagian</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="picname" name="pic_name" value="{{old('pic_name') ? old('pic_name') : $data->pic_name}}"  type="text" class="form-control{{($errors->first('pic_name') ? " parsley-error" : "")}}">

                                @if($errors->has('pic_name'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('pic_name') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Nama Pengguna</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="name" name="name" value="{{old('name') ? old('name') : $data->name}}"  type="text" class="form-control{{($errors->first('name') ? " parsley-error" : "")}}">

                                @if($errors->has('name'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('name') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email Pengguna</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="email" name="email" value="{{old('email') ? old('email') : $data->email}}"  type="text" class="form-control{{($errors->first('email') ? " parsley-error" : "")}}">

                                @if($errors->has('email'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('email') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">New Password</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="password" name="password" value="{{ old('password') }}"  type="password" class="form-control{{($errors->first('password') ? " parsley-error" : "")}}">

                                @if($errors->has('password'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('password') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>

        <hr>

        <a class="btn btn-dark " href="{{route('admin.index')}}"><i class="fa fa-arrow-circle-left"></i> Lihat Semua Data</a>

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
