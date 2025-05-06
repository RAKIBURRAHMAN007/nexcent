<?php
session_start();
include 'connect.php'; // Make sure connect.php has the DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($connect, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($pass, $user['password'])) {
    $_SESSION['uname'] = $user['name'];
    echo "<script>window.location='home.php';</script>";
    exit;
  } else {
    echo "<script>alert('Invalid email or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nexcent | Login</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="index.css" />
  </head>
  <body class="bg-light">
    <div
      class="container d-flex align-items-center justify-content-center min-vh-100"
    >
      <div class="card shadow p-4" style="width: 100%; max-width: 400px">
        <div class="text-center mb-4">
          <a href="index.html">
            <img
              src="img/Icon.png"
              alt="Nexcent Logo"
              width="40"
              class="mb-2"
            />
          </a>
          <h4 class="fw-bold">Login to Nexcent</h4>
        </div>

        <!-- Login Form -->
        <form method="POST">
          <div class="mb-3">
            <label for="email" class="form-label text-start d-block"
              >Email address</label
            >
            <input
              type="email"
              name="email"
              class="form-control"
              id="email"
              placeholder="Enter your email"
              required
            />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label text-start d-block"
              >Password</label
            >
            <input
              type="password"
              name="pass"
              class="form-control"
              id="password"
              placeholder="Enter your password"
              required
            />
          </div>

          <div class="d-grid mb-3">
            <button
              type="submit"
              class="btn btn-success"
              style="background-color: #4caf4f"
            >
              Login
            </button>
          </div>

          <div class="text-center">
            <small>
              Don't have an account?
              <a href="register.php" class="text-decoration-none">Register here</a>
            </small>
          </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
