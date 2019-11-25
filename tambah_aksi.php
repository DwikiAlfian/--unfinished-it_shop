<?php

// KONEKSI
include 'koneksi.php';

// Mengambil Data dari HTML
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

// Input Data
mysqli_query($koneksi, "Insert into produk set (nama_barang,kategori,harga,id_penjual,id_foto) values('$nama','$kategori',$harga,1,1)");

// Redirect
header("location:home.php");

?>
