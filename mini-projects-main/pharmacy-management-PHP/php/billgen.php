<?php include ('new_invoices.html'); 
 //include ('attach.html');


$servername ="localhost";
$username = "root";
$password ="";
$dbname ="ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}
$Order_id =$_POST['orderid'];
$customer_ssn= $_POST['cname'];
$totalamt= $_POST['price'];

$insurancepay=0.1*$totalamt;
$customerpay=$totalamt-$insurancepay;

$sql = "INSERT INTO bill(orderrr_id,customerSSN,total_amount,customer_payment,insurance_payment)
VALUES('$Order_id','$customer_ssn','$totalamt','$customerpay','$insurancepay')";
if(mysqli_query($conn,$sql))
{

echo"<script>alert('ORDER PLACED SUCCESSFULLY FOR ORDER_ID:".$Order_id."');</script>";
}

mysqli_close($conn);
?>