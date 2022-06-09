@extends('user.layout.apps')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside">
                        <div class="card card-custom">

                            <div class="card-header align-items-center px-4">
                                <div class="text-left flex-grow-1">

                                    <div class="dropdown dropdown-inline">

                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('storage/' . auth()->user()->user_image) }}" width="40px"
                                                height="40" class="rounded-circle border-5" alt="">
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
                                            {{ auth()->user()->nip }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right flex-grow-1">
                                </div>
                            </div>


                            <div class="card-body py-2">
                                <div class="input-group input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="svg-icon svg-icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    <input type="text" name="search" class="form-control py-4 h-auto" id="search" placeholder="Nama Pegawai" />
                                </div>

                                <div class="scroll scroll-pull mt-3" id="conversations">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                        <div class="card card-custom">
                            <div class="card-header align-items-center px-4 py-3">

                                <div class="text-left flex-grow-1">

                                    {{-- janagn dihapus anjing --}}
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>

                                    <div class="dropdown dropdown-inline">

                                        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="" height="40px" id="receiver_image" alt="" style="border-radius: 100%">
                                        </a>
                                        {{-- <div class="dropdown-menu p-0 m-0 dropdown-menu-left dropdown-menu-md">
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
                                            </ul>
                                            <!--end::Navigation-->
                                        </div> --}}
                                    </div>
                                    <!--end::Dropdown Menu-->
                                </div>

                                <div class="text-center flex-grow-1">
                                    <div>
                                        <div class="text-dark-75 font-weight-bold font-size-h5" id="receiver_name"></div>
                                        <div>
                                            {{-- <span class="label label-sm label-dot label-success"></span>--}}
                                            <span class="font-weight-bold text-muted font-size-sm" id="receiver_nip"></span> 
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="text-right flex-grow-1">
                                    <div class="dropdown dropdown-inline" id="action">

                                    </div>
                                </div> --}}

                                <div class="text-right flex-grow-1">
                                    <div class="dropdown dropdown-inline">
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" cx="5" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                        <circle fill="#000000" cx="19" cy="12" r="2"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>

                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                            <ul class="navi navi-hover py-5">
                                                <li class="navi-item">
                                                    <b href="javascript:void(0)" onclick="mulai_konsultasi()"
                                                        style="width: 100%;text-align: left"
                                                        class="btn btn-text-success btn-hover-light-success font-weight-bold mr-2">
                                                        <span class="navi-icon">
                                                            <i class="flaticon2-drop"></i>
                                                        </span>
                                                        <span class="navi-text">Konsultasi</span>
                                                    </b>
                                                </li>

                                                <div id="akhiri-konsultasi"></div>

                                                <form action="{{ url('/actionlogout') }}" method="post">
                                                    @csrf
                                                    <li class="navi-item">
                                                        <button type="submit" style="width: 100%;text-align: left"
                                                            class="btn btn-text-success btn-hover-light-success font-weight-bold mr-2">
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
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="scroll scroll-pull" id="scroll-messages" data-mobile-height="350">
                                    <div class="messages">

                                        <div class="body-chat">
                                            <div class="text-center">
                                                <img src="{{ asset('img/phone-animasi.png') }}" alt="#" width="50%"
                                                    draggable="false">
                                            </div>

                                            {{-- <div class="mb-2 d-flex flex-column align-items-end">
                                                <i class="fas fa-caret-right mt-2 text-light text-right" style="position: absolute;font-size: 18pt"></i>
                                                <div class="m-0 mr-2 rounded bg-light text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                    <div style="width: 100%;" class="bg-light-primary rounded px-2 py-0">
                                                        <small style="font-size: 8pt">12:12 PM</small> 
                                                        <i class="la la-check-double text-right text-info" style="font-size: 8pt"></i>
                                                    </div>
                                                    <div class="p-2 m-0">
                                                        Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed
                                                    </div>
                                                    <div style="width: 100%;" class="bg-light-primary rounded px-2 py-0">
                                                        <small style="font-size: 8pt">12:12 PM</small> 
                                                        <i class="la la-check-double text-right text-info" style="font-size: 8pt"></i>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="d-flex mb-2 flex-column align-items-end">
                                                <i class="fas fa-caret-right mt-2 text-light text-right" style="position: absolute;font-size: 18pt"></i>
                                                <div class="m-0 mr-2 rounded bg-light text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                    <div class="p-2 m-0">
                                                        Discover what students who vialso viewed
                                                    </div>
                                                    <div style="width: 100%;" class="bg-light-primary rounded px-2">
                                                       <small style="font-size: 8pt">12:12 PM</small> 
                                                        <i class="la la-check-double text-right text-info" style="font-size: 8pt"></i>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mb-2 d-flex flex-column align-items-start">
                                                <i class="fas fa-caret-left mt-2 text-light-success text-left" style="position: absolute;font-size: 18pt"></i>
                                                <div class="m-0 ml-2 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                    <div class="p-2 m-0">
                                                        Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed
                                                    </div>
                                                    <div style="width: 100%;" class="bg-light rounded px-2 py-0">
                                                        <small style="font-size: 8pt">12:12 PM</small> 
                                                        <i class="la la-check-double text-right text-info" style="font-size: 8pt"></i>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mb-5 align-items-start">
                                                <div class="row mt-2 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                    <div class="col-12 rounded p-3 bg-light text-dark-50 font-weight-bold font-size-lg text-left">
                                                        <div class="row ml-2 mr-2">
                                                            <div class="col-1"><i class="far fa-file-pdf text-primary" style="font-size: 18pt"></i></div>
                                                            <div class="col-10"><a href="">Install the latest PowerShell...</td></a></div>
                                                            <div class="col-1"><a href=""><i class="flaticon-download"></i></a></div>
                                                        </div>
                                                    </div>
                                                   <div class="row ml-5 mr-2"><div class="col-12"> <small class="">120 kb - Pdf</small></div></div>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="row rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                <div class="col-12 bg-light">
                                                    <div class="row pl-5">
                                                        <div class="col-6">
                                                            <small>12:12 PM</small>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <small>Anda</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-3 bg-light text-dark-50 font-weight-bold font-size-lg text-left">
                                                    <div class="row ml-2 mr-2">
                                                        <div class="col-1"><i class="far fa-file-pdf text-primary" style="font-size: 18pt"></i></div>
                                                        <div class="col-10"><a href="">Install the latest PowerShell...</td></a></div>
                                                        <div class="col-1"><a href=""><i class="flaticon-download"></i></a></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row pl-5 pr-2 justify-content-center">
                                                        <div class="col-6"><small class="">120 kb - Pdf</small></div>
                                                        <div class="col-6 text-right"><i class="la la-check-double text-right text-info"></i></div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="card-footer align-items-center" id="anjir">
                                <div class="kirim-pesan">
                                    <form id="ajaxFormSend">
                                        @csrf
                                        {{-- <input type="hidden" name="tiket" id="tiket"> --}}
                                        <input type="hidden" name="conv_id" id="id">
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                                        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message" name="body" id="isi-pesan"></textarea>

                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="mr-3">
                                                <a href="#" onclick="uploadAttachment('image')" class="btn btn-clean btn-icon btn-md mr-1 btn-attachment">
                                                    <i class="flaticon2-photograph icon-lg"></i>
                                                </a>
                                                <a href="#" onclick="uploadAttachment('pdf')" class="btn btn-clean btn-icon btn-md btn-attachment">
                                                    <i class="flaticon2-file icon-lg"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6"
                                                    id="tombol-send">Kirim</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal-->
    <div class="modal fade" id="uploadImageModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="attachmentForm">
                    @csrf
                    <input type="hidden" name="att_type" id="att_type">
                    <div class="modal-body">
                        <div class="form-group row">

                            <input type="hidden" id="att_conv_id" name="conv_id">

                            <div class="col-sm-12">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload" 
                                            name="attachment">
                                        <label class="custom-file-label tes" for="inputGroupFile01">Pilih
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <img id="imageResult" alt="" width="100%">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <textarea class="form-control" rows="2" placeholder="Ketikkan sesuatu..." name="att_body" id="att_body"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('') }}/js/pages/crud/file-upload/dropzonejs.js"></script>

    <script>
        $('#search').on('keyup', function(){
            search();
        });

        function search(){
            var keyword = $('#search').val();

            $.ajax({
                url: "{{ url('/search_by_nip_or_name') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'keyword': keyword
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#conversations').waitMe({
                        effect: 'timer',
                        text: "Loading...",
                        color: '#000',
                        bg: 'rgba(255,255,255,0.6)',
                        maxSize: '',
                        waitTime: -1,
                        textPos: 'vertical',
                        fontSize: '',
                        source: '',
                        onClose: function() {}
                    });
                },
                success: function(response) {
                    $('#conversations').html('');
                    $.each(response.data, function(index, value) {
                        var tiket_status = '';
                        
                        if(value.tiket_status == 2){
                            var tiket_status = '<button class="btn btn-danger btn-sm p-0">Sesi telah berakhir...</button>';
                        }

                        if(value.last_chat_from == {{ auth()->user()->id }}){
                            last_chat = '<i class="la la-check-double"></i> ' + value.last_chat;
                        } else {
                            last_chat = value.last_chat;
                        }

                        $('#conversations').append('<div class="d-flex align-items-center justify-content-between mb-5">\
                            <div class="d-flex align-items-center">\
                                <div class="symbol symbol-circle symbol-50 mr-3">\
                                    <img alt="Pic" src="{{ asset('storage') }}/' + value.user_image + '" />\
                                </div>\
                                <div class="d-flex flex-column">\
                                    <a href="javascript:void(0)" onclick="showChat('+ value.conv_id +')" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">'+ value.name + " (" + value.topic_name + ")" +'</a>\
                                    <span class="text-muted font-weight-bold font-size-sm" id="last_chat">'+ last_chat +'</span>\
                                    '+ tiket_status +'\
                                </div>\
                            </div>\
                            <div class="d-flex flex-column align-items-end">\
                                <span class="text-muted font-weight-bold font-size-sm" style="font-size:7pt">'+ value.last_chat_time +'</span>\
                            </div>\
                        </div>');
                    });

                    $('body').waitMe("hide");

                }
            });
        }
    </script>



    <script>
        $('.btn-attachment').addClass('disabled');
        $('#tombol-send').addClass('disabled');

        $('#upload').on("change",function() {
            var file = $('#upload')[0].files[0].name;
            $('.tes').text(file);
        });
        
        function uploadAttachment(type) {
            $('.tes').text('Pilih File');
            $('#att_type').val(type);

            if(type == 'image'){
                $('#uploadImageModalLabel').text('Upload Image');
            } else {
                $('#uploadImageModalLabel').text('Upload Dokumen');
            }

            $('#uploadImageModal').modal('show');
        }
    </script>

    <script>
        $('#ajaxFormSend').keypress(function(e) {
            if (e.which == 13) {
                var id = $('#id').val();

                var ajaxForm = $(this);
                $.ajax({
                    url: "{{ url('send_message') }}",
                    type: 'post',
                    data: ajaxForm.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $('#isi-pesan').val("");
                        fetch_chat(id);
                    }
                });
            }
        });
        // preview image
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $('#upload').on('change', function() {
                readURL(input);
            });
        });

        // send attachment
        $("#attachmentForm").submit(function(evt) {
            var id = $('#id').val();
            evt.preventDefault();
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: "{{ url('send-message-with-attachment') }}",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                beforeSend: function() {
                    $.LoadingOverlay("show", {
                        text: "Mengirim..."
                    });
                },
                success: function(response) {
                    $.LoadingOverlay("hide");

                    if(response.status == 'error'){
                        Swal.fire(
                            'Gagal',
                            response.message,
                            'error'
                        );
                    } else {
                        $('#uploadImageModal').modal('hide');
                        $('#attachmentForm')[0].reset();
                        $('#imageResult').attr('src', '');

                        Swal.fire(
                            'Sukses',
                            'Berhasil mengirim.',
                            'success'
                        );

                        fetch_chat(id);
                    }
                }
            });

            return false;

        });
    </script>

    <script>
        fetch_conv();

        function fetch_conv() {
            $.ajax({
                url: "{{ url('/fetch_conv') }}",
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#conversations').html('');
                    $.each(response.data, function(index, value) {
                        var tiket_status = '';
                        
                        if(value.tiket_status == 2){
                            var tiket_status = '<button class="btn btn-danger btn-sm p-0">Sesi telah berakhir...</button>';
                        }

                        if(value.last_chat_from == {{ auth()->user()->id }}){
                            last_chat = '<i class="la la-check-double"></i> ' + value.last_chat;
                        } else {
                            last_chat = value.last_chat;
                        }

                        $('#conversations').append('<div class="d-flex align-items-center justify-content-between mb-5">\
                            <div class="d-flex align-items-center">\
                                <div class="symbol symbol-circle symbol-50 mr-3">\
                                    <img alt="Pic" src="{{ asset('storage') }}/' + value.user_image + '" />\
                                </div>\
                                <div class="d-flex flex-column">\
                                    <a href="javascript:void(0)" onclick="showChat('+ value.conv_id +')" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">'+ value.name + " (" + value.topic_name + ")" +'</a>\
                                    <span class="text-muted font-weight-bold font-size-sm" id="last_chat">'+ last_chat +'</span>\
                                    '+ tiket_status +'\
                                </div>\
                            </div>\
                            <div class="d-flex flex-column align-items-end">\
                                <span class="text-muted font-weight-bold font-size-sm" style="font-size:7pt">'+ value.last_chat_time +'</span>\
                            </div>\
                        </div>');
                    });
                }
            });
        }

        //mulai konsultasi
        function mulai_konsultasi() {
            clearInterval(interval);
            $('#receiver_name').html("Administrator");
            $('.body-chat').html('');
            $('.kirim-pesan').show();
            ajax_get_topic();
        }

        //get all topic
        function ajax_get_topic() {
            $.ajax({
                url: "{{ url('/ajax_get_topic') }}",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    // $.LoadingOverlay("show");
                    $.LoadingOverlay("show", {
                        image: "",
                        text: "Loading..."
                    });
                    $('.body-chat').html("");
                    $('#list-topic').html("");
                },
                success: function(response) {
                    setTimeout(function() {
                        $.LoadingOverlay("hide");
                        $('.body-chat').append(
                            '<div class="d-flex flex-column mb-5 align-items-end">\
                                <div class="d-flex align-items-center">\
                                    <div>\
                                        <span class="text-muted font-size-sm">3 minushowChat</span>\
                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Administrator</a>\
                                    </div>\
                                    <div class="symbol symbol-circle symbol-40 ml-3">\
                                        <img alt="Pic" src="https://picsum.photos/id/237/200/200" />\
                                    </div>\
                                </div>\
                                <div class="mt-2 mb-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">\
                                    Selamat siang, silahkan pilih topik pembahasan.\
                                </div>\
                                <div id="list-topic">\
                            </div>\
                        </div>'
                        );

                        setTimeout(function() {
                            $.each(response, function(index, value) {
                                $('#list-topic').append(
                                    '<button onclick="ajax_create_conv(' + value
                                    .id +
                                    ')" class="btn btn-sm btn-primary py-1 d-inline ml-2">' +
                                    value.topic_name + '</button>');
                            });
                        }, 2000);
                    }, 3000);
                }
            });
        }

        //buat room dan cari admin yang akan melayani
        function ajax_create_conv(topic_id) {
            // alert(topic_id);
            $.ajax({
                url: "{{ url('/ajax_create_conv') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'topic_id': topic_id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire(
                            'Sukses',
                            response.message,
                            'success'
                        )
                        fetch_conv();
                        showChat(response.data.id, response.nama_admin);
                    } else {
                        Swal.fire(
                            'Error',
                            response.message,
                            'error'
                        )
                    }
                }
            });
        }

        var last_chat_id;
        var interval;

        function showChat(id, name) {
            console.log(id);
            $('.btn-attachment').removeClass('disabled');
            $('#tombol-send').removeClass('disabled');

            $.ajax({
                url: "{{ url('/ajax_get_conv_by_id') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                dataType: 'json',
                success: function(response) {
                    var image = "{{ asset('storage') }}/"+ response.data.user_image +""

                    console.log(image);

                    $("#receiver_image").attr("src", image);
                    $('#receiver_name').html(response.data.name);
                    $('#receiver_nip').html(response.data.nip_baru);
                }
            });

            $('#btn-edit-status-tiket').show();
            fetch_chat(id);

            clearInterval(interval);
            interval = setInterval(function() {
                fetch_chat(id);
            }, 20000);
        }

        function editStatusTiket() {
            var id = $('#id').val();
            console.log(id);
            Swal.fire({
                title: 'Yakin?',
                text: "Apakah anda yakin ingin mengakhiri konsultasi?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('update_status_tiket') }}",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        dataType: 'json',
                        type: "POST",
                        success: function(response) {
                            fetch_chat(id);
                            $('#btn-edit-status-tiket').hide();
                            if (response.status == 'success') {
                                fetch_conv();
                                Swal.fire(
                                    'Sukses',
                                    'Sesi anda telah berakhir.',
                                    'success'
                                )
                            }
                        }
                    });
                }
            })
        }

        function fetch_chat(id) {
            $('#id').val(id);
            $('#att_conv_id').val(id);

            $.ajax({
                url: "{{ url('/ajax_fetch_chats') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'last_chat_id': last_chat_id
                },
                dataType: 'json',
                success: function(response) {
                    var pesan;
                    $('#action').html('');
                    $('.body-chat').html("");

                    if (response.status == 'success') {
                        fetch_conv();
                        // tombol akhiri sesi
                        $('#akhiri-konsultasi').html('');
                        if (response.tiket_status == 1) {
                            $('#akhiri-konsultasi').append('<li class="navi-item"><b href="javascript:void(0)" onclick="editStatusTiket()" style="width: 100%;text-align: left" class="btn btn-text-success btn-hover-light-success font-weight-bold mr-2"><span class="navi-icon"><i class="flaticon-circle"></i></span><span class="navi-text">Akhiri Konsultasi</span></b></li>');
                        }

                        $.each(response.chats, function(index, value) {
                            // is read
                            if (value.is_read == 1) {
                                is_read = '<i class="la la-check-double" style="font-size: 8pt"></i>';
                            } else {
                                is_read = '<i class="la la-check-double text-info" style="font-size: 8pt"></i>';
                            }

                            // is attachment
                            if (value.attachment !== '0') {

                                if(value.attachment.substring(value.attachment.length - 1) == 'g') {
                                    attachment =
                                    '<a data-toggle="modal" data-target="#prevAttachmentModal' + value
                                    .message_id +
                                    '"><img class="img-thumbnail mt-2" width="200px" src="{{ asset('storage') }}' +
                                    '/' + value.attachment +
                                    '"></a> <div class="modal fade" id="prevAttachmentModal' + value
                                    .message_id +
                                    '" tabindex="-1" role="dialog" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-lg" role="document"><div class="modal-content"><img width="100%" src="{{ asset('storage') }}' +
                                    '/' + value.attachment + '"></div></div></div>';
                                } else {
                                    attachment = '<div class="row mt-2 mr-1 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">\
                                                    <div class="col-12 bg-light text-dark-50 font-weight-bold font-size-lg text-left">\
                                                        <div class="row mr-2">\
                                                            <div class="col-1"><i class="far fa-file-pdf text-primary" style="font-size: 18pt"></i></div>\
                                                            <div class="col-10"><a href="{{ url("download-attachment") }}/' + value.message_id + '">' + value.attachment.substring(11) + '</td></a></div>\
                                                        </div>\
                                                    </div>\
                                                </div>';
                                }
                                
                            } else {
                                attachment = '';
                            }

                            if(value.attachment != 0) {
                                body = attachment;
                            } else {
                                body = value.body;   
                            }

                            var is_admin = '<div></div>';

                            if (value.user_id == {{ auth()->user()->id }}) {
                                // pesan =
                                //     '<div class="d-flex flex-column mb-5 align-items-end"><div class="d-flex align-items-center"><div><span class="text-muted font-size-sm">' +
                                //     value.created_at +
                                //     '</span> <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Anda</a> </div> <div class="symbol symbol-circle symbol-40 ml-3"><img alt="Pic" src="{{ asset('storage') }}' +
                                //     '/' + value.user_image + '" /></div> </div>' + attachment +
                                //     '<div class="mt-2 rounded px-3 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' +
                                //     value.body + ' ' + is_read + '</div></div>';

                                if({{ auth()->user()->role }} == 1){
                                    is_admin = '<div style="width: 100%;" class="bg-light-primary rounded px-2 py-0">\
                                                    <small style="font-size: 8pt">' + value.name + '</small> \
                                                </div>';
                                }
                                
                                pesan = '<div class="mb-2 d-flex flex-column align-items-end">\
                                            <i class="fas fa-caret-right mt-2 text-light text-right" style="position: absolute;font-size: 18pt"></i>\
                                            <div class="m-0 mr-2 rounded bg-light text-dark-50 font-weight-bold text-right max-w-400px">\
                                                ' + is_admin + '\
                                                <div class="p-2 px-4 m-0"> ' + body + ' </div>\
                                                <div style="width: 100%;" class="bg-light-primary rounded px-2 py-0">\
                                                    <small style="font-size: 7pt">' + value.created_at + '</small> \
                                                    ' + is_read + '\
                                                </div>\
                                            </div>\
                                        </div>';
                            } else {

                                    is_admin = '<div style="width: 100%;" class="bg-light-primary rounded px-2 py-0">\
                                                    <small style="font-size: 8pt">' + value.name + '</small> \
                                                </div>';
                                

                                pesan = '<div class="mb-2 d-flex flex-column align-items-start">\
                                            <i class="fas fa-caret-left mt-2 text-light-success text-left" style="position: absolute;font-size: 18pt"></i>\
                                            <div class="m-0 ml-2 rounded bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">\
                                                ' + is_admin + '\
                                                <div class="p-2 px-4 m-0">' + body + '</div>\
                                                <div style="width: 100%;" class="bg-light rounded px-2 py-0">\
                                                    ' + is_read + '\
                                                    <small style="font-size: 8pt">' + value.created_at +'</small> \
                                                </div>\
                                            </div>\
                                        </div>';
                                            
                                // pesan =
                                //     '<div class="d-flex flex-column mb-5 align-items-start"> <div class="d-flex align-items-center">  <div class="symbol symbol-circle symbol-40 mr-3"> <img alt="Pic" src="{{ asset('storage') }}' +
                                //     '/' + value.user_image +
                                //     '" /> </div><div><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">' +
                                //     value.name + '</a> ' + value.created_at + '</span></div></div> ' +
                                //     attachment +
                                //     ' <div class="mt-2 rounded px-3 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">' +
                                //     is_read + ' ' + value.body + '</div> </div>';
                            }

                            $('.body-chat').append(pesan);
                        });
                    }

                    if (response.tiket_status == 2) {
                        $('#isi-pesan').attr('disabled', 'disabled');
                        $('#tombol-send').attr('disabled', 'disabled');
                        $('.body-chat').append(
                            '<div class="row"><div class="col-12 text-center pt-5"><p class="badge bg-primary text-white p-4">Sesi anda telah berakhir...</p></div></div>'
                        );
                    } else {
                        $('#isi-pesan').removeAttr("disabled");
                        $('#tombol-send').removeAttr("disabled");
                    }
                }
            });

            // var ajg = $('.scroll-pull').height();
            // console.log(ajg);

            $("#scroll-messages").animate({
                scrollTop: $(document).height() + 10000
            }, 1000);
        }

        $(function() {

            $("#ajaxFormSend").on('submit', function(e) {
                e.preventDefault();
                var id = $('#id').val();

                var ajaxForm = $(this);
                $.ajax({
                    url: "{{ url('send_message') }}",
                    type: 'post',
                    data: ajaxForm.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $('#isi-pesan').val("");
                        fetch_chat(id);
                    }
                });
            });
        });
    </script>
@endsection
