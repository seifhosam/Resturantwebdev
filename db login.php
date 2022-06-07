<?php
error_reporting(E_ERROR | E_PARSE);//remove warning msg
include("connect.php");

if(isset($_POST['login'])) {
	$sql = mysqli_query($conn,
	"SELECT * FROM registeration WHERE Email='"
	. $_POST["username"] . "' AND
	password='" . $_POST["pwd"] . "' ");
	$num = mysqli_num_rows($sql);
	if($num > 0) {
		$row = mysqli_fetch_array($sql);
		header("location:contact_us.php");
		exit();
	}
}
?>