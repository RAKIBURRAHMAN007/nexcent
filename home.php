<?php
session_start();
if (!isset($_SESSION['uname'])) {
  echo "<script>window.location='login.php';</script>";
}
?>

<h2>Welcome, <?php echo $_SESSION['uname']; ?>!</h2>
<a href="logout.php">Logout</a>
