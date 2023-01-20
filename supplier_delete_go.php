<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_supplier = $_GET['id_supplier'];

// sql to delete a record
$sql = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

header('location: supplier.php');
?>