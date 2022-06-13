{{-- Extends layout --}}
@extends('user.layout.apps')

{{-- Content --}}
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="flex-row-fluid ml-lg-8">
                <!--begin::Card-->

                <div class="card card-custom card-stretch">
                    
                    <form method="POST" action="{{ url('update-profile') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Profil Anda</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Perbarui data diri anda...</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Crop Image Before Upload Using Croppie.js in Laravel 9</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <div id="cropie-demo" style="width:250px"></div>
                                        </div>
                                        <div class="col-md-4" style="padding-top:30px;">
                                            <strong>Select Image:</strong>
                                            <input type="file" id="upload">
                                            <br />
                                            <button class="btn btn-success upload-result">Upload Image</button>
                                        </div>


                                        <div class="col-md-4">
                                            <div id="image-preview"
                                                style="background:#e1e1e1;padding:30px;height:200px;"></div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('storage/' . auth()->user()->user_image) }})">
                                        <div class="image-input-wrapper" style="background-image: url(assets/media/users/300_21.jpg)"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="user_image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">File yang diizinkan: png, jpg, jpeg.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">NIP</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->nip }}" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" value="{{ auth()->user()->name }}" readonly/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Instansi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->nama }}" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h5 class="font-weight-bold mt-10 mb-6">Kontak</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Nomor Telepon</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $user->notelp }}" placeholder="No Hp" name="notelp" />
                                    </div>
                                    @error('notelp')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Kata Sandi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg form-control-solid" placeholder="Kata Sandi" name="password" />
                                    </div>
                                    <span class="form-text text-muted">Kosongkan Jika Tidak Ingin Di Ubah</span>

                                    @error('password')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg form-control-solid" placeholder="Konfirmasi Kata Sandi" name="confirm-password"  />
                                    </div>
                                    <span class="form-text text-muted">Kosongkan Jika Tidak Ingin Di Ubah</span>

                                    @error('confirm-password')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--end::Body-->
                        <div class="card-footer">
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                <button type="button" class="btn btn-secondary">Batal</button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('js')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('') }}js/pages/widgets.js"></script>
	<script src="{{ asset('') }}js/pages/custom/profile/profile.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $uploadCrop = $('#cropie-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });


        $('#upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });


        $('.upload-result').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                $.ajax({
                    url: "{{ route('imageCrop') }}",
                    type: "POST",
                    data: {
                        "image": resp
                    },
                    success: function(data) {
                        html = '<img src="' + resp + '" />';
                        $("#image-preview").html(html);
                    }
                });
            });
        });

    </script>

    @if (session()->has('success'))
        <script>
            Swal.fire(
                'success',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
@endsection
