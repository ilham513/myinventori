<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$sql = "UPDATE kategori
	SET nama_kategori='$nama_kategori'
WHERE id_kategori='$id_kategori'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

// die();

header('location: kategori.php');
?>