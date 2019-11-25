<?php

session_start();
include_once('koneksi.php');
$database = new database();

if (isset($_SESSION['is_login'])) {
  header('location:home.php');
}

if (isset($_COOKIE['username'])) {
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (isset($_POST['remember'])) {
    $remember = TRUE;
  } else {
    $remember = FALSE;
  }

  if ($database->login($username, $password, $remember)) {
    header('location:home.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/xxe.css" />
  <style>
    body{
      margin: 0;
      background-image: linear-gradient(0deg,black, rgb(1, 5, 59));
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>
  <div style="height: 700px; padding-top: 80px;">
    <div class="card">
      <form action="" method="post">
        <legend style="text-align: center; font-family: 'League Spartan', sans-serif; font-size: 50px;">LOGIN</legend>
        <div>
          <input type="text" name="username" placeholder="Username" required autofocus>
        </div>
        <div>
          <input type="password" name="password" placeholder="Password">
        </div>
        <div>
          <button style="float: left;" type="submit" name="login">LOGIN</button>
          <p style="float: left; padding-left: 10px; font-family: 'Cabin', sans-serif;">Don't have account? Try <a class="link" href="register.php">register</a></p>
        </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>

</html>