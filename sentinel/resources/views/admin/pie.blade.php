@extends('layout.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="header">
            <h4 class="title">Data Kegiatan Internasional</h4>
            <p class="category">Data dalam tabel</p>
          </div>
          <div class="content">
            <form id="filterForm" class="form-inline" action="/admin/statistik/datapie" method="get">
              <div class="form-group">
                <select class="form-control input-sm" name="id" onchange="idChange();">
                  <option value="null" {{isUnitSelected("null")}}>~Semua Unit~</option>
                  @foreach ($option1 as $key => $value)
                    <option value="{{$value->id}}" {{isUnitSelected($value->id)}}>{{$value->name}}</option>
                  @endforeach
                </select>
                <select class="form-control input-sm" name="y" id="opsitahun" onchange="yearChange();">
                  <option value="null" {{isTahunSelected("null")}}>~Semua Tahun~</option>
                  @foreach ($option2 as $key => $value)
                    <option value="{{$value->year}}" {{isTahunSelected($value->year)}}>{{$value->year}}</option>
                  @endforeach
                </select>
                <select class="form-control input-sm" name="m" id="opsibulan" onchange="monthChange();">
                  <option value="null" {{isBulanSelected("null")}}>~Semua Bulan~</option>
                  @foreach ($option3 as $key => $value)
                    <option value="{{$value->month}}" {{isBulanSelected($value->month)}}>{{$value->month}}</option>
                  @endforeach
                </select>
                <script type="text/javascript">
                  function idChange(){
                    document.getElementById("opsitahun").selectedIndex=0;
                    document.getElementById("opsibulan").selectedIndex=0;
                    document.getElementById("filterForm").submit();
                  }
                  function yearChange(){
                    document.getElementById("opsibulan").selectedIndex=0;
                    document.getElementById("filterForm").submit();
                  }
                  function monthChange(){
                    document.getElementById("filterForm").submit();
                  }
                </script>
              </div>
            </form>
            <hr>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Nama Pelaksana</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data1 as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->name}}</a></td>
                      <td>{{$value->jumlah}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="header">
            <h4 class="title">Data Kegiatan Internasional</h4>
            <p class="category">Data dalam grafik</p>
          </div>
          <div class="content" id="chart1">
            @include('chart.pie')
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  function isBulanSelected($value){
      if(isset($_GET['m']) AND $value == $_GET['m']){
          return 'selected="selected"';
      }else{
          return '';
      }
  }
  function isTahunSelected($value){
      if(isset($_GET['y']) AND $value == $_GET['y']){
          return 'selected="selected"';
      }else{
          return '';
      }
  }
  function isUnitSelected($value){
      if(isset($_GET['id']) AND $value == $_GET['id']){
          return 'selected="selected"';
      }else{
          return '';
      }
  }
  ?>
@endsection
