<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];

$sql = "INSERT INTO produk (nama_produk, id_kategori, harga)
VALUES ('$nama_produk', '$id_kategori', '$harga')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: produk.php');
?>