<?php
// Start the session
session_start();

function cek_session(){
	if($_SESSION["jabatan"] != "admin"){
		echo ("<script LANGUAGE='JavaScript'>
		window.alert('Silahkan login dahulu');
		window.location.href='index.php';
		</script>");
	}
}