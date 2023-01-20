<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telpon = $_POST['telpon'];

$sql = "INSERT INTO supplier (nama_supplier, alamat, email, telpon)
VALUES ('$nama_supplier', '$alamat', '$email','$telpon')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: supplier.php');
?>