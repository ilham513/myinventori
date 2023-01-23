<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_produk = $_POST['id_produk'];
$qty_keluar = $_POST['qty_keluar'];

$sql = "INSERT INTO produk_keluar (id_produk, qty_keluar)
VALUES ('$id_produk', '$qty_keluar')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: produk_keluar.php');
?>