<!DOCTYPE html>
<html>
<head>
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
  label{
    font-family: 'Open Sans', sans-serif;
    margin-left: 30%;
    width: 20%;
  }
  input{
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
  p{
  padding:20px;
  width: 100%;
  }
  .buttons{
  padding-left:300px;
}
  </style>
</head>
<body>
<?php include('../firebase.js') ?>
<div class = "container">
  <div id="error-display">
  </div>
  <form id ="project-form" href="MapPage.php?id=" method="post">

  <h1>Edit Profile Information</h1>
	<div class = "inputs">
	<label>Edit Name:</label>
		<input type="text"  value="" id="name" onblur="checkField('name')" required>
	<br>
<br>
	<label>Edit Phone-number:</label>
		<input type="text" value="" id="phone" onblur="checkField('phone')" required>
	<br>
<br>
	<label>Edit Email:</label>
	  <input type="text"  value="" id="email" onblur="checkField('email')" required>
    <br><br>


<div class="buttons">
		<a href="MapPage.php?id="><button type="button" class="btn btn-info">Cancel</button></a>
		<a href="ProfilePage.php?id="><button type="button" id="submitbtn" class="btn btn-info">Save</button></a>
</div>

</form>
</div>


<script>
  document.getElementById("submitbtn").setAttribute("disabled",true);
  var username = "<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'];}?>";
  const users = firebase.database().ref().child('users');
  var missing = [];
  var clicked = [];
  var errcount = 0;

  var teststr1 = "ProfilePage.php?id=" + username;
  $('a[href="ProfilePage.php?id="]').prop('href',teststr1);

  var teststr2 = "MapPage.php?id=" + username;
  $('a[href="MapPage.php?id="]').prop('href',teststr2);

  // Populates with user data
  users.orderByChild('username').equalTo(username).once('value', function(snap){
    snap.forEach(function (objSnapshot) {
      objSnapshot.forEach(function (snapshot) {
        var val = snapshot
        if(document.getElementById(val.key) != null){
          document.getElementById(val.key).setAttribute("value",val.val());
        }
      });
    });
       return
    });
    function checkField(value){
      var userflag = false;
      var emailflag = false;
      var email = document.getElementById('email').value;
      var phone = document.getElementById('phone').value;
      var name = document.getElementById('name').value;
        // Checks if email has been taken
        users.orderByChild('username').equalTo(username).once('value', function(snap){
            snap.forEach(function(snapshot) {
              snapshot.forEach(function (user) {
                  if(user.key == "username"){
                    if(user.val() == "<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'];}?>"){
                      userflag =true;
                    }
                  }
                  else if (user.key == "email") {
                    if(user.val() == email){
                      emailflag =true;
                    }
                  }
                  });
              });
              if(userflag == false || emailflag == false){
                users.orderByChild('email').startAt(email).endAt(email).once('value', function(snap){
                  if(snap.exists()){
                    if(!document.getElementById('taken-email')){
                      errcount++;
                      var innerdiv = document.createElement('div');
          				        innerdiv.setAttribute("id", 'taken-email');
              		          innerdiv.innerHTML = "<p>ERROR: The email provided is associated with another account.</p>";
                            (document.getElementById("error-display")).appendChild(innerdiv);
                          }
                          return
                        }
                        else {
                          if(document.getElementById('taken-email')){
          				              errcount--;
          				                  var innerdiv = document.getElementById('taken-email');
          				                      innerdiv.parentNode.removeChild(innerdiv);
          			          }
                        }
                  });
              }
              return
          });
          validEmailError(email);
  		checkSubmission(name,phone,email);
    }
  	function validEmailError(email){
  		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
  			var innerdiv = document.getElementById("invalid-email-error");
  			if(innerdiv){
          errcount--;
  				innerdiv.parentNode.removeChild(innerdiv);
  			}
      	return;
    	}
  		else{
  			errcount++;
  			document.getElementById("submitbtn").setAttribute("disabled",true);
  			var innerdiv = document.createElement('div');
  			innerdiv.setAttribute("id", "invalid-email-error");
  			innerdiv.innerHTML = "<p>ERROR: Invalid email address provided.</p>";
  			document.getElementById("error-display").appendChild(innerdiv);
  		}
  	}

  	function checkSubmission(name,phone,email){
  		if((name == "") || (phone == "") || (email == "") || errcount!=0){
        alert("Test2");
  			document.getElementById("submitbtn").setAttribute("disabled",true);
  		}
  		else{
  			document.getElementById("submitbtn").removeAttribute("disabled");
  			document.getElementById("submitbtn").onclick = function () {
          alert("TEST");
          users.orderByChild('name').equalTo(name).once('value', function(snap){
            snap.forEach(function (objSnapshot) {
              objSnapshot.forEach(function (snapshot) {
                var val = snapshot
                alert(val.key);
                var value = document.getElementById(val.key).value;
                var keyy = val.key;
                if(document.getElementById(keyy).value != null){
                  user.ref.update({[keyy] : [value]});
                }
              });
            });
               return
            });
  			 location.href = ("ProfilePage.php?id="+username);
  	 		};
  		}
  	}
  </script>
</body>
</html>
