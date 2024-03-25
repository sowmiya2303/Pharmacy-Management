
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$invoice_id = $_POST['invno'];
$invoice_date = $_POST['invdate'];
$invoice_number = $_POST['invno'];

$sql = "INSERT INTO invoices ( invoice_date, invoice_id)
VALUES ('$invoice_date', '$invoice_id')";

if (mysqli_query($conn, $sql)) {
    $invoice_id = mysqli_insert_id($conn);
    echo "Invoice created successfully. Invoice ID is: " . $invoice_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>