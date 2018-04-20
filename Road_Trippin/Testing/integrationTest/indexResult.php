<?php
session_start();
include 'dbh.php';

$sql = "SELECT * FROM account;";
$result = $conn -> query($sql);


while($row=$result->fetch_assoc()) {
  echo $row['username']."/".$row['name']."/".$row['phone']."/".$row['email']."/".$row['password']."<br>";
}
echo $username;

?>
