<!DOCTYPE html>
<html>
<head>
<!--
This file is part of Foobar.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Foobar is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
-->
  <title>Road Trippin'</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Quicksand:300,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>
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
  	padding: 0px 25px 0px 25px;
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
      margin-top: 15px;
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
div#error-display{
  padding: 2%;
  height: auto;
  width: 80%;
  margin-left: 10%;
}
div#error-display div{
  background-color: #ffcdcd;
  height:auto;
  border: 2px solid #ff2d2d;
  border-radius: 5px;
  margin-bottom: 1%;
  color: #d00000;
}
div#error-display div p{
  padding: 2.5%;
  text-align: center;
}
button{
  outline: none;
  font-size: 100%;
  padding: 1.5%;
  background-color: #fcb3a8;
  font-family: 'Monument Valley';
  border-radius: 2px;
  border: none;
}
button:hover{
  background-color: #fd8282;
}
button:onclick{
  background-color: #fcb3a8;
}
button:disabled{
  background-color: #d3d3d3;
}
  </style>
</head>
<body>
<?php include '../firebase.js';?>
<div class = "container">
  <div id="error-display">
  </div>
  <form id ="project-form" href="../pages/MapPage.php" method="post">
    <h1>Sign up!</h1>
    <br />Username:<br />
    <input type="text" onblur="checkField('username')" id="username"><br />
    Name:<br />
    <input type="text" onblur="checkField('name')" id="name"><br />
    Phone Number:<br />
    <input type="text" onblur="checkField('phone-number')" id="phone-number"><br />
    Email:<br />
    <input type="email" onblur="checkField('email')"id="email"><br />
    Password:<br />
    <input type="password" onblur="checkField('password')" id="password"><br />
    Confirm Password:<br />
    <input type="password" onblur="checkField('password-confirmation')" id="password-confirmation"><br />
  </form>

	  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>


<div class="buttons">
		<a href="../pages/MapPage.php"><button type="button" class="btn btn-info">Login</button></a>
		<a href="../pages/Interests.php?id="><button type="button" id="submitbtn" disabled="true"class="btn btn-info">Sign Up</button></a>
</div>

</form>
</div>


