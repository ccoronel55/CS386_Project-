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
  <form id ="project-form" href="MapPage.html" method="post">

  <h1>Your Interests</h1>
	<div class = "inputs">
    <label>Indoors:</label>
	   <input type="checkbox" id="eat">Eatting in Nice Restaurant</input><br>
    <label></label>
     <input type="checkbox" id="shopping">Shopping</input><br>
    <label></label>
     <input type="checkbox" id="art">Go to Museum</input><br>
    <label></label>
     <input type="checkbox" id="movie">Watch a Movie</input><br>
     <label></label>
      <input type="checkbox" id="hotel">Rest in Nice Hotel</input><br>
    <label></label>
      <input type="checkbox" id="insport">Indoor Sports</input>

   <br>
   <br>
	  <label>Outdoors:</label>
		  <input type="checkbox" id="camp">Camping</input><br>
    <label></label>
      <input type="checkbox" id="hike">Hiking</input><br>
    <label></label>
      <input type="checkbox" id="surf">Surfing</input><br>
    <label></label>
      <input type="checkbox" id="cycle">Cycling</input><br>
    <label></label>
      <input type="checkbox" id="outsport">Outdoor Sports</input>
	</div>

  <div class="buttons">
  		<a href="MapPage.html"><button type="reset" id="reset" class="btn btn-info">Reset</button></a>
  		<a href="MapPage.html"><button type="button" id="submitbtn" class="btn btn-info">Enroll</button></a>
  </div>

  </form>
</div>

</body>
</html>