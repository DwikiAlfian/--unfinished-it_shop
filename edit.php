<?php

include('koneksi.php');
$db = new database();
$id_barang = $_GET['id'];
if(! is_null($id_barang))
{
  $data_barang = $db->get_by_id($id_barang);
}
else
{
  header('location:produk.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
  </head>
  <body>
    <nav class="uk-navbar uk-navbar-container uk-margin">
      <div class="uk-navbar-left">
        <a class="uk-navbar-toggle" href="#">
            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left"></span>
        </a>
        <a href="home.php">
            <button class="uk-button uk-button-primary uk-margin-small-right" type="button" name="button">HOME</button>
        </a>
        <a href="produk.php">
            <button class="uk-button uk-button-primary" type="button" name="button">TAMBAH PRODUK</button>
        </a>
      </div>
      <div class="uk-navbar-right">
        <a href="logout.php" class="uk-button uk-button-text">LOGOUT</a>
      </div>
    </nav>
    <div class="uk-card uk-card-body">
      <form action="proses_barang.php?action=update" method="post">
        <fieldset class="uk-fieldset">
          <legend class="uk-legend">Edit Produk Anda</legend>
          <input type="hidden" name="id_barang" value="<?php echo $data_barang['id'] ?>">
          <!-- NAMA PRODUK -->
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Nama Produk/Barang</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="nama_barang" type="text" placeholder="ex: Smartphone" value="<?php echo $data_barang['nama_barang'] ?>">
              </div>
          </div>

          <!-- HARGA -->
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">HARGA</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="harga" type="text" placeholder="ex: 1200000" value="<?php echo $data_barang['harga'] ?>">
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">ID PENJUAL</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="id_penjual" type="text" placeholder="ex: 1" value="<?php echo $data_barang['id_penjual'] ?>">
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">ID FOTO</label>
              <div class="uk-form-controls">
                <input class="uk-input" name="id_foto" type="text" placeholder="ex: 1" value="<?php echo $data_barang['id_foto'] ?>">
              </div>
          </div>

          <!-- KATEGORI -->
          <div class="uk-margin">
              <label class="uk-form-label" for="form-horizontal-text">Kategori</label>
              <div class="uk-form-controls">
                <select name="kategori" class="uk-select" id="form-horizontal-select" value="<?php echo $data_barang['kategori'] ?>">
                  <option>Komputer</option>
                  <option>Kamera</option>
                  <option>Smartphone</option>
                  <option>Laptop</option>
                  <option>Lain-Lain</option>
                </select>
              </div>
          </div>

          <!-- FOTO -->
          <!-- <div class="uk-margin" uk-margin>
            <label class="uk-form-label" for="form-stacked-text">Foto</label>
            <div uk-form-custom="target: true">
              <input name="image" type="file">
              <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
            </div>
          </div> -->

          <!-- SUBMIT -->
          <div class="uk-margin">
              <div class="uk-form-controls">
                <input class="uk-button" name="submit" type="submit" value="UPDATE">
              </div>
          </div>


        </fieldset>
      </form>
    </div>
  </body>
</html>
