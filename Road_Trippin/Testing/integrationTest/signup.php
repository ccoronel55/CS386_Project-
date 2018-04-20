<?php
session_start();
include 'dbh.php';

$username = $_POST['username'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$passconf = $_POST['passconf'];

$sql = "INSERT INTO account (username, name, phone, email, password, passconf)
values ('$username','$name','$phone','$email','$password', '$passconf')";
$result = $conn->query($sql);

header("Location: indexResult.php");
?>
