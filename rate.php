<style>

@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Styling h1 and links
––––––––––––––––––––––––––––––––– */

body
{
  background: #4a4a4c !important;
}

.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f005"; /* Star */
  margin: 2px;
  font-size: 2em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #222222; /* Start color when not clicked */
}

.starrating > input:checked ~ label
{ color: #ffca08 ; } /* Set yellow color when star checked */

.starrating > input:hover ~ label
{ color: #ffca08 ;  } /* Set yellow color when star hover */


</style>  
<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
	foreach($_SESSION["shopping_cart"] as $key=>$value){
	  if($value['ID'] === $_POST["ID"]){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		  break; 
	  }
	}
}
?>
<html>
    <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test1";

  
  $conn = mysqli_connect($servername, $username, $password, $dbname);

    ?>
<head>
<title>Rating</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Rate Your Order</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}

?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_Price = 0;
}   
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>Rate</td>

</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<td ><form action="" method="get"> <div class="container">
        <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
            <input type="radio" id="star5" name="rate" value="5" /><label for="star5" title="5 star">5</label>
            <input type="radio" id="star4" name="rate" value="4" /><label for="star4" title="4 star">4</label>
            <input type="radio" id="star3" name="rate" value="3" /><label for="star3" title="3 star">3</label>
            <input type="radio" id="star2" name="rate" value="2" /><label for="star2" title="2 star">2</label>
            <input type="radio" id="star1" name="rate" value="1" /><label for="star1" title="1 star">1</label>

        </div>
  </div> </form><br />

  <?php


  
  ?>
<form method='post' action=''>
<td>
</tr>
<?php
}
?>
<tr>
<td colspan="5" align="right">
<form action="checkout.php" style="margin:10px 230px" ><button style="color:red "><b>Done</b></button></form>
</td>
</tr>
</tbody>
</table>		
  <?php
//}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<br /><br />
</div>
</body>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</html>