@extends('layout.app')
@section('title', 'judul kegiatan')
@section('content')
  @php
    $imagetodelete = ""
  @endphp
  <!-- content goes form here -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="content">
            <form method="post" action="/admin/kegiatan/{{$kegiatan->id}}" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}

              <div class="form-group ">
                <label class="control-label requiredField" for="judul">
                  Nama Kegiatan
                  <span class="asteriskField">*</span>
                </label>
                <input class="form-control" id="judul" name="judul" placeholder="Judul event" type="text" value="{{$kegiatan->judul}}" required="required"/>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tgl_mulai">
                  Tanggal Mulai
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                  <input class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="MM-DD-YYYY" type="text" value="{{date("d-m-Y", strtotime($kegiatan->tgl_mulai))}}" required="required" onchange="datecompare();"/>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tgl_selesai">
                  Tanggal Berakhir
                  <span class="asteriskField">*</span>
                </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </div>
                  <input class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="MM-DD-YYYY" type="text" value="{{date("d-m-Y", strtotime($kegiatan->tgl_selesai))}}" required="required" onchange="datecompare();"/>
                </div>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="pelaksana">
                  Pelaksana
                  <span class="asteriskField">*</span>
                </label>
                <select class="form-control" name="pelaksana">
                  <?php
                    $selected = "";
                    foreach ($pelaksana as $key => $value) {
                      $selected = ($value->pelaksana == $kegiatan->pelaksana ? "selected" : "");
                      ?>
                      <option value="{{$value->pelaksana}}" {{$selected}}>{{$value->pelaksana}}</option>
                      <?php
                    }
                  ?>
                </select>
              </div>

              <div class="form-group ">
                <label class="control-label requiredField" for="tempat">
                  Lokasi Kegiatan
                  <span class="asteriskField">*</span>
                </label>
                <textarea class="form-control" cols="40" id="tempat" name="tempat" rows="3" required="required">{{$kegiatan->tempat}}</textarea>
              </div>

              <ul class="nav nav-tabs nav-tabs-responsive">
                <li class="active"><a href="#desk_pre" data-toggle="tab">Prakegiatan</a></li>
                <li><a href="#desk_live" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#desk_post" data-toggle="tab">Pascakegiatan</a></li>
              </ul>
              <hr>

              <div class="tab-content">
                <div class="tab-pane fade in active" id="desk_pre">
                  <div class="form-group ">
                    <label class="control-label" for="desk_pre">
                      Deskripsi Prakegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_pre" rows="10">{{$kegiatan->desk_pre}}</textarea>
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="control-label">Gambar Prakegiatan</label>
                    <div class="form-group">
                      <label class="control-label">Pilih Gamabr <small>ukuran maks 5 Mb</small></label>
                      <input id="bs-input" name="preimg[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["png", "jpg", "jpeg", "gif", "JPG", "PNG", "JPEG"]'>
                    </div>
                    <div class="responsive-table">
                      <table class="table">
                        <tr style="text-align: center;">
                          @foreach ($preimage as $key => $value)
                            <td><img src="/storage/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}" alt="{{$value}}" height="200px"></td>
                          @endforeach
                        </tr>
                        <tr style="text-align: center;">
                          @foreach ($preimage as $key => $value)
                            <td>
                              <button type="submit" class="btn btn-xs btn-danger" name="delete" formaction="/admin/kegiatan/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}">Hapus</button>
                            </td>
                          @endforeach
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="desk_live">
                  <div class="form-group ">
                    <label class="control-label" for="desk_live">
                      Deskripsi Kegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_live" rows="10">{{$kegiatan->desk_live}}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Gambar Prakegiatan</label>
                    <div class="form-group">
                      <label class="control-label">Pilih Gamabr <small>ukuran maks 5 Mb</small></label>
                      <input id="bs-input" name="liveimg[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["png", "jpg", "jpeg", "gif", "JPG", "PNG", "JPEG"]'>
                    </div>
                    <div class="responsive-table">
                      <table class="table">
                        <tr style="text-align: center;">
                          @foreach ($liveimage as $key => $value)
                            <td><img src="/storage/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}" alt="{{$value}}" height="200px"></td>
                          @endforeach
                        </tr>
                        <tr style="text-align: center;">
                          @foreach ($liveimage as $key => $value)
                            <td>
                              <button type="submit" class="btn btn-xs btn-danger" name="delete" formaction="/admin/kegiatan/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}">Hapus</button>
                            </td>
                          @endforeach
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="desk_post">
                  <div class="form-group ">
                    <label class="control-label" for="desk_post">
                      Deskripsi Pascakegiatan
                    </label>
                    <textarea class="form-control tinymce" cols="40" name="desk_post" rows="10">{{$kegiatan->desk_post}}</textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Gambar Prakegiatan</label>
                    <div class="form-group">
                      <label class="control-label">Pilih Gamabr <small>ukuran maks 2 Mb</small></label>
                      <input id="bs-input" name="postimg[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["png", "jpg", "jpeg", "gif", "JPG", "PNG", "JPEG"]'>
                    </div>
                    <div class="responsive-table">
                      <table class="table">
                        <tr style="text-align: center;">
                          @foreach ($postimage as $key => $value)
                            <td><img src="/storage/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}" alt="{{$value}}" height="200px"></td>
                          @endforeach
                        </tr>
                        <tr style="text-align: center;">
                          @foreach ($postimage as $key => $value)
                            <td>
                              <button type="submit" class="btn btn-xs btn-danger" name="delete" formaction="/admin/kegiatan/{{$kegiatan->uploader}}/{{$kegiatan->id}}/{{$value}}">Hapus</button>
                            </td>
                          @endforeach
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div style="text-align: center">
                  <button class="btn btn-success" name="update" onclick="history.go(-1);">Kembali</button>
                  <button class="btn btn-primary" name="update" type="submit" onmouseover="datecompare();">Update</button>
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
    $("#bs-input").fileinput();
  </script>

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
