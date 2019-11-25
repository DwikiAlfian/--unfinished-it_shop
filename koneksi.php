<?php

class database
{
  var $host = "localhost";
  var $username = "root";
  var $password = "";
  var $database = "native_akhir";
  var $koneksi;

  function __construct()
  {
    $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  }

  function register($username, $password, $name, $email)
  {
    $insert = mysqli_query($this->koneksi, "INSERT INTO user VALUES (NULL,'$name','$username','$email','$password')");
    return $insert;
  }

  function login()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username='$username'");
    $data_user = $query->fetch_array();
    if (password_verify($password, $data_user['password'])) {
      if ($remember) {
        setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
        setcookie('nama', $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
      }
      $_SESSION['id'] = $data_user['id'];
      $_SESSION['username'] = $username;
      $_SESSION['name'] = $data_user['nama'];
      $_SESSION['is_login'] = TRUE;
      return TRUE;
    }
  }

  function relogin($username)
  {
    $query = mysqli_query($this->koneksi, "SELECT * FROM user where username='$username'");
    $data_user = $query->fetch_array();
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $data_user['nama'];
    $_SESSION['is_login'] = TRUE;
  }

  function produk()
  {
    $data = mysqli_query($this->koneksi, "select * from produk");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    if ($row > 0) {
      return $hasil;
    } else {
      $hasil[] = "<h3>Tidak ada hasil</h3>";
      return $hasil;
    }
  }

  function checkout()
  {
    $sql1 = 'INSERT INTO orders (name, datecreation, status, username) VALUES ("New Order","' . date('Y-m-d') . '",0,"acc2")';
    mysqli_query($this->koneksi, $sql1);
    $ordersid = mysqli_insert_id($this->koneksi);
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i = 0; $i < count($cart); $i++) {
      $sql2 = 'INSERT INTO orderdetail (productid, orderid, price, quantity) VALUES (' . $cart[$i]->id . ', ' . $ordersid . ', ' . $cart[$i]->price . ', ' . $cart[$i]->quantity . ')';
      mysqli_query($this->koneksi, $sql2);
    }
  }

  function cart($id)
  {
    $sql = "SELECT * FROM produk WHERE id=" . $id;
    $result = mysqli_query($this->koneksi, $sql);
    $product = mysqli_fetch_array($result);
    // $res = mysqli_result($product);
    return $product;
  }

  function tambah_data($nama_barang, $kategori, $harga, $foto, $quantity)
  {
    session_start();
    $id = $_SESSION['id'];
    mysqli_query($this->koneksi, "insert into produk values (NULL,'$nama_barang','$kategori','$harga','$id','$foto','$quantity')");
  }

  function tambah_keranjang($id_produk)
  {
    session_start();
    $id = $_SESSION['id'];
    mysqli_query($this->koneksi, "INSERT INTO keranjang VALUES ('','$id','$nama_produk','$quantity')");
  }

  function get_by_id($id_barang)
  {
    $query = mysqli_query($this->koneksi, "select * from produk where id='$id_barang'");
    return $query->fetch_array();
  }

  function update_data($id_barang, $nama_barang, $kategori, $harga, $id_penjual, $id_foto)
  {
    $query = mysqli_query($this->koneksi, "update produk set nama_barang='$nama_barang', kategori='$kategori', harga='$harga', id_penjual='$id_penjual', id_foto='$id_foto' where id='$id_barang'");
  }

  function delete_data($id_barang)
  {
    $query = mysqli_query($this->koneksi, "delete from produk where id='$id_barang'");
  }
}
