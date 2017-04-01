@extends('layout.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="header">
            <h4 class="title">Perkembangan Kegiatan Internasional</h4>
            <p class="category">Data dalam tabel</p>
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
                      if($j<sizeof($datatable)){
                        if($i+1==$datatable[$j]->bulan){
                          echo $datatable[$j]->jumlah;
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
      <div class="col-md-8">
        <div class="card">
          <div class="header">
            <h4 class="title">Perkembangan Kegiatan Internasional</h4>
            <p class="category">Data dalam grafik</p>
          </div>
          <div class="content" id="chart2">
            <form id="filterForm" class="form-inline" action="/admin/statistik/dataline" method="get">
              <div class="form-group">
                <select class="form-control input-sm" name="y" id="opsitahun" onchange="yearChange();">
                  @foreach ($option2 as $key => $value)
                    <option value="{{$value->year}}" {{isTahunSelected($value->year)}}>{{$value->year}}</option>
                  @endforeach
                </select>
                <script type="text/javascript">
                  function idChange(){
                    document.getElementById("opsitahun").selectedIndex=0;
                    document.getElementById("filterForm").submit();
                  }
                  function yearChange(){
                    document.getElementById("filterForm").submit();
                  }
                </script>
              </div>
            </form>
            <hr>
            @include('chart.filteredline')
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
function isTahunSelected($value){
    if(isset($_GET['y']) AND $value == $_GET['y']){
        return 'selected="selected"';
    }else{
        return '';
    }
}
?>
@endsection
