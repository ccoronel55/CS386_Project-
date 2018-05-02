<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBpggPSmSnfrAR9CQ2AZdNwhQAZhka_Rps",
    authDomain: "roadtrippincs386.firebaseapp.com",
    databaseURL: "https://roadtrippincs386.firebaseio.com",
    projectId: "roadtrippincs386",
    storageBucket: "roadtrippincs386.appspot.com",
    messagingSenderId: "524285944173"
  };
  firebase.initializeApp(config);

    // Gets elements
  const preObject = document.getElementById('explore');
    // Creates References
  const dbRefObject = firebase.database().ref().child('explore');

    // Sync object changes
  dbRefObject.on('value', snap => console.log(snap.val()));
</script>
