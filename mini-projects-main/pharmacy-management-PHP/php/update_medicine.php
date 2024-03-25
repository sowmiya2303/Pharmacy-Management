	
<?php include 'attach.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$id = $_POST['idd'];

// Construct SQL UPDATE statement
$sql = "UPDATE medicine SET drug_name='$name' WHERE batch_number=$id";

// Execute SQL statement
mysqli_query($conn, $sql);


$sql = "SELECT * FROM medicine";

$result = $conn->query($sql);

    echo "<center>";
if ($result->num_rows > 0) {
echo "<h1>Medicines available after Updating</h1>";  
echo "<table border= '1px double lightblue'>";
    
    echo "<tr bgcolor='lightblue'><th> MEDICINE NAME </th><th> BATCH NUMBER</th><th> MEDICINE TYPE </th>
    <th>MANUFACTURER</th><th>STOCK QUANTITY</th><th>EXPIRY DATE</th>
    <th>PRICE</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr ><td>"  . $row["drug_name"] . "</td><td>"  . $row["batch_number"] . "</td><td>"  . $row["MedicineType"] . "</td><td>" . $row["Manufacturer"] . "</td><td>".
        $row["stock_quantity"]."</td><td>".$row["expiry_date"]."</td><td>".$row["Price"]."</td></tr>";
    }
echo "</table>";
} else {
    echo "No results found.";
}
echo "</center>";
// Close connection
$conn->close();
?>