<script>


  	var form = document.getElementById('project-form');
    const users = firebase.database().ref().child('users');
  	var missing = [];
  	var clicked = [];
  	var errcount = 0;

  	function checkField(value){

      var teststr = "../pages/Interests.php?id=" + document.getElementById('username').value;
      $('a[href="../pages/Interests.php?id="]').prop('href',teststr);
  		var txtval = document.getElementById(value).value
  		// No value
  		if(txtval == ""){
  			var flag = 0;
  			//checks if in array
  			for(i=0;i<missing.length;i++){
  				if(missing[i] == value){
  					flag = 1
  					break;
  				}
  			}
  			//if not in array
  			if(flag == 0){
  				missing[missing.length] = value;
  			}
  			// If there is an Error box, UPDATE <p>
  			if(document.getElementById('required-field-error')){
  				document.getElementById("submitbtn").setAttribute("disabled",true);
  				var str = arrToString(missing);
  				var para = document.getElementById('reqfielderror');
  				para.textContent = str;
  			}
  			// If there isn't an error box
  			else{
  				//Create div
  				errcount++;
  				document.getElementById("submitbtn").setAttribute("disabled",true);
  				var innerdiv = document.createElement('div');
  				innerdiv.setAttribute("id", "required-field-error");
  				var str = arrToString(missing);
      		innerdiv.innerHTML = "<p id=reqfielderror>" + str + "</p>";
       		(document.getElementById("error-display")).appendChild(innerdiv);
  			}
  		}
  		// If there is a entered value, remove the value or box
  		else{
  			var count = 0;
  			for(i = 0; i < missing.length; i++) {
  				if(missing[i] != null){
  					count++;
  				}
  			}
  			if((count-1)==0){
  				for (var i = 0; i < missing.length; i++){
  					if(missing[i] == value){
  					missing[i] = null;
  					}
  				}
  				errcount--;
  				var innerdiv = document.getElementById('required-field-error');
  				if(innerdiv){
  					innerdiv.parentNode.removeChild(innerdiv);
  				}
  			}
  			//
  			else{
  				if(count!=0){
  					for (var i = 0; i < missing.length; i++) {
  						if(missing[i] == value){
  							missing[i] = null;
  						}
  					}
  					var str = arrToString(missing);
  					var para = document.getElementById('reqfielderror');
  					para.textContent = str;
  				}
  			}
  		}
  		var user = document.getElementById('username').value;
  		var name = document.getElementById('name').value;
  		var pwrd1 = document.getElementById('password').value;
  		var phone = document.getElementById('phone-number').value
  		var pwrd2 = document.getElementById('password-confirmation').value;
  		var email = document.getElementById('email').value;

      // Checks if username is taken
      users.orderByChild('username').startAt(user).endAt(user).once('value', function(snap){
        if(snap.exists()){
          errcount++;
          var innerdiv = document.createElement('div');
  				innerdiv.setAttribute("id", 'taken-username');
      		innerdiv.innerHTML = "<p>ERROR: The username has been taken already.</p>";
          (document.getElementById("error-display")).appendChild(innerdiv);
          username = user;
          return
        }
        else {
          if(document.getElementById('taken-username')){
    				errcount--;
    				var innerdiv = document.getElementById('taken-username');
    				innerdiv.parentNode.removeChild(innerdiv);
    			}
        }

        })
        // Checks if email has been taken
        users.orderByChild('email').startAt(email).endAt(email).once('value', function(snap){
          if(snap.exists()){
            errcount++;
            var innerdiv = document.createElement('div');
    				innerdiv.setAttribute("id", 'taken-email');
        		innerdiv.innerHTML = "<p>ERROR: The email provided is associated with another account.</p>";
            (document.getElementById("error-display")).appendChild(innerdiv);
            return
          }
          else {
            if(document.getElementById('taken-email')){
      				errcount--;
      				var innerdiv = document.getElementById('taken-email');
      				innerdiv.parentNode.removeChild(innerdiv);
      			}
          }

          })

  		if(value == 'password' || value == 'password-confirmation'){
  			passwordMismatchError(pwrd1,pwrd2);
  		}
  		if(value == 'email'){
  			var email = document.getElementById('email').value;
  			validEmailError(email);
  		}
  		console.log(user+name+phone+email+pwrd1+pwrd2);
  		checkSubmission(user,name,phone,email,pwrd1,pwrd2);
  	}

  	function passwordMismatchError(){
  		var pwrd1 = document.getElementById('password').value;
  		var pwrd2 = document.getElementById('password-confirmation').value;
  		if(pwrd1 != pwrd2){
  			if(document.getElementById('password-mismatch-error')){
  				conformancePasswordError();
  				return;
  			}
  			// If there isn't an error box
  			else{
  				errcount++;
  				document.getElementById("submitbtn").setAttribute("disabled",true);
  				var innerdiv = document.createElement('div');
  				innerdiv.setAttribute("id", 'password-mismatch-error');
      		innerdiv.innerHTML = "<p>ERROR: Passwords don't match.</p>";
       		(document.getElementById("error-display")).appendChild(innerdiv);
  			}
  		}
  		else{
  			if(document.getElementById('password-mismatch-error')){
  				errcount--;
  				var innerdiv = document.getElementById('password-mismatch-error');
  				innerdiv.parentNode.removeChild(innerdiv);
  			}
  			conformancePasswordError();
  			return;
  		}
  	}

  	function conformancePasswordError(){
  		var pwrd1 = document.getElementById('password').value;
  		var conformity = 0;
  		var caps = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  		var nums = "1234567890";
  		var charcount = pwrd1.length;
  		var capsct = 1;
  		var numct = 1;
  		for (i = 0; i < pwrd1.length; i++) {
  			if(caps.search(pwrd1.charAt(i)) != -1){
  				capsct = 0
  			}
  			if(nums.search(pwrd1.charAt(i)) != -1){
  				numct = 0;
  			}
  		}
  		if(capsct == 1 || numct == 1 || charcount<8){
  			conformity=1;
  		}
  		if(conformity == 1){
  			if(document.getElementById('unmet-password-constraints-error')){
  				document.getElementById("submitbtn").setAttribute("disabled",true);
  				return;
  			}
  			errcount++;
  			document.getElementById("submitbtn").setAttribute("disabled",true);
  			var innerdiv = document.createElement('div');
  			innerdiv.setAttribute("id", 'unmet-password-constraints-error');
  			innerdiv.innerHTML = "<p>ERROR: Password should contain at least 8 characters, one capital letter, and one number.</p>";
  			document.getElementById("error-display").appendChild(innerdiv);
  		}
  		else{
  			errcount--;
  			var innerdiv = document.getElementById('unmet-password-constraints-error');
  			if(innerdiv){
  				innerdiv.parentNode.removeChild(innerdiv);
  			}
  		}
  	}

  	function validEmailError(email){
  		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
  			errcount--;
  			var innerdiv = document.getElementById("invalid-email-error");
  			if(innerdiv){
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

  	function checkSubmission(user,name,phone,email,pwrd1,pwrd2){
  		if((user == "") || (name == "") || (phone == "") || (email == "") || (pwrd1 == "") || (pwrd2 == "")){
  			document.getElementById("submitbtn").setAttribute("disabled",true);
  		}
  		else{
        var password = pwrd1;
        const userid = user;
  			document.getElementById("submitbtn").removeAttribute("disabled");
  			document.getElementById("submitbtn").onclick = function () {
            var newUserRef = users.push({
              name: user,
              "email": email,
              "name": name,
              "password": password,
              "phone": phone,
              "username": user
            });
  			 location.href = ("../pages/Interests.php?id="+userid);
  	 		};
  		}
  	}

  	function arrToString(array){
  		var str = "ERROR: You must enter in a value for: ";
  		var count = 0;
  		var found = 0;
  		for(i=0;i<missing.length;i++){
  			if(array[i] != null){
  				count++;
  			}
  		}
  		for(i = 0; i<missing.length; i++){
  			if(array[i] == null){
  				continue;
  			}
  			else if(found==count-2){
  				str+= array[i] + " & ";
  				found++;
  			}
  			else if(found==count-1){
  				str+= array[i]+".";
  				found++;
  			}
  			else{
  			str+= array[i] + ", ";
  			found++;
  			}
  		}
  		return str;
  	}
  </script>
</body>
</html>
