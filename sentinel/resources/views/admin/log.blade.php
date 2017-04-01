@extends('layout.app')
@section('title', 'Admin Dashboard')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Log Aktivitas</h4>
            <p class="category">Berikut log aktivitas di dalam sistem.</p>
          </div>
          <div class="content">
            <div class="table-responsive">
              <table class="table table-hover dataTable">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Waktu</td>
                    <td>User</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logs as $key => $value)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>{{$value->name}}</td>
                      <td>{!!$value->activity!!}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div align="center">
              <form action="/admin/log" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-primary btn-sm" type="submit">Clear</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
