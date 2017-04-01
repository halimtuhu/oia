@extends('layout.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="header">
            <h4 class="title">Data Kegiatan Internasional</h4>
            <p class="category">Grafik Rekap Data Kegiatan dalam Setahun Terakhir</p>
          </div>
          <div class="content" id="chart1">
            @include('chart.pie')
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="header">
            <h4 class="title">Data Kegiatan Internasional</h4>
            <p class="category">Tabel Rekap Data Kegiatan dalam Setahun Terakhir</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Nama Unit/Fakultas</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data1 as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td><a href="/admin/statistik/datapie?id={{$value->id}}&y={{date('Y')}}&m=null">{{$value->name}}</a></td>
                      <td>{{$value->jumlah}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" id="chart2">
      <div class="col-md-8">
        <div class="card">
          <div class="header">
            <div class="pull-left">
              <h4 class="title">Perkembangan Kegiatan Internasional</h4>
              <p class="category">Grafik Perkembangan Data Kegiatan Internasional dalam Setahun</p>
            </div>
            <div class="pull-right">
              <button class="btn btn-primary btn-sm" onclick="location.href='/admin/statistik/dataline?y={{date('Y')}}'">Details</button>
            </div>
          </div>
          <div class="content">
            @include('chart.line')
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="header">
            <h4 class="title">Perkembangan Kegiatan Internasional</h4>
            <p class="category">Tabel Perkembangan Data Kegiatan Internasional dalam Setahun</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>Bulan</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0, $j=0; $i<12; $i++){ ?>
                  <tr>
                    <td><?php
                      switch ($i+1) {
                        case '1': echo 'Januari'; break;
                        case '2': echo 'Februari'; break;
                        case '3': echo 'Maret'; break;
                        case '4': echo 'April'; break;
                        case '5': echo 'Mei'; break;
                        case '6': echo 'Juni'; break;
                        case '7': echo 'Juli'; break;
                        case '8': echo 'Agustus'; break;
                        case '9': echo 'September'; break;
                        case '10': echo 'Oktober'; break;
                        case '11': echo 'November'; break;
                        case '12': echo 'Desember'; break;
                        default:
                          break;
                      }
                    ?></td>
                    <td><?php
                      if($j<sizeof($data2)){
                        if($i+1==$data2[$j]->bulan){
                          echo $data2[$j]->jumlah;
                          $j++;
                        }else{
                          echo "-";
                        }
                      }else{
                        echo "-";
                      }
                    ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
