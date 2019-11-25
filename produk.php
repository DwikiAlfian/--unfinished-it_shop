<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Tambahkan Produk</title>
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
  <div style="height: 700px;">
    <form action="cart/photo_upload/upload.php?action=add" enctype="multipart/form-data" method="post" style="margin-left: auto; margin-right: auto; background-color: white; height: 500px;width: 700px; border-radius: 20px; padding: 20px;">
      <p style="font-size: 40px; text-align: center;">Tambahkan Produk Baru</p>

      <!-- NAMA PRODUK -->
      <div>
        <label>Nama Produk/Barang</label>
        <div>
          <input name="nama_barang" style="width: 680px;" type="text" placeholder="ex: Smartphone" value="">
        </div>
      </div>

      <!-- HARGA -->
      <div>
        <label>HARGA</label>
        <div>
          <input onkeypress="return hanyaAngka(event)" style="width: 680px;" maxlength="12" name="harga" type="text" placeholder="ex: 1200000" value="<?php $hargaErr ?>">
        </div>
      </div>

      <div>
        <label>ID FOTO</label>
        <div>
          <input name="photo" type="file" style="width: 680px;" placeholder="ex: 1" value="">
        </div>
      </div>

      <!-- KATEGORI -->
      <div>
        <label class="uk-form-label" for="form-horizontal-text">Kategori</label>
        <div>
          <select name="kategori">
            <option>Smartphone</option>
            <option>Kamera</option>
            <option>Komputer</option>
            <option>Laptop</option>
            <option>Lain-Lain</option>
          </select>
        </div>
      </div>

      <div>
        <label>Jumlah Barang</label>
        <div>
          <input name="quantity" onkeypress="return hanyaAngka(event)" type="text"style="width: 680px;"  placeholder="ex: 1" value="">
        </div>
      </div>

      <!-- SUBMIT -->
      <div>
        <div>
          <input class="button-submit" name="submit" type="submit" value="SUBMIT">
        </div>
      </div>
    </form>
  </div>
  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
  </script>
</body>

</html>