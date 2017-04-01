@extends('layout.app')

@section('title', 'Kegiatan Internasional')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Daftar Kegiatan Internasional</h4>
            <p class="category">Berikut adalah daftar kegiatan internasional di UM</p>
            <p class="category">Untuk menambah kegiatan  <a href="/admin/kegiatan/create">klik disini</a>.</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table dataTable" data-pg-collapsed>
                <thead data-pg-collapsed>
                  <tr>
                    <th>#</th>
                    <th>Judul Kegiatan</th>
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
                        <button class="btn btn-primary btn-xs d-inline" onclick="location.href='/admin/kegiatan/{{$value->id}}/edit'">Ubah</button>
                        <form class="d-inline" action="/admin/kegiatan/{{$value->id}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" class="btn btn-xs btn-danger" name="delete">Hapus</button>
                        </form>
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
