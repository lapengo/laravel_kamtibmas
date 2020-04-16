@extends('master')

@section('title_page', 'Halaman Home')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Plain Page</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @can('isUnit')
                <h2>Admin View</h2>
            @elsecan('isEditor')
                <h2>Editor View</h2>
            @else
                <h2>Guest View</h2>
            @endcan
        </div>
    </div>
</div>

@endsection