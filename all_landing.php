<?php

include('koneksi.php');
$db = new database();
$data_barang = $db->produk();

?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Landing Page</title>
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
       <a href="produk.php"><button class="uk-button">Tambah Produk</button></a>
       <?php

       foreach ($data_barang as $row) {
         if($row>1){
         ?>

         <div class="uk-card uk-card-body uk-card-primary">
           <div class="uk-card-badge uk-label"><?php echo $row['kategori'] ?></div>
           <h3 class="uk-card-title"><?php echo $row['nama_barang'] ?></h3>
           <h3 class="uk-card-title"><?php echo $row['harga'] ?></h3>
           <a class="uk-button uk-button-default" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
           <input type="text" class="uk-input" name="quantity">
           <a class="uk-button uk-button-default" href="cart.php?id=<?php echo $row['id'] ?>&action=add">Pesan</a>
           <a class="uk-button uk-button-default" href="proses_barang.php?action=delete&id=<?php echo $row['id'] ?>">Delete</a>
         </div>

         <?php
       } else if($row<1) {
         echo "";
       }
       }
        ?>
     </div>
   </body>
 </html>
