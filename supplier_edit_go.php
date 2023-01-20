<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);die();

$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telpon = $_POST['telpon'];

$sql = "UPDATE supplier 
	SET nama_supplier='$nama_supplier', 
	alamat='$alamat', 
	email='$email', 
	telpon='$telpon' 
WHERE id_supplier='$id_supplier'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

header('location: supplier.php');
?>