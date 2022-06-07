<?php
ob_start();

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<style>
  	  body{
    height: 600px;
    overflow-x: hidden;
}

.online{
    background-color:#86868b;
}
.online h1{
    color: white;
    font-size: 48px;
}

.inputfile{
    position: relative;
    bottom: 35px;
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: transparent;
    display: inline-block;
    cursor: pointer;
    border: 1px solid white;
}
.inputfile:focus,
.inputfile:hover {
    background-color: rgb(121, 117, 117);
}

a{
color:black;	
}
.forget{
	text-decoration:none;
	font-weight:bold;
}
.forget:hover{
	text-decoration:none;
}

.pos{
	width:500px;
}
.head{
	text-align:center;
	position:relative;
	bottom:50px;	
}
 h5{
    position: relative;
    bottom:25px;
    color : blue;
}
</style>
<head>
  </head>
        <div class="online py-100">
        <div class="container pos">
            <div class="row">
                <div class="col-lg">
					<h1 class="head">Reset</h1>
                   <form action="" method = "post">
						<div class="form">

<?php 
  $sql="SELECT * from registeration where Email='".$_GET["X"]."'"; 
  $result = mysqli_query($conn,$sql);	
  if($row=mysqli_fetch_array($result))	
  { 
      $question=$row[6];
  }
    ?>
                           
                            
							 <br>
                             New Password:
                             <input type="password"class="form-control mb-4 border-0 py-4 " placeholder="Your new password" name="password"><br>
							 <br>
							 <br>
                             <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
                             </form>
                             <?php
                      
                       if(isset($_POST["Submit"]))
                       { 
                         if(!empty($_POST['password'])){
                        if(strlen($_POST["password"])>=8){   
                        $invalid=true;
                        }
                        else 
                        {
                          $checkUpper=true;
                          for($i=0;$i<strlen($_POST["password"]);$i++)
                          {
                            if(ctype_upper($_POST['password'][$i]))
                            {
                              $checkUpper=false;
                            }   
                          }
                        
                          $checkNumeric=true;
                          for($i=0;$i<strlen($_POST["password"]);$i++)
                          {
                            if(is_numeric($_POST['password'][$i]))
                            {
                              $checkNumeric=false;
                            }
                          }
                        
                          $checkSpecial=true;
                          if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"]))
                          {
                            $checkSpecial=false;
                          }
                          if($checkSpecial==true||$checkNumeric==true||$checkUpper==true)
                          {
                            $invalid=false;
                          }
                        }
                          
             
                        if($row=mysqli_fetch_array($result))	{
                         
if($invalid==true){
                           $sql ="UPDATE registeration SET password='".$_POST["password"]."'WHERE Email='".$_GET["X"]."'";
                           $result=mysqli_query($conn,$sql);
                           header("Location:projectlogin.php");
}   else echo "<h5>*Password should be atleast 8 chars in length & should contain atleast 1 uppercase letter , 1 number , and one special char </h5>";
                 

                        }  
                      
                                                     
                                                    
                                                } else echo "<h5>*Missing fields</h5>"; 
                                            }
                       
                                          
               
                                              
                    
                             ?>
                        
                             