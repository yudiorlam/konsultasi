@extends('user.layout.app')

@section('sidebar')
    @foreach ($conversations as $conversation)
        <div class="d-flex align-items-center justify-content-between mb-5">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-50 mr-3">
                    <img alt="Pic" src="{{ asset('storage/users/' . $conversation->user_image) }}" />
                </div>

                @if (auth()->user()->role == 3)
                    <div class="d-flex flex-column">
                        <a href="javaScript:void(0);"
                            onclick="showChat('{{ $conversation->conv_id }}','{{ $conversation->name }}');"
                            class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{ $conversation->name }}</a>
                        <span class="text-muted font-weight-bold font-size-sm">{{ $conversation->topic_name }}</span>
                    </div>
                @else
                    <div class="d-flex flex-column">
                        <a href="javaScript:void(0);"
                            onclick="showChat('{{ $conversation->conv_id }}','{{ $conversation->name }}');"
                            class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{ $conversation->name }}</a>
                        <span class="text-muted font-weight-bold font-size-sm">{{ $conversation->nip }}</span>
                    </div>
                @endif

            </div>
            <div class="d-flex flex-column align-items-end">
                <span class="text-muted font-weight-bold font-size-sm">7 hrs</span>
                <span class="label label-sm label-success">4</span>
            </div>
        </div>
    @endforeach
@endsection


