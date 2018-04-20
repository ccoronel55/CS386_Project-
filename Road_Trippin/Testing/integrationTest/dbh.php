<?php

$conn = mysqli_connect("localhost", "root", "1111", "test2");

if(!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}

?>
