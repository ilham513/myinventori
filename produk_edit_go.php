<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$harga = $_POST['harga'];

$sql = "UPDATE produk 
	SET nama_produk='$nama_produk', 
	id_kategori='$id_kategori', 
	harga='$harga' 
WHERE id_produk='$id_produk'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

header('location: produk.php');
?>