<?php

include '../koneksi.php';
session_start();
$db = new database();
$data = $db->produk();

if(isset($_SESSION['is_login']))
{
    $login = "<a href='../user.php'>" . $_SESSION['username'] ."</a>";
    $cart = "<a href='../cart/cart2.php'>CART</a>";
    $logout = "<a href='../logout.php'>LOGOUT</a>";
}
else
{
    $login = "<a href='../login.php'>LOGIN</a>";
    $cart = "";
    $logout = "<a href='../register.php'>REGISTER</a>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/xxe.css">
    <title>Item</title>
</head>

<body>
    <ul class="navbar">
        <li><a href="../">HOME</a></li>
        <li><a href="../cart">PRODUCT</a></li>
        <li style="float: right;"><?php echo $logout; ?></li>
        <li style="float: right;"><?php echo $login; ?></li>
        <li style="float: right;"><?php echo $cart ?></li>
    </ul>
    <ul class="navbar" style="background: rgba(5,1,59,0.8);">
        <li><a href="">ALL STUFF</a></li>
        <li><a href="">CATEGORY</a></li>
    </ul>
    <div class="grid-product" style="width: 1230px; margin-left: auto; margin-right: auto;">
        <?php
        foreach ($data as $row) {
            if ($row > 1) {
                ?>
                <div class="card-product" style="background-image: url('../photo/<?php echo $row['foto']; ?>'); background-size: cover;">
                    <div class="card-list" style="margin: 0;padding-left: 10px;padding-top: 230px; padding-bottom: 10px;border-radius: 10px;">
                        <a href="detailproduk.php?id=<?php echo $row['id']; ?>"><p style="margin: 0; font-size: 30px; "><?php echo $row['nama_barang']; ?></p></a>
                        <div style="float:right; margin-right: 10px; padding: 5px;background-color: white; border-radius: 5px;"><a href="cart.php?id= <?php echo $row['id'] ?> &action=add">Order This Product</a></div>
                        <h3 style="margin: 0;">Rp. <?php echo $row['harga']; ?></h3>
                    </div>
                </div>
        <?php
            } else if ($row < 1) {
                echo "";
            }
        }
        ?>
    </div>
</body>

</html>