@extends ('layout.app')

@section ('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="header">
            <h4 class="title">Form Edit</h4>
          </div>
          <div class="content">
            <form action="/admin/register" method="post" class="form-horizontal">
              {!! csrf_field() !!}
              <div class="form-group">
                <label class="control-label col-sm-2" for="nama">Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Faculty" required value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="nama">NIP:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter NIP" required value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="username">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Password Confirmation:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype the password" required value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="button" onclick="Location.href='/admin/user'">Kembali</button>
                  <button type="submit" name="button" class="btn btn-succes">Create</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
