<? @extends ('layouts.dashboard') ?>
@section ('title') Panel Tambah User 
@endsection
@section ('content')
    <form action="/user/tambahAction" method="post" class="form-horizontal">
      {!! csrf_field() !!}
      <div class="form-group">
        <label class="control-label col-sm-2" for="nama">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Name Faculty" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="username">Username:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="password" name="username" placeholder="Enter Username" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Faculty" required="">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="button" class="btn btn-succes">Insert</button>
        </div>
      </div>
    </form>
@endsection
