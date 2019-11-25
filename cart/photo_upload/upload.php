<?php

include_once('../../koneksi.php');
$database = new database();

// PHOTO
$photoname_x = $_FILES['photo']['name'];
$photoname = str_replace(" ", "_", $photoname_x);
$phototmp = $_FILES['photo']['tmp_name'];

$dir = "../../../native_akhir/photo/";

$uploaded = move_uploaded_file($phototmp, $dir . $photoname);

$action = $_GET['action'];

if ($action == "add") {
    $database->tambah_data($_POST['nama_barang'], $_POST['kategori'], $_POST['harga'], $photoname, $_POST['quantity']);
    header('location:../../cart');
}
