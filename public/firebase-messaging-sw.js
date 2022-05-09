importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

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

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});