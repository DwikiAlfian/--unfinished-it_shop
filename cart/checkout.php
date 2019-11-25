<?php 
session_start();
require '../koneksi.php';
require 'item.php';

$db = new database();
$data = $db->checkout();
//Simpan pesanan baru

//Menghapus semua produk dalam keranjang
unset($_SESSION['cart']);
 ?>
 Thanks for buying products. Click <a href="index.php">here</a> to continue purchasing products