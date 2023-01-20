<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_kategori = $_GET['id_kategori'];

// sql to delete a record
$sql = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

header('location: kategori.php');
?>