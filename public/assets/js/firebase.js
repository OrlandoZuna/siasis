// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyCsZktyDNsimHKeCtWimLAFazkQB3Ydqug",
    authDomain: "uatfperiodico.firebaseapp.com",
    projectId: "uatfperiodico",
    storageBucket: "uatfperiodico.appspot.com",
    messagingSenderId: "307703723783",
    appId: "1:307703723783:web:63980a2fb59d15a3f8b7a2",
    measurementId: "G-YSNF0497C9"
};

//------------------------------------

firebase.initializeApp(firebaseConfig)

const messaging = firebase.messaging()

messaging
 .requestPermission()
 .then(function () {
     console.log("Notification permission granted")
     return messaging.getToken()
 }).then(function(token){
    //  $('#device_token').val(token)
     console.log(token)
 }).catch(function(err){
     console.log("Unable to get permission to notify.", err)
 })

//-------------------------------------

messaging.onMessage((payload) => {
     console.log(payload)
}) 
