@extends('master')

@section('title_page', 'Managemen Users')

@section('content')

<div class="row">
    <div class="col-md-12 col-sm-12  ">



        <a class="btn btn-info btn-sm" href="{{route('admins.create')}}">Tambah Data Subdit</a>
        <a class="btn btn-primary btn-sm" href="{{route('admin.create')}}">Tambah Data Unit</a>
        <hr>
    </div>

    <div class="col-md-12 col-sm-12  ">

        <div class="x_panel">
            <div class="x_title">
                <h2>Data Bagian - BIBNOPSAL</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped table-bordere">
                    <thead>
                    <th width="150px">Nama PIC</th>
                    <th width="150px">Nama Pengguna</th>
                    <th>Email</th>
                    <th width="120px">Aksi</th>
                    </thead>
                    <tbody>
                    @foreach($bibnopsal as $r)
                        <tr>
                            <td>{{ $r["pic_name"] }}</td>
                            <td>{{ $r["name"] }}</td>
                            <td>{{ $r["email"] }}</td>
                            <td>
                                <a class="btn btn-success btn-sm"  href="{{ route('admin.edit', $r['id']) }}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @foreach ($data2 as $row)
    <div class="col-md-6 col-sm-6  ">

        <div class="x_panel">
            <div class="x_title">
                <h2>Data Bagian - {{ $row["atasan_pic_name"] }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-striped table-bordere">
                <thead>
                    <th width="150px">Nama PIC</th>
                    <th width="150px">Nama Pengguna</th>
                    <th>Email</th>
                    <th width="120px">Aksi</th>
                </thead>
                <tbody>
                <tr style="font-weight: bold; color: #942a25;">
                    <td>{{ $row["atasan_pic_name"] }}</td>
                    <td>{{ $row["atasan_name"] }}</td>
                    <td>{{ $row["atasan_email"] }}</td>
                    <td>
                        <a class="btn btn-success btn-sm"  href="{{ route('admin.edit', $row['atasan_id']) }}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-info btn-sm"  href="{{ route('admin.show', $row['atasan_id']) }}"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @foreach($row["detail"] as $r)
                    <tr>
                        <td>{{ $r["pic_name"] }}</td>
                        <td>{{ $r["name"] }}</td>
                        <td>{{ $r["email"] }}</td>
                        <td>
                            <a class="btn btn-success btn-sm"  href="{{ route('admin.edit', $r['id']) }}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-info btn-sm"  href="{{ route('admin.show', $r['id']) }}"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>
    @endforeach
</div>


@stop

