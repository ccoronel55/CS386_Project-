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
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
  	background: url("images/blue.jpg");
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
  <form id ="project-form" href="pages/MapPage.html" method="post">

  <h1>About Us</h1>



	  <p>Road Trippin’ is meant to help make road trips easier and more adventurous.
	  The Road Trippin’ application has a lot of user interaction; the user is able to
	  log in/ sign up, interact with the map, and adjust personal settings. This application
	  also connects to a private server which will store the user’s personal data,
	  but they cannot interact directly with it. The user, once an account is created,
	  can edit their personal preferences, interests, and profile. The user is also able
	  to plan a road trip with the interactive map and destination/ activity suggestions
	  provided based on their current route and interests.<br /><br />
	  Copyright (C) 2018  Claudia Coronel, Morgan Lovato, Madison Boman and Hyungi Choi
	  <br /><br />
	  This program is free software: you can redistribute it and/or modify
	  it under the terms of the GNU General Public License as published by
	  the Free Software Foundation, either version 3 of the License, or
	  (at your option) any later version.
	  <br /><br />
	  This program is distributed in the hope that it will be useful,
	  but WITHOUT ANY WARRANTY; without even the implied warranty of
	  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	  GNU General Public License for more details.
	  <br /><br />
	  You should have received a copy of the GNU General Public License
	  along with this program.  If not, see <https://www.gnu.org/licenses/>.
	  <br />
	  </p>
<div class="buttons" style="padding-left:45%">
		<a href="MapPage.php?id="><button type="button" id="button" class="btn btn-info">Back</button></a>
</div>

</form>
</div>


<script>
  var username = "<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id'];}?>";
  const users = firebase.database().ref().child('users');

  var teststr1 = "MapPage.php?id=" + username;
  $('a[href="MapPage.php?id="]').prop('href',teststr1);

</script>
</body>
</html>
