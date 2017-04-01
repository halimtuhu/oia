@extends('layout.app')
@section('title', 'SIHI')
@section('content')
  <div class="container-fluid">
    @if (!empty($imageurl))
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Selamat Datang Admin {{Sentinel::getUser()->name}}</h4>
              <p class="category">Berikut adalah 7 gambar kegiatan terbaru {{Sentinel::getUser()->name}}</p>
            </div>
            <div class="content">
              <div class="responsive-table">
                <table class="table">
                  <tr style="text-align: center;">
                    @php
                      $imgcount = 7;
                    @endphp
                    @foreach (array_reverse($imageurl) as $key => $value)
                      <td><a href="/kegiatan/{{explode('/', $value)[3]}}/edit"><img src="{{$value}}" alt="{{$value}}" height="200px"></a></td>
                      @php
                        $imgcount--;
                        if($imgcount <= 0){
                          break;
                        }
                      @endphp
                    @endforeach
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif

    @if (!$events->isEmpty())
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <div class="pull-left">
                <h4 class="title">Daftar Kegaiatan Terbaru</h4>
                <p class="category">Berikut adalah 7 kegiatan terbaru {{Sentinel::getUser()->name}}</p>
              </div>
              <div class="pull-right">
                <button class="btn btn-primary btn-sm" onclick="location.href='/kegiatan/create'">Tambah</button>
              </div>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table" data-pg-collapsed>
                  <thead data-pg-collapsed>
                    <tr>
                      <th>#</th>
                      <th>Nama Kegiatan</th>
                      <th>Waktu Pelaksanaan</th>
                      <th>Pelaksana</th>
                  </thead>

                  <tbody data-pg-collapsed>
                    @foreach ($events as $key => $value)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->judul}}</td>
                        <td>{{$value->tgl_mulai}} - {{$value->tgl_selesai}}</td>
                        <td>{{$value->pelaksana}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div align="center">
                <button class="btn btn-primary btn-sm" onclick="location.href='/kegiatan'">Selengkapnya</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Selamat datang pendatang baru!</h4>
              <p class="category">Salam pembuka</p>
            </div>
            <div class="content">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div align="center">
                <button class="btn btn-primary btn-sm" onclick="location.href='/kegiatan/create'">Tambah Kegiatan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection
