<html>
<h1>Shopping Cart</h1>
<link rel="stylesheet" href="extras/Style.css" type="text/css">
</html>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<?php
include "Basket.php";
include "extras/Header.php";
?>
<br>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Items";

$conn = new mysqli($servername, $username, $password, $dbname);
/* Check connection*/
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from items";
$data = mysqli_query($conn, $sql);
$cartData = basketmanager::getBasket();
foreach ($cartData as $key => $value)
{
    foreach ($data as $product)
    {
        if ($product["ID"] == $key){
            $basketItem = array("id" => $key, "cartValue" => $value, "name" => $product["ItemName"], "price" => $product["Price"], "quantity" => $product["Quantity"]);
            $basketItem["name"];
        }
    }
}
?>


