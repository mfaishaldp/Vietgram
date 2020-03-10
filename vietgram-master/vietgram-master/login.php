<?php

session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$result = mysqli_query($conn,"select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($result); 
if($cek == 1){
    $dataProfile = mysqli_query($conn,"select * from profile where username ='$username'");
    $row_profile = mysqli_fetch_array($dataProfile);
    $_SESSION["username"] = $username;
    $_SESSION["status"] = "Login";
	$_SESSION["name"] = $row_profile["name"];
	$_SESSION["website"] = $row_profile["website"];
	$_SESSION["bio"] = $row_profile["bio"];
	$_SESSION["email"] = $row_profile["email"];
	$_SESSION["hp"] = $row_profile["hp"];
	$_SESSION["gender"] = $row_profile["gender"];
	header("location:feed.php");
}else{
	header("location:index.php?logstatus=false");
}
?>