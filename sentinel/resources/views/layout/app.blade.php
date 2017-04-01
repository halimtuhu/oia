<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"> --}}
	<link rel="stylesheet" href="/css/responsive-table.css">
	<link href="/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/css/animate.min.css" rel="stylesheet"/>
  <link href="/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/css/sihi.css">
	{{-- pikaday css --}}
	<link rel="stylesheet" href="/plugins/pikaday/pikaday.css">
	{{-- datatable css --}}
	<link rel="stylesheet" type="text/css"
 	href="/plugins/DataTables/datatables.css">
	{{-- bs-fileinput --}}
		<link href="/plugins/bs-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<script src="/js/main.js" type="text/javascript"></script>
		<script src="/plugins/bs-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
		<script src="/plugins/bs-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
		<script src="/plugins/bs-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
		<script src="/plugins/bs-fileinput/js/fileinput.min.js"></script>
		<script src="/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/js/chart.js" type="text/javascript"></script>

	<style media="screen">
		.d-inline{
			display: inline-block;
		}
	</style>
</head>
@php
	$alert = "";
	if (session('info')) {
		$alert = 'onload="sihi.showNotification(\''.session('type').'\', \''.session('info').'\', \'right\')"';
	}else{
		$alert = "";
	}
@endphp
<body <?php echo $alert;?>>

<div class="wrapper">
    @if (Sentinel::getUser()->roles()->first()->slug == 'admin')
    	@include('admin.sidebar')
    @else
			@include('user.sidebar')
		@endif

    <div class="main-panel">
      @include('layout.navbar')


      <div class="content">
				@yield('content')
      </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Sistem Agregasi Data Internasional
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Sistem Agregasi Berkas Migrasi
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 Kantor Hubungan Internasional Universitas Negeri Malang
                </p>
            </div>
        </footer>

    </div>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> --}}
{{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
<script src="/js/bootstrap-checkbox-radio-switch.js"></script>
<script src="/js/bootstrap-notify.js"></script>
<script src="/js/light-bootstrap-dashboard.js"></script>
<script src='/plugins/tinymce/tinymce.min.js'></script>
<script src='/plugins/tinymce/tinymce.init.js'></script>
<script src="/plugins/pikaday/moment.js"></script>
<script src="/plugins/pikaday/pikaday.js"></script>
<script src="/js/sihi.js"></script>
{{-- Datatable js --}}
<script type="text/javascript" src="/plugins/DataTables/datatables.js"></script>

<script>
	var picker1 = new Pikaday({
		field: document.getElementById('tgl_mulai'),
		format: 'DD-MM-YYYY'
	});
	var picker2 = new Pikaday({
		field: document.getElementById('tgl_selesai'),
		format: 'DD-MM-YYYY'
	});
	$(document).ready( function () {
		$('.dataTable').DataTable();
	});
</script>
{{-- Java Scrpt End here --}}

</body>
</html>
