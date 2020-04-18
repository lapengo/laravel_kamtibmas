@extends('master')

@section('title_page', 'Data Laporan')

@section('content')
 

<div class="row">
    
    <div class="col-md-12 col-sm-12  ">
        <form
            action="{{route('chart.unit')}}"
            enctype="multipart/form-data"
            method="GET" 
        >@csrf

        <div class="x_panel">
            <div class="x_title">
            <h2>Filter Pencarian</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <div class="col-md-4">                
                <label class="control-label col-md-3 col-sm-3 " for="tanggal_situasi">Tanggal Pelaporan</label> 
                <div class="form-group">
                    <div class="col-md-7">
                        <div class='input-group date' id='myDatepicker2'>
                            <input id="tanggal_situasi" value="{{ old('tanggal_situasi') }}" name="tanggal_situasi" type='text' class="form-control" />
                            <span class="input-group-addon">
                               <span class="fa fa-calendar-o "></span>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="col-md-4"> 
                <label class="control-label col-md-3 col-sm-3 " for="unit">Pilih Unit</label> 
                <div class="form-group">
                    <div class="col-md-7 col-sm-7 ">
                        <select name="unit" id="unit" class="form-control">
                          <option value="0">-Semua Unit-</option>
                          @foreach ($unit as $row)
                            <option value="{{$row->id}}">{{$row->pic_name}}</option>
                          @endforeach
                        </select>
                      </div>
                </div>
            </div>

            <div class="col-md-4"> 
                <button type="submit" class="btn btn-success">Go</button>
            </div> 

        </div>
    </div>
    </div>

</form>


    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Grafik Pelaporan </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <canvas id="bar-chart" width="100%" height="40"></canvas>

            </div>
        </div>
    </div>

</div>
 

@endsection


@push('scripts')

<!-- morris.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
$(function() {   
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
        labels: [
                    "Laporan polisi", "Perkara Sidik", "Perkara Lidik", 
                    "Perkara Selra", "Perkara SP3", "Perkara P21", 
                    "Perkara Henti Lidik", 
                    "Laporan polisi", "Perkara Sidik", "Perkara Lidik", 
                    "Perkara Selra", "Perkara SP3", "Perkara P21", 
                
                ],
        datasets: [
            {
            label: "Jumlah Tercatat ",
            backgroundColor: [ 
                                "#E74856", "#E81123","#0078D7",
                                "#0063B1","#0099BC", "#2D7D9A",
                                "#7A7574",                                
                                "#5D5A58", "#498205","#107C10",
                                "#647C64","#525E54", "#847545"
                            ],
            data: [
                {{ $dataku }}
                    ]
            }
        ]
        },
        options: {
        legend: { display: false },
        title: {
            display: true,
            text: 'Data Laporan'
        }
        }
    });

});
</script>
@endpush