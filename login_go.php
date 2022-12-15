<?php
include '_koneksi.php';
include '_method.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM akun WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	// Set session variables
	$_SESSION["jabatan"] = "admin";
	
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='dashboard.php';
    </script>");
  }
} else {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Useername atau password salah');
    window.location.href='index.php';
    </script>");
}



$conn->close();
?>