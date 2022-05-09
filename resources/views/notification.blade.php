<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel 8 Firebase Web Push Notification Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container" style="margin-top:50px;">

        <div style="text-align: center;">

            <h4>Laravel 8 Firebase Web Push Notification Tutorial</h4>

            <form action="{{ url('/save-token') }}" method="post">
                @csrf
                <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
                <button type="submit" id="btn-nft-enable"
                class="btn btn-danger btn-xs btn-flat">Click here - Allow Notification</button>
            </form>
        </div>

        <form id="ajg">
            @csrf
            <h1>{{ csrf_token() . ' ' . auth()->user()->id }}</h1>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Notification Title" name="title">
            </div>
            <div class="form-group">
                <label for="body">body:</label>
                <input type="text" class="form-control" id="body" placeholder="Notification Body" name="body">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js"></script>
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

        firebase.initializeApp(firebaseConfig);
        const messaging=firebase.messaging();

        messaging.onMessage(function (payload) {
            console.log(payload);
            const notificationOption={
                body:payload.notification.body,
                icon:payload.notification.icon
            };

            if(Notification.permission==="granted"){
                var notification=new Notification(payload.notification.title,notificationOption);

                notification.onclick=function (ev) {
                    ev.preventDefault();
                    window.open(payload.notification.click_action,'_blank');
                    notification.close();
                }
            }

        });

        $(function() {
            $("#ajg").on('submit', function(e) {
                e.preventDefault();

                var ajaxForm = $(this);
                $.ajax({
                    url: "{{ route('send.notification') }}",
                    type: 'post',
                    data: ajaxForm.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        alert(response);
					}
				});
			});
        });
    </script>
</body>

</html>