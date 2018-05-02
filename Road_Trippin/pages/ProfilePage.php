<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('../firebase.js')?>
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
    margin-left: 25%;
    width: 40%;
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
  font-family: 'Open Sans', sans-serif;
  text-align: right;
  padding:20px;
  width: 60%;
  display:inline;
  }

  .buttons{
  padding-left:0px;
}
  </style>
</head>
<body>

<div class = "container">
  <form id ="project-form" href="../pages/MapPage.html" method="post">

  <h1>Profile</h1>
	<div class = "inputs">

  <label>Username:</label>
    <p>SaraJ123</p>
	<br>
<br>
	<label>Name:</label>
  <p>Sara Jones</p>
	<br>
<br>
	<label>Phone-number:</label>
  <p>(555)-555-5555</p>
	<br>
<br>
	<label>Email:</label>
  <p>sarajones@email.com</p>
	<br>
  <br>
  <br>


<div class="buttons" style="text-align:center;">
		<a href="../pages/EditProfile.html"><button type="button" class="btn btn-info">Edit Profile</button></a>
		<a href="../pages/Interests.html"><button type="button" class="btn btn-info">Edit Intrests</button></a>
    <a href="../pages/MapPage.html"><button type="button" class="btn btn-info">Home</button></a>
</div>

</form>
</div>


<script>
</script>
</body>
</html>
