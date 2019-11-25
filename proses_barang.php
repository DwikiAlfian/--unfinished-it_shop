<?php

include('koneksi.php');
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
  $koneksi->tambah_data($_POST['nama_barang'], $_POST['kategori'], $_POST['harga'], $_POST['id_foto'], $_POST['quantity']);
  header('location:all_landing.php');
}

elseif($action == "update")
{
  $koneksi->update_data($_POST['id_barang'],$_POST['nama_barang'],$_POST['kategori'],$_POST['harga'],$_POST['id_penjual'],$_POST['id_foto']);
  header('location:all_landing.php');
}
elseif($action == "delete")
{
  $id_barang = $_GET['id'];
  $koneksi->delete_data($id_barang);
  header('location:all_landing.php');
}

?>
