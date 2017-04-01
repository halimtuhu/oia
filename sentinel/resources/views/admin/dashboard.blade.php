@extends('layout.app')
@section('title', 'Admin Dashboard')

@section('greeting')

@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="header">
            <h4 class="title">Data Kegiatan Internasional</h4>
            <p class="category">Jumlah kegiatan tiap unit/fakultas di tahun ini</p>
          </div>
          <div class="content">
            @include('chart.pie');
            <div class="footer" align="center">
              <button class="btn btn-primary btn-sm" type="button" onclick="location.href='admin/statistik'">See More</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="header">
            <h4 class="title">Perkembangan Kegiatan Internasional</h4>
            <p class="category">Data perkembangan di tahun ini</p>
          </div>
          <div class="content">
            @include('chart.line')
            <div class="footer" align="center">
              <button class="btn btn-primary btn-sm" type="button" onclick="location.href='admin/statistik'">See More</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7">
        <div class="card">
          <div class="header">
            <div class="pull-left">
              <h4 class="title">Daftar Kegiatan Terbaru</h4>
              <p class="category">Berikut 7 kegiatan yang baru ditambahkan</p>
            </div>
            <div class="pull-right">
              <button class="btn btn-primary btn-sm" type="button" onclick="location.href='admin/kegiatan'">See More</button>
            </div>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Judul</td>
                    <td>Pelaksana</td>
                    <td>Waktu Lapor</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data3 as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->judul}}</td>
                      <td>{{$value->pelaksana}}</td>
                      <td>{{$value->created_at}}</td>
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
            <div class="pull-left">
              <h4 class="title">Aktifitas Terakhir</h4>
              <p class="category">Berikut 7 aktifitas terbaru di sistem</p>
            </div>
            <div class="pull-right">
              <button class="btn btn-primary btn-sm" type="button" onclick="location.href='admin/log'">See More</button>
            </div>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <td>Waktu</td>
                    <td>User</td>
                    <td>Perilaku</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data4 as $key => $value)
                    <tr>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->name}}</td>
                      <td>{!!$value->activity!!}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
