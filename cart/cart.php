<?php
session_start();
include '../koneksi.php';
include 'item.php';
$db = new database();
$cart = $db->cart($_GET['id']);

if (isset($_GET['id']) && !isset($_POST['update'])) {
    $item = new Item();
    $item->id = $cart['id'];
    $item->name = $cart['nama_barang'];
    $item->price = $cart['harga'];
    $iteminstock = $cart['quantity'];
    $item->quantity = 1;
    //Periksa produk dalam keranjang
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i = 0; $i < count($cart); $i++)
        if ($cart[$i]->id == $_GET['id']) {
            $index = $i;
            break;
        }
    if ($index == -1)
        $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
    else {

        if (($cart[$index]->quantity) < $iteminstock)
            $cart[$index]->quantity++;
        $_SESSION['cart'] = $cart;
    }
}

if (isset($_GET['index']) && !isset($_POST['update'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}

if (isset($_POST['update'])) {
    $arrQuantity = $_POST['quantity'];
    $cart = unserialize(serialize($_SESSION['cart']));
    for ($i = 0; $i < count($cart); $i++) {
        $cart[$i]->quantity = $arrQuantity[$i];
    }
    $_SESSION['cart'] = $cart;
}


?>

<?php
if (!isset($_GET["id"]) || isset($_GET["id"]) || isset($_GET["index"])) {
    header('Location: cart2.php');
}
?>