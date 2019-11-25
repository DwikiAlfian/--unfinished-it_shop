<?php

session_start();
include_once('koneksi.php');
if(isset($_SESSION['is_login']))
{
    $login = "<a href='user.php'>" . $_SESSION['username'] ."</a>";
    $cart = "<a href='cart/cart2.php'>CART</a>";
    $logout = "<a href='logout.php'>LOGOUT</a>";
}
else
{
    $login = "<a href='login.php'>LOGIN</a>";
    $cart = "";
    $logout = "<a href='register.php'>REGISTER</a>";
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/xxe.css" />
</head>

<body>
  <div style="height: 400px; background-image: linear-gradient(0deg, blue, lightblue);">
    <div style="text-align: center;">
      <p style="font-size: 65px; margin: 0; padding-top: 150px;">REZPONDING</p>
    </div>
  </div>

  <ul class="navbar">
        <li><a href="/">HOME</a></li>
        <li><a href="cart">PRODUCT</a></li>
        <li style="float: right;"><?php echo $logout; ?></li>
        <li style="float: right;"><?php echo $login; ?></li>
        <li style="float: right;"><?php echo $cart ?></li>
    </ul>

  <div class="card-primary">
    <div style="width: 400px; height: 400px;" class="card-image">
      <a href="">
        <div id="i1">
          <div class="card-primary-image"></div>
          <p></p>
        </div>
      </a>
    </div>
    <div style="width: 200px; height: 200px;" class="card-image">
      <a href="">
        <div id="i2">
          <div class="card-primary-image"></div>
          <p></p>
        </div>
      </a>
    </div>
    <div style="width: 200px; height: 200px;" class="card-image">
      <a href="">
        <div id="i3">
          <div class="card-primary-image"></div>
          <p></p>
        </div>
      </a>
    </div>
  </div>
</body>

</html>