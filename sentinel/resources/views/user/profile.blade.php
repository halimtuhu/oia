@extends ('layout.app')

@section ('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="header">
            <h4 class="title">Edit Profil</h4>
          </div>
          <div class="content">
            <form action="profil/{{$user->id}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              {{method_field('PUT')}}

              <div class="form-group">
                <label class="control-label col-sm-2" for="nama">Nama:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Faculty" required="" value="{{$user->name}}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="nama">NIP:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter Name Faculty" required="" value="{{$user->nip}}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="username">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Username" required="" value="{{$user->email}}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pelaksana">Pelaksana:</label>
                <div class="col-sm-10">
                  <textarea class="form-control d-inline" id="pelaksana" name="pelaksana" rows="8" cols="80" placeholder="Setiap pelaksana di pisahkan dengan [enter]"><?php
                    foreach ($pelaksana as $key => $value) {
                      echo $value->pelaksana . "\r\n";
                    }
                  ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