@section('content')
    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
        <div class="card card-custom">
            <div class="card-header align-items-center px-4 py-3">
                <div class="text-left flex-grow-1">
                    {{-- <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
							<span class="svg-icon svg-icon-lg">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3" />
										<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
									</g>
								</svg>
							</span>
						</button>
						
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="ki ki-bold-more-hor icon-md"></i>
							</button>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-left dropdown-menu-md">
								<ul class="navi navi-hover py-5">
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="flaticon2-drop"></i>
											</span>
											<span class="navi-text">New Group</span>
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
						</div> --}}
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark-75 font-weight-bold font-size-h5" id="receiver_name"></div>
                    <div>
                        {{-- <span class="label label-sm label-dot label-success"></span>
							<span class="font-weight-bold text-muted font-size-sm">Active</span> --}}
                    </div>
                </div>

                <div class="text-right flex-grow-1">
                    <div class="dropdown dropdown-inline" id="action">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="scroll scroll-pull" data-mobile-height="350">
                    <div class="messages">

                        <div class="body-chat">
                            <div class="text-center">
                                <img src="{{ asset('img/phone-animasi.png') }}" alt="#" width="50%" draggable="false">
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card-footer align-items-center">
                <div class="kirim-pesan">
                    <form id="ajaxFormSend">
                        @csrf
                        {{-- <input type="hidden" name="tiket" id="tiket"> --}}
                        <input type="hidden" name="conv_id" id="id">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message" name="body" id="isi-pesan"></textarea>

                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                <a href="#" data-toggle="modal" data-target="#uploadImageModal"
                                    class="btn btn-clean btn-icon btn-md mr-1">
                                    <i class="flaticon2-photograph icon-lg"></i>
                                </a>
                                <a href="#" class="btn btn-clean btn-icon btn-md">
                                    <i class="flaticon2-photo-camera icon-lg"></i>
                                </a>
                            </div>
                            <div>
                                <button type="submit"
                                    class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6"
                                    id="tombol-send">Send</button>
                            </div>
                        </div>
                    </form>
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
                    <h5 class="modal-title" id="uploadImageModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="attachmentForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="upload" onchange="readURL(this);"
                                            name="attachment">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
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
                success: function(response) {
                    alert(response);
                }
            });

            return false;

        });
    </script>

    <script>
        $('#btn-edit-status-tiket').hide();
        //mulai konsultasi
        function mulai_konsultasi() {
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
            }, 100000);
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
                            if (response) {
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
                        if (response.tiket_status == 1) {
                            $('#action').append(
                                '<button type="button" onclick="editStatusTiket()" class="btn btn-clean btn-sm btn-icon btn-icon-md" id="btn-edit-status-tiket" title="Akhiri sesi"><i class="icon-2x text-danger flaticon-chat"><i style="margin-left:-15px;margin-top:10px" class="fas fa-window-close text-dark fs-1"></i></i></button>'
                            );
                        }

                        $.each(response.chats, function(index, value) {
                            if (value.is_read == 1) {
                                is_read = '<i class="icon-xl la la-check-double"></i>';
                            } else {
                                is_read = '<i class="icon-xl la la-check-double text-primary"></i>';
                            }

                            if (value.user_id == {{ auth()->user()->id }}) {
                                pesan =
                                    '<div class="d-flex flex-column mb-5 align-items-end">\
                        <div class="d-flex align-items-center">\
                        <div>\
                        <span class="text-muted font-size-sm">' + value.created_at +
                                    '</span>\
                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">' +
                                    value
                                    .name +
                                    '</a>\
                        </div>\
                        <div class="symbol symbol-circle symbol-40 ml-3">\
                        <img alt="Pic" src="{{ asset('storage/users') }}' + '/' + value
                                    .user_image +
                                    '" />\
                        </div>\
                        </div>\
                        <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">' +
                                    value.body + ' ' + is_read +
                                    ' </div>\
                        </div>';
                            } else {
                                pesan =
                                    '<div class="d-flex flex-column mb-5 align-items-start">\
                        <div class="d-flex align-items-center">\
                        <div class="symbol symbol-circle symbol-40 mr-3">\
                        <img alt="Pic" src="{{ asset('storage/users') }}' + '/' + value
                                    .user_image +
                                    '" />\
                        </div>\
                        <div>\
                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">' +
                                    value
                                    .name +
                                    '</a>\
                        ' +
                                    value
                                    .created_at +
                                    '</span>\
                        </div>\
                        </div>\
                        <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">' +
                                    is_read + ' ' + value.body +
                                    '</div>\
                                                                                </div>';
                            }

                            $('.body-chat').append(pesan);
                        });
                        // last_chat_id = response.last_chat_id;

                    }

                    if (response.tiket_status == 2) {
                        $('#isi-pesan').attr('disabled', 'disabled');
                        $('#tombol-send').attr('disabled', 'disabled');
                        $('.body-chat').append(
                            '<div class="row">\
                                                                                <div class="col-12 text-center pt-5">\
                                                                                <p class="badge bg-primary text-white p-4">Sesi anda telah berakhir...</p>\
                                                                                </div>\
                                                                                </div>'
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

    {{-- <script src="{{ asset('js/echo_custom.js') }}"></script>
    <script src="{{ asset('js/pusher.js') }}"></script>
    <!--<script src="https://js.pusher.com/4.1/pusher.min.js"></script>-->
         
        <script>
          Pusher.logToConsole = true;
         
          window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '046f5ba87d9dae1abbb0',
            cluster: 'ap1',
            encrypted: true,
            logToConsole: true
          });
		
        // var channel = window.Echo.subscribe('user.{{ $user_id }}');
        // channel.bind('pesan', function(data) {
        //     app.messages.push(JSON.stringify(data));

        //     alert(JSON.stringify(data));
        // });

         
          Echo.private('user.{{ $user_id }}')
          .listen('NewMessageNotification', (e) => {
              alert(e.message.message);
          });
		  
        </script>
		<script>
			function adaPesan(x) {
				alert(x);
			} --}}

    {{-- </script> --}}
    <!-- receive notifications -->
    <!-- firebase integration started -->



    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBxbjnfox7YDbeeff0SY-TaqBkqPZWPY3s",
            authDomain: "konsul-online-6db72.firebaseapp.com",
            projectId: "konsul-online-6db72",
            storageBucket: "konsul-online-6db72.appspot.com",
            messagingSenderId: "334320002286",
            appId: "1:334320002286:web:7bbd6a365d7b6c54af3fff",
            measurementId: "G-3YBM7N2HR7"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        //firebase.analytics();
        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function() {
                //MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                // print the token on the HTML page     
                console.log(token);



            })
            .catch(function(err) {
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log(payload);
            var notify;
            notify = new Notification(payload.notification.title, {
                body: payload.notification.body,
                icon: payload.notification.icon,
                tag: "Dummy"
            });
            console.log(payload.notification);
        });

        //firebase.initializeApp(config);
        var database = firebase.database().ref().child("/users/");

        database.on('value', function(snapshot) {
            renderUI(snapshot.val());
        });

        // On child added to db
        database.on('child_added', function(data) {
            console.log("Comming");
            if (Notification.permission !== 'default') {
                var notify;
                notify = new Notification('CodeWife - ' + data.val().username, {
                    'body': data.val().message,
                    'icon': 'bell.png',
                    'tag': data.getKey()
                });
                notify.onclick = function() {
                    alert(this.tag);
                }
            } else {
                alert('Please allow the notification first');
            }
        });

        self.addEventListener('notificationclick', function(event) {
            event.notification.close();
        });
    </script>
@endsection
