<?php
$connect = mysqli_connect("localhost", "root", "", "nexcent_db");
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
