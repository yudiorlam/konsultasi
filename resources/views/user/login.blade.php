<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Sign In | PERIKSA KI' </title>
		<meta name="description" content="Singin page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('/') }}css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{/media/logos/favicon.ico') }}" />
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<div class="d-flex flex-column flex-root">
			<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
					<div class="login-content d-flex flex-column pt-lg-0 pt-12">
						<a  href="#" class="login-logo pb-xl-20 pb-15 text-center">
							<img src="{{ asset('/') }}media/lutim.png"  alt="" style="width: 100px " />
							<img src="{{ asset('/') }}media/ds.png"  alt="" style="width: 120px " />
						</a>
						<div class="login-form">
							<form class="form" id="" action="{{ route('actionlogin') }}" method="post">
								@csrf
								<div class="pb-5 pb-lg-15">
									<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
									<div class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="custom/pages/login/login-4/signup.html" class="text-primary font-weight-bolder">Create Account</a></div>
								</div>
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">NIP/Email</label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('login') is-invalid @enderror" type="text" name="login" value="{{ old('login') }}"/>
									@error('login')
										<div class="invalid-feedback">
												{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0 @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off"/>
									@error('password')
										<div class="invalid-feedback">
												{{ $message }}
										</div>
									@enderror
								</div>
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
					<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
						<h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">PERIKSA KI'
						</h3>
						<h1 class="pt-lg-5 pl-lg-20 pb-lg-0 pl-5 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 text-white" >(Peningkatan Peran Inspektorat Daerah Kabupaten Luwu Timur Melalui Layanan Konsultasi)</h1>
					</div>
				</div>
			</div>
		</div>
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<script src="{{ asset('/') }}plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('/') }}plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{ asset('/') }}js/scripts.bundle.js"></script>
		<script src="{{ asset('/') }}js/pages/custom/login/login-4.js"></script>
	</body>
</html>