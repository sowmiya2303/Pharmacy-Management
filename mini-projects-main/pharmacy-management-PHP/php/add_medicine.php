	
<?php include 'attach.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$dn = $_POST["dn"];
$bn = $_POST["bn"];
$mt = $_POST["mt"];
$mf = $_POST["mf"];
$sq = $_POST["sq"];
$ed = $_POST["ed"];
$price = $_POST["price"];

// Prepare the SQL statement
$sql = "INSERT INTO `medicine` (`drug_name`, `batch_number`, `MedicineType`, `Manufacturer`, `stock_quantity`, `expiry_date`, `Price`) 
VALUES ('$dn', '$bn', '$mt','$mf','$sq','$ed','$price');";

// Execute the SQL statement and check for errors


$sql = "SELECT * FROM medicine";

$result = $conn->query($sql);

    echo "<center>";
if ($result->num_rows > 0) {
echo "<h1>Medicines available after inserting</h1>";  
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