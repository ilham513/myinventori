<?php
include '_koneksi.php';
include '_method.php';

cek_session();

// var_dump($_POST);
$nama_kategori = $_POST['nama_kategori'];

$sql = "INSERT INTO kategori (nama_kategori)
VALUES ('$nama_kategori')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header('location: kategori.php');
?>