<html>
<head>
  <?php include('../firebase.js') ?>
  <title>Road Trippin'</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Quicksand:300,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      body {
      	background: url("../images/blue.jpg");
          font-family: 'Open Sans', sans-serif;
          padding-top: 100px;
          background-size:     cover;
      	background-repeat:   no-repeat;
      }

      .container {
      	border:1px solid #5FEAE1;
      	width: 800px;
      	margin: 0 auto;
      	background: #fff;
      	padding: 0px 25px 25px 0px;
          box-shadow:
              0px 0px 0px 5px rgba( 255,255,255,0.4 ),
              0px 4px 20px rgba( 0,0,0,0.33 );
      }

      h1 {
        color: #000000;
        font-family: 'Open Sans', sans-serif;
        text-align: center;
        font-size: 28px;
        font-weight: 100;
      }

      label {
        font-family: 'Open Sans', sans-serif;
        margin-left: 30%;
        width: 20%;
      }

      input {
      	margin-left: 50px;
      }


      #project-form .inputs {
          margin-top: 25px;
        color: #8f8f8f;
          font-size: 12px;
          font-weight: 300;
          letter-spacing: 1px;
          margin-bottom: 7px;
          display: block;
      }


      p {
      padding:20px;
      width: 100%;
      }

      .buttons{
      padding-left:300px;

    }
    </style>
  </head>
  <body>

  <div class = "container">
    <form id ="project-form" href="MapPage.php?id=" method="post">

    <h1>Your Interests</h1>
  	<div class = "inputs">
      <label>Indoors:</label>
  	   <input type="checkbox" id="Eating" onBlur="checkStatus('Eating')">Eating</input><br>
      <label></label>
       <input type="checkbox" id="Shopping" onBlur="checkStatus('Shopping')">Shopping</input><br>
      <label></label>
       <input type="checkbox" id="Museums" onBlur="checkStatus('Museums')">Museums</input><br>
      <label></label>
       <input type="checkbox" id="Movies" onBlur="checkStatus('Movies')">Movies</input><br>
       <label></label>
        <input type="checkbox" id="Hotels" onBlur="checkStatus('Hotels')">Hotels</input><br>

     <br>
     <br>
  	  <label>Outdoors:</label>
  		  <input type="checkbox" id="Camping" onBlur="checkStatus('Camping')">Camping</input><br>
      <label></label>
        <input type="checkbox" id="Hiking" onBlur="checkStatus('Hiking')">Hiking</input><br>
      <label></label>
        <input type="checkbox" id="Surfing" onBlur="checkStatus('Surfing')">Surfing</input><br>
      <label></label>
        <input type="checkbox" id="Cycling" onBlur="checkStatus('Cycling')">Cycling</input><br>
      <label></label>
        <input type="checkbox" id="Sports" onBlur="checkStatus('Sports')">Sports</input>
  	</div>

    <div class="buttons">
    		<a href="MapPage.php?id="><button type="button" id="submitbtn" class="btn btn-info">Save</button></a>
    </div>

    </form>
  </div>
  <script>

     var username = "<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'];}?>";
     const users = firebase.database().ref().child('users');

     var teststr = "MapPage.php?id=" + username;
     $('a[href="MapPage.php?id="]').prop('href',teststr);
       // Checks if username is taken
       users.orderByChild('username').equalTo(username).once('value', function(snap){
           snap.forEach(function(user) {
               user.ref.child("Interests").child("None").set("None");
             });
            return
         });

         // Populates with user data
         users.orderByChild('username').equalTo(username).once('value', function(snap){
             snap.forEach(function(user) {
               user.ref.child("Interests").once("value", snap=> {
                 snap.forEach(i=>{
                   if(i.val() != "None"){
                     document.getElementById(i.val()).checked = true;
                   }
                   else if (i.val() == "None") {
                     i.ref.remove();
                   }
                 });
               });
               });
              return
           });


      function checkStatus(value){
        //var txtval = document.getElementById(value).value
        if(document.getElementById(value).checked == true){
          users.orderByChild('username').equalTo(username).once('value', function(snap){
              snap.forEach(function(user) {
                  user.ref.child("Interests").child(value).set(value);
                });
               return
          });
        }
        else {
          users.orderByChild('username').equalTo(username).once('value', function(snap){
              snap.forEach(function(user) {
                  user.ref.child("Interests").child(value).remove();
                });
               return
          });
        }
      }
  </script>
  </body>
</html>
