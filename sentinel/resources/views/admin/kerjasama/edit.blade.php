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
            <form action="/admin/kerjasama/{{$kerjasama->id}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              {{method_field('PUT')}}

              <div class="form-group">
                <label class="control-label col-sm-2" for="instansi">Name Instansi:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Enter Name Instansi" required="" value="{{$kerjasama->instansi}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="jenis">Jenis Kerjasama:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Enter Kind of Cooperation" required="" value="{{$kerjasama->jenis}}">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="bentuk">Bentuk Kerjasama:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="bentuk" name="bentuk" placeholder="Enter Form of Cooperation" required="" value="{{$kerjasama->bentuk}}">
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label col-sm-2" for="tgl_selesai">
                  Tanggal Mulai
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="pe-7s-date"></span>
                  </div>
                  <input class="form-control datepicker" id="tgl_mulai" name="tgl_mulai" placeholder="MM-DD-YYYY" type="text" value="{{date("d-m-Y", strtotime($kerjasama->tgl_mulai))}}" required="required" onchange="datecompare();"/>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label col-sm-2" for="tgl_selesai">
                  Tanggal Berakhir
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="pe-7s-date"></span>
                  </div>
                  <input class="form-control datepicker" id="tgl_selesai" name="tgl_expired" placeholder="MM-DD-YYYY" type="text" value="{{date("d-m-Y", strtotime($kerjasama->tgl_expired))}}" required="required" onchange="datecompare();"/>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="isi">Isi:</label>
                <div class="col-sm-10">
                  <textarea class="form-control tinymce" cols="40" name="isi" rows="10" placeholder="Content of Cooperation">{!!$kerjasama->bentuk!!}</textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-succes" onmouseover="datecompare();">Update</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function datecompare()
    {
      if(document.getElementById('tgl_mulai') && document.getElementById('tgl_mulai').value && document.getElementById('tgl_selesai') && document.getElementById('tgl_selesai').value){
        var startDt = document.getElementById('tgl_mulai').value.split("-").reverse().join("-");
        var endDt = document.getElementById('tgl_selesai').value.split("-").reverse().join("-");

        if((startDt) > (endDt)){
            sihi.showNotification("warning", "Check your date input dude!", "right");
            document.getElementById("tgl_mulai").value = "";
            document.getElementById("tgl_selesai").value = "";
        }
      }
    }
  </script>
@endsection
