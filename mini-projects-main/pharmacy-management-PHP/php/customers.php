
<?php include 'attach.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM customer";

$result = $conn->query($sql);

    echo "<center>";
if ($result->num_rows > 0) {
echo "<h1>Our customers</h1>";  
echo "<table border= '1px double lightblue'>";
    
    echo "<tr bgcolor='lightblue'><th> SSN </th><th> FIRST NAME</th><th> LAST NAME </th>
    <th>PHONE</th><th>GENDER</th><th>ADDRESS</th>
    <th>DOB</th><th>INSURANCE ID</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr bgcolor='pink' ><td>"  . $row["SSN"] . "</td><td>"  . $row["first_name"] . "</td><td>"  . $row["last_name"] . "</td><td>" . $row["phone"] . "</td><td>".
        $row["gender"]."</td><td>".$row["address"]."</td><td>".$row["date_of_birth"]."</td><td>".$row["insurance_id"]."</td></tr>";
    }
echo "</table>";
} else {
    echo "No results found.";
}
echo "</center>";
// Close connection
$conn->close();
?>
