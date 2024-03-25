<?php include("sales_report.html");
include ('table.html');
$servername ="localhost";
$username = "root";
$password ="";
$dbname ="ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}
$customerssn=$_POST['cssn'];
$sql = "SELECT * FROM bill where CustomerSSN=$customerssn";
$sq = "SELECT * FROM bill where CustomerSSN=$customerssn";
$query=mysqli_query($conn,$sql);
$row_query=mysqli_fetch_array($query);

$run_user=mysqli_query($conn,$sq);
$row_user=mysqli_fetch_array($run_user);

$result=$conn->query($sql);
echo"<BR><BR><table>
        <tr>
            <th class='left'>ORDER ID: </th><td class='right'>".$row_user["orderrr_id"]."</td>
        </tr>
        <tr>
            <th class='left'>CUSTOMER SSN: </th>
            <td class='right'>".$row_user["CustomerSSN"]. "</td>
        </tr>
        <tr>
            <th class='left'>TOTAL AMOUNT: </th>
            <td class='right'>₹".$row_user["total_amount"]."</td>
        </tr>
        <tr>
            <th class='left'>INSURANCE PAY: </th>
            <td class='right'>₹".$row_user["insurance_payment"]."</td>
        </tr>
        <tr>
           <th class='left'>CUSTOMER PAY: </th>
           <td class='right'>₹".$cs=$row_user["customer_payment"]."</td>
        </tr>
       
    </table>";

echo "<h3 style='background-color:gray;'>Total amount to be paid: ".$cs."  only</h3>";
echo"<h2>HISTORY </h2>";
echo"<table border=1 bgcolor='lightblue'>";
echo"<tr><th>Order_Id</th><th>CustomerSSN</th><th>TotalPay</th><th>Insurancepay</th><th>Customerpay</th></tr>";
while($row=$result->fetch_assoc()){echo"<tr bgcolor='orange'><td>".$row["orderrr_id"]."</td><td>".$row["CustomerSSN"]."</td><td>".$row["total_amount"].
"</td><td>".$row["customer_payment"]."</td><td>".$row["insurance_payment"]."</td></tr>";
}


//include('download.html'); 


$conn->close();
?>