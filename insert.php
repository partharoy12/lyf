<?php
session_start();

?>
<?php
include("db_conection.php");
if(isset($_POST['register']))
{	
$user_name = $_POST['nuser_name'];
$user_email = $_POST['nuser_email'];
$user_msg = $_POST['nuser_message'];

$check_user="select * from customers WHERE user_email='$user_email'";
$run_query=mysqli_query($dbcon,$check_user);

if(mysqli_num_rows($run_query)>0)
{
	echo "<script>alert('Customer is already exist, Please try another one!')</script>";
 	echo"<script>window.open('index.php','_self')</script>";
	exit();
}
 
$saveaccount="insert into customers (user_name,user_email,user_msg) VALUE ('$user_name','$user_email','$user_msg')";
mysqli_query($dbcon,$saveaccount);
echo "<script>alert('Data successfully saved, You may now login!')</script>";				
echo "<script>window.open('index.php','_self')</script>";


}





?>