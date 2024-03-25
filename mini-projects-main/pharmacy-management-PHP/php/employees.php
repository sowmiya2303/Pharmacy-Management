
<?php include 'attach.html';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ownpharm";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM employee";

$result = $conn->query($sql);

    echo "<center>";
if ($result->num_rows > 0) {
echo "<h1>Hired employees</h1>";  
echo "<table border= '1px double lightblue'>";
    
    echo "<tr bgcolor='lightblue'><th>ID</th><th> SSN </th><th> FIRST NAME</th><th> LAST NAME </th>
    <th>START DATE</th><th>END DATE</th><th>ROLE</th><th>SALARY</th>
    <th>PHONE</th><th>DOB</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr bgcolor='pink' ><td>" . $row["ID"] . "</td><td>" . $row["SSN"] . "</td><td>"  . $row["first_name"] . "</td><td>"  . $row["last_name"] . "</td><td>" . $row["start_date"] . "</td><td>".
        $row["end_date"]."</td><td>".$row["role"]."</td><td>". $row["salary"] . "</td><td>".$row["phone_number"]."</td><td>".$row["date_of_birth"]."</td></tr>";
    }
echo "</table>";
} else {
    echo "No results found.";
}
echo "</center>";
// Close connection
$conn->close();
?>
