<?php include 'attach.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM medicine";

$result = $conn->query($sql);

    echo "<center>";
if ($result->num_rows > 0) {
echo "<h1>Medicines available</h1>";  
echo "<table border= '1px double lightblue'>";
    
    echo "<tr bgcolor='lightblue'><th> MEDICINE NAME </th><th> BATCH NUMBER</th><th> MEDICINE TYPE </th>
    <th>MANUFACTURER</th><th>STOCK QUANTITY</th><th>EXPIRY DATE</th>
    <th>PRICE</th><th></th><th></th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr bgcolor='pink' ><td>"  . $row["drug_name"] . "</td><td>"  . $row["batch_number"] . "</td><td>"  . $row["MedicineType"] . "</td><td>" . $row["Manufacturer"] . "</td><td>".
        $row["stock_quantity"]."</td><td>".$row["expiry_date"]."</td><td>".$row["Price"]."</td><td><form action='manage_medicine.php' method='post'>
		<input type='hidden' name='id' value=$row[batch_number]>
		<button type='submit' name='delete_row'>DLT</button>
	</form></td>
    <td><form action='update_medicine.php' method='post'>
    <input type='text' name='name' placeholder='new drug name'>
    <input type='hidden' name='idd' value=$row[batch_number]>
   

    <button type='submit' name='update_row'>UPDATE</button>
</form>
</td></tr>";
    }
echo "</table>";
} else {
    echo "No results found.";
}
echo "</center>";
// Close connection
$conn->close();
?>