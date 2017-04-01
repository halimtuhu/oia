@extends('layout.app')

@section('title', 'Kegiatan Internasional')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Daftar Kegiatan Internasional</h4>
            <p class="category">Berikut adalah data kegiatan internasional di {{Sentinel::getUser()->name}}</p>
            <p class="category">Untuk menambah kegiatan <a href="/kegiatan/create">klik disini</a>.</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table dataTable" data-pg-collapsed>
                <thead data-pg-collapsed>
                  <tr>
                    <th>#</th>
                    <th>Judul Event</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Pelaksana</th>
                    <th>Aksi Admin</th>
                  </tr>
                </thead>

                <tbody data-pg-collapsed>
                  @foreach ($events as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->judul}}</td>
                      <td>{{$value->tgl_mulai}} - {{$value->tgl_selesai}}</td>
                      <td>{{$value->pelaksana}}</td>
                      <td>
                        <button class="btn btn-primary btn-xs d-inline" onclick="location.href='/kegiatan/{{$value->id}}/edit'">Ubah</button>
                      </td>
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
