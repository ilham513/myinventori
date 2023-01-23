<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_produk = $_POST['id_produk'];
$id_supplier = $_POST['id_supplier'];
$kadaluarsa = $_POST['kadaluarsa'];
$qty = $_POST['qty'];

$sql = "INSERT INTO produk_masuk (id_produk, id_supplier, kadaluarsa, qty)
VALUES ('$id_produk', '$id_supplier', '$kadaluarsa','$qty')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: produk_masuk.php');
?>