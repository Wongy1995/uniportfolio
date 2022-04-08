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

/* sql to create table */
$sql = "CREATE TABLE Items
(
ID int NOT NULL AUTO_INCREMENT,
ItemName varchar(30),
Price DECIMAL(5,2),
PRIMARY KEY (ID),
UNIQUE (ItemName)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
}
else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>