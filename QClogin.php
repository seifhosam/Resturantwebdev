<?php

//quality control login
if(isset($_POST['login'])) {
	$sql = mysqli_query($conn,
	"SELECT * FROM qualitycontrol WHERE Email='". $_POST["username"] . "' ANDpassword='" . $_POST["pwd"] . "' ");
	$num = mysqli_num_rows($sql);
	if($num > 0) {
		$row = mysqli_fetch_array($sql);
		header("location:QCHomePage.php");
		exit();
	}
}
?>