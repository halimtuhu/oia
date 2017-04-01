@extends('layout.app')
@section('title', 'judul kegiatan')
@section('content')
  <!-- content goes form here -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="content">
            <form method="post" action="/admin/kegiatan" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group ">
                <label class="control-label requiredField" for="judul">
                  Nama Kegiatan
                  <span class="asteriskField">*</span>
                </label>
                <input class="form-control" id="judul" name="judul" placeholder="Judul event" type="text" value="" required="required"/>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tgl_mulai">
                  Tanggal Mulai
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="pe-7s-date" onclick="pickDate();"></span>
                  </div>
                  <input class="form-control datepicker" id="tgl_mulai" name="tgl_mulai" placeholder="DD-MM-YYYY" type="text" value="" required="required" onchange="datecompare()"/>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tgl_selesai">
                  Tanggal Berakhir
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="pe-7s-date"></span>
                  </div>
                  <input class="form-control datepicker" id="tgl_selesai" name="tgl_selesai" placeholder="DD-MM-YYYY" type="text" value="" required="required" onchange="datecompare();"/>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="pelaksana">
                  Pelaksana
                  <span class="asteriskField">*</span>
                </label>
                <select class="form-control" name="pelaksana">
                  @foreach ($pelaksana as $key => $value)
                    <option value="{{$value->pelaksana}}">{{$value->pelaksana}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tempat">
                  Lokasi Kegiatan
                  <span class="asteriskField">*</span>
                </label>
                <textarea class="form-control" cols="40" id="tempat" name="tempat" rows="3" required="required"></textarea>
              </div>

              <ul class="nav nav-tabs nav-tabs-responsive">
                <li class="active"><a href="#pre" data-toggle="tab">Prakegiatan</a></li>
                <li><a href="#live" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#post" data-toggle="tab">Pascakegiatan</a></li>
              </ul>
              <hr>

              <div class="tab-content">
                <div class="tab-pane fade in active" id="pre">
                  <div class="form-group ">
                    <label class="control-label" for="desk_pre">
                      Deskripsi Prakegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_pre" rows="10"></textarea>
                  </div>
                  <br>
                </div>

                <div class="tab-pane fade" id="live">
                  <div class="form-group ">
                    <label class="control-label" for="desk_live">
                      Deskripsi Kegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_live" rows="10"></textarea>
                  </div>
                </div>

                <div class="tab-pane fade" id="post">
                  <div class="form-group ">
                    <label class="control-label" for="desk_post">
                      Deskripsi Pascakegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_post" rows="10"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div style="text-align: center">
                  <button class="btn btn-success" name="back" type="button" onclick="history.go(-1);">Kembali</button>
                  <button class="btn btn-primary" name="tambah_btn" type="submit" onmouseover="datecompare();">Tambah</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content end here -->
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
