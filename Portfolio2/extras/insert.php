<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Items";

/* Create connection */
$conn = new mysqli($servername, $username, $password, $dbname);
/* Check connection*/
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Attempt insert query execution
$sql = "INSERT INTO Items (ItemName , Price, Quantity) VALUES ('$_POST[ItemName]','$_POST[Price]','$_POST[Quantity]')";

if(mysqli_query($conn, $sql)){
    echo "Records inserted successfully.";
    ?>
    <button onclick="location.href ='/Portfolio2/admin.php'"> Return </button>
    <button onclick="location.href ='/Portfolio2/home.php'"> HomePage </button>
<?php
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
$conn->close();
?>