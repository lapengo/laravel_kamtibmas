@extends('master')

@section('title_page', 'Ganti Password')

@section('content')

    <form
        action="{{route('change.password')}}"
        enctype="multipart/form-data"
        method="POST"
        class="form-horizontal form-label-left"
    >@csrf

        <div class="row" >
            <div class="col-md-12 col-sm-12  ">

                

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



@if ($errors->any())
<div class="row">    
    <div class="col-md-12 col-sm-12">       
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> 
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
        <br>
    </div>
</div>
@endif 

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Ganti Password</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        

                        {{-- <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="oldpassword">Old Password</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="oldpassword" name="oldpassword" value="{{ old('oldpassword') }}"  type="password" class="form-control{{($errors->first('oldpassword') ? " parsley-error" : "")}}">

                                @if($errors->has('oldpassword'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('oldpassword') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div> --}}

                        

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

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password2">Re-Password</label>
                            <div class="col-md-6 col-sm-6 ">

                                <input id="password2" name="password2" value="{{ old('password2') }}"  type="password" class="form-control{{($errors->first('password2') ? " parsley-error" : "")}}">

                                @if($errors->has('password2'))

                                    <ul class="parsley-errors-list filled" id="parsley-id-38">
                                        <li class="parsley-required">{{ $errors->first('password2') }}</li>
                                    </ul>

                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>

        <hr> 
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>

        <hr>

    </form>
@endsection