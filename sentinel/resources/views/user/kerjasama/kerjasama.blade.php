@extends('layout.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="header">
            <h4 class="title">Daftar Kerjasama Terdaftar</h4>
            <p class="category">Berikut adalah daftar kerjasama di {{Sentinel::getUser()->name}}</p>
            <p class="category">Untuk menambah kerjasama silahkan <a href="/kerjasama/create">klik disini</a>.</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Instansi</th>
                    <th>Jenis Kerjasama</th>
                    <th>Bentuk Kerjasama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kerjasamas as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->instansi}}</td>
                      <td>{{$value->jenis}}</td>
                      <td>{{$value->bentuk}}</td>
                      <td>{{$value->tgl_mulai}}</td>
                      <td>{{$value->tgl_expired}}</td>
                      <td>
                        <button class="btn btn-primary btn-xs d-inline" onclick="location.href='/kerjasama/{{$value->id}}/edit'">Ubah</button>
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
