<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icon/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('images/icon/site.webmanifest') }}">

	<!-- Script file -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/icon-font.min.css') }}">
	@auth
		<link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/cropperjs/dist/cropper.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	@endauth
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/style.css') }}">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="@auth header-dark @else login-page @endauth">
	@auth
		<!-- Flush message -->
		@if (session('flush-alert'))
			<div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center">
							<div class="alert alert-{{ session('flush-type') }} alert-dismissible fade show" role="alert">
								<strong>Holy guacamole!</strong> You should check in on some of those fields below.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif

		@include('layouts.header')

		@include('layouts.sidebar')

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="min-height-200px">
					@yield('content')
					@include('layouts.footer')
				</div>
			</div>
		</div>
	@else
		@yield('content-basic')
	@endauth

	<script src="{{ asset('theme/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('theme/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('theme/vendors/scripts/process.js') }}"></script>
	@auth
		<script src="{{ asset('theme/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
		<script src="{{ asset('theme/src/plugins/cropperjs/dist/cropper.js') }}"></script>
		<script src="{{ asset('theme/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('theme/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('theme/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('theme/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
		<!-- Page script -->
		@yield('scripts')
		<!-- Change active class -->
		@if (session('flush-alert')) {
			<script>
				$(function () {
					setTimeout(function () {$('#alert-modal').modal('show')}, 500);
					setTimeout(function () {$('#alert-modal').modal('hide')}, 4000);
				});
			</script>
		@endif
	@endauth
</body>
</html>
