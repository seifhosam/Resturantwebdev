
<?php
error_reporting(E_ERROR | E_PARSE);
include"connect.php";

//cashier login 
if(isset($_POST['login'])) {
	$sql = mysqli_query($conn,
	"SELECT * FROM cashier WHERE Email='"
	. $_POST["username"] . "' AND
	password='" . $_POST["pwd"] . "' ");
	$num = mysqli_num_rows($sql);
	if($num > 0) {
		$row = mysqli_fetch_array($sql);
		header("location:cashiercart.php");
		exit();
	}
}
?>
