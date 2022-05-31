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
                                            @if (auth()->user()->role == 3)
                                                {{ auth()->user()->nip }}
                                            @else
                                                {{ auth()->user()->email }}
                                            @endif
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
                                    <input type="text" class="form-control py-4 h-auto" placeholder="Nama Pegawai" />
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
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Chat4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L5,18 C3.34314575,18 2,16.6568542 2,15 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z M6.16794971,10.5547002 C7.67758127,12.8191475 9.64566871,14 12,14 C14.3543313,14 16.3224187,12.8191475 17.8320503,10.5547002 C18.1384028,10.0951715 18.0142289,9.47430216 17.5547002,9.16794971 C17.0951715,8.86159725 16.4743022,8.98577112 16.1679497,9.4452998 C15.0109146,11.1808525 13.6456687,12 12,12 C10.3543313,12 8.9890854,11.1808525 7.83205029,9.4452998 C7.52569784,8.98577112 6.90482849,8.86159725 6.4452998,9.16794971 C5.98577112,9.47430216 5.86159725,10.0951715 6.16794971,10.5547002 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </button>
                                </div>
                                <div class="text-center flex-grow-1">
                                    <div class="text-dark-75 font-weight-bold font-size-h5" id="receiver_name"></div>
                                    <div>
                                        {{-- <span class="label label-sm label-dot label-success"></span>
                                <span class="font-weight-bold text-muted font-size-sm">Active</span> --}}
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
                                <div class="scroll scroll-pull" data-mobile-height="350">
                                    <div class="messages">

                                        <div class="body-chat">
                                            <div class="text-center">
                                                <img src="{{ asset('img/phone-animasi.png') }}" alt="#" width="50%"
                                                    draggable="false">
                                            </div>
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
                                                <a href="#" onclick="uploadAttachment('image')" class="btn btn-clean btn-icon btn-md mr-1">
                                                    <i class="flaticon2-photograph icon-lg"></i>
                                                </a>
                                                <a href="#" onclick="uploadAttachment('pdf')" class="btn btn-clean btn-icon btn-md">
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
                    $('#uploadImageModal').modal('hide');
                    $('#attachmentForm')[0].reset();
                    $('#imageResult').attr('src', '');

                    $.LoadingOverlay("hide");
                    Swal.fire(
                        'Sukses',
                        'Gambar berhasil terkirim.',
                        'success'
                    );

                    fetch_chat(id);
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
                                    <a href="javascript:void(0)" onclick="showChat('+ value.conv_id + ')" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">'+ value.name + " (" + value.topic_name + ")" +'</a>\
                                    <span class="text-muted font-weight-bold font-size-sm" id="last_chat">'+ last_chat +'</span>\
                                    '+ tiket_status +'\
                                </div>\
                            </div>\
                            <div class="d-flex flex-column align-items-end">\
                                <span class="text-muted font-weight-bold font-size-sm" style="font-size:7pt">'+ value.last_chat_time +'</span>\
                                <span class="label label-sm label-success">5</span>\
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
            $('#btn-edit-status-tiket').show();
            $('#receiver_name').html(name);
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
                                is_read = '<i class="icon-xl la la-check-double"></i>';
                            } else {
                                is_read = '<i class="icon-xl la la-check-double text-primary"></i>';
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
                                    attachment = '<iframe class="mt-3" src="{{ asset("storage") }}' + '/' + value.attachment + '" frameBorder="0" scrolling="auto" height="500px" width="70%"></iframe>';
                                }


                                

                                
                            } else {
                                attachment = '';
                            }

                            if (value.user_id == {{ auth()->user()->id }}) {
                                pesan =
                                    '<div class="d-flex flex-column mb-5 align-items-end"><div class="d-flex align-items-center"><div><span class="text-muted font-size-sm">' +
                                    value.created_at +
                                    '</span> <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Anda</a> </div> <div class="symbol symbol-circle symbol-40 ml-3"><img alt="Pic" src="{{ asset('storage') }}' +
                                    '/' + value.user_image + '" /></div> </div>' + attachment +
                                    '<div class="mt-2 rounded px-3 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' +
                                    value.body + ' ' + is_read + '</div></div>';
                            } else {
                                pesan =
                                    '<div class="d-flex flex-column mb-5 align-items-start"> <div class="d-flex align-items-center">  <div class="symbol symbol-circle symbol-40 mr-3"> <img alt="Pic" src="{{ asset('storage') }}' +
                                    '/' + value.user_image +
                                    '" /> </div><div><a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">' +
                                    value.name + '</a> ' + value.created_at + '</span></div></div> ' +
                                    attachment +
                                    ' <div class="mt-2 rounded px-3 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">' +
                                    is_read + ' ' + value.body + '</div> </div>';
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
            $(".scroll-pull").animate({
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
