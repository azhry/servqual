importScripts( 'https://www.gstatic.com/firebasejs/4.10.1/firebase.js' );

var config = {
    apiKey: "AIzaSyB_szfFS-7LOSIwGbsfB5coawQ-xhjuVZk",
    authDomain: "e-commerce-4c1c1.firebaseapp.com",
    databaseURL: "https://e-commerce-4c1c1.firebaseio.com",
    storageBucket: "e-commerce-4c1c1.appspot.com",
    messagingSenderId: "627066720624"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
