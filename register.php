<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

  $check = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");

  if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Email already registered');</script>";
  } else {
    $insert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPass')";
    if (mysqli_query($connect, $insert)) {
      echo "<script>alert('Registered successfully'); window.location='login.php';</script>";
    } else {
      echo "<script>alert('Registration failed');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nexcent | Register</title>
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
          <h4 class="fw-bold">Register to Nexcent</h4>
        </div>
        <form method="POST">
          <div class="mb-3">
            <label for="name" class="form-label text-start d-block">Full Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Enter your full name"
              required
            />
          </div>

          <div class="mb-3">
            <label for="email" class="form-label text-start d-block">Email address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              placeholder="Enter your email"
              required
            />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label text-start d-block">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
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
              Register
            </button>
          </div>

          <div class="text-center">
            <small>
              Already have an account?
              <a href="login.php" class="text-decoration-none">Login here</a>
            </small>
          </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
