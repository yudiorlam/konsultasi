<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>

		<meta charset="utf-8" />
		<title>Private | Keenthemes</title>
		<meta name="description" content="Private chat example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('/') }}plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/style.bundle.css" rel="stylesheet" type="text/css" />

		<link href="{{ asset('/') }}css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/') }}css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('/') }}media/logos/favicon.ico" />

		{{-- waitMe --}}
		<link href="{{ asset('/') }}plugins/waitme/waitMe.min.css" rel="stylesheet" type="text/css" />
		
	</head>
	<body id="kt_body " class="page-loading">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					@include('admin.layout.nav')

				</div>
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="d-flex flex-row">
									<div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
										<div class="card card-custom">
								
											<div class="card-header align-items-center px-4">
												<div class="text-left flex-grow-1">
										
													<div class="dropdown dropdown-inline">
									
														<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<img src="{{ asset('storage/'. auth()->user()->user_image) }}" width="40px" height="40" class="rounded-circle border-5" alt="">
														</a> 
														<div class="dropdown-menu p-0 m-0 dropdown-menu-left dropdown-menu-md">
															<!--begin::Navigation-->
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">New</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Contacts</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
																		<span class="navi-text">Groups</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-primary label-inline font-weight-bold">new</span>
																		</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Calls</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-gear"></i>
																		</span>
																		<span class="navi-text">Settings</span>
																	</a>
																</li>
																<li class="navi-separator my-3"></li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-magnifier-tool"></i>
																		</span>
																		<span class="navi-text">Help</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-bell-2"></i>
																		</span>
																		<span class="navi-text">Privacy</span>
																		<span class="navi-link-badge">
																			<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																		</span>
																	</a>
																</li>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown Menu-->
												</div>
												<div class="text-center flex-grow-1">
													<div class="text-dark-75 font-weight-bold font-size-h5">
														{{ auth()->user()->name }}
													</div>
													<div>
														<span class="font-weight-bold text-muted font-size-sm">
															@if(auth()->user()->role == 3)
																{{ auth()->user()->nip }}
															@else
																{{ auth()->user()->email }}
															@endif
														</span>
													</div>
												</div>
												<div class="text-right flex-grow-1">
													<!--begin::Dropdown Menu-->
													<div class="dropdown dropdown-inline">
														<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"{{ asset('/') }}>
																	<path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M14.4862 18L12.7975 21.0566C12.5304 21.54 11.922 21.7153 11.4386 21.4483C11.2977 21.3704 11.1777 21.2597 11.0887 21.1255L9.01653 18H5C3.34315 18 2 16.6569 2 15V6C2 4.34315 3.34315 3 5 3H19C20.6569 3 22 4.34315 22 6V15C22 16.6569 20.6569 18 19 18H14.4862Z" fill="black"{{ asset('/') }}>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M6 7H15C15.5523 7 16 7.44772 16 8C16 8.55228 15.5523 9 15 9H6C5.44772 9 5 8.55228 5 8C5 7.44772 5.44772 7 6 7ZM6 11H11C11.5523 11 12 11.4477 12 12C12 12.5523 11.5523 13 11 13H6C5.44772 13 5 12.5523 5 12C5 11.4477 5.44772 11 6 11Z" fill="black"{{ asset('/') }}>
																</g>
															</svg>
														</span>

														</button>
														<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
															<ul class="navi navi-hover py-5">
																<li class="navi-item">
																	<a href="javascript:void(0)" onclick="mulai_konsultasi()" class="btn btn-text-success btn-hover-light-success font-weight-bold mr-2">
																		<span class="navi-icon">
																			<i class="flaticon2-drop"></i>
																		</span>
																		<span class="navi-text">Konsultasi</span>
																	</a>
																</li>
																<form action="{{ url('/actionlogout') }}" method="post">
																	@csrf
																	<li class="navi-item">
																	<button type="submit" class="btn btn-text-success btn-hover-light-success font-weight-bold mr-2">
																		<span class="navi-icon">
																			<i class="flaticon2-list-3"></i>
																		</span>
																		<span class="navi-text">Logout</span>
																	</button>
																</li>
																</form>
															</ul>
															<!--end::Navigation-->
														</div>
													</div>
													<!--end::Dropdown Menu-->
												</div>
											</div>


											<div class="card-body py-2">
												<div class="input-group input-group-solid">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
															</span>
														</span>
													</div>
														<input type="text" class="form-control py-4 h-auto" placeholder="Email" />
													</div>

												<div class="scroll scroll-pull mt-3">
													
													@yield('sidebar')

												</div>
											</div>
										</div>
									</div>

                                    @yield('content')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="{{ asset('/') }}plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('/') }}plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{ asset('/') }}js/scripts.bundle.js"></script>
		<script src="{{ asset('/') }}plugins/loading-overlay/loadingoverlay.min.js"></script>
		<script src="{{ asset('/') }}js/pages/custom/chat/chat.js"></script>

		{{-- waitMe --}}
		<script src="{{ asset('/') }}plugins/waitme/waitMe.min.js"></script>

		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

		
        @yield('js')

	</body>
</html>