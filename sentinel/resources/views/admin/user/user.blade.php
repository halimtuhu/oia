@extends('layout.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="header">
            <h4 class="title">Daftar User Terdaftar</h4>
            <p class="category">Berikut adalah user yang terdaftar kedalam sistem.</p>
            <p class="category">Untuk menambah user silahkan <a href="/admin/register">klik disini</a>.</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIP</th>
                    <th>Terakhir Masuk</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{$value->nip}}</td>
                      <td>{{$value->last_login}}</td>
                      <td>
                        <button class="btn btn-primary btn-xs d-inline" onclick="location.href='/admin/user/{{$value->id}}/edit'">Ubah</button>
                        <form class="d-inline" action="/admin/user/{{$value->id}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button class="btn btn-danger btn-xs">Hapus</button>
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
