<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_produk = $_GET['id_produk'];

// sql to delete a record
$sql = "DELETE FROM produk WHERE id_produk='$id_produk'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

header('location: produk.php');
?>