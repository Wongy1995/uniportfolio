<html>
<h1>Store</h1>
<link rel="stylesheet" href="extras/Style.css" type="text/css">
</html>

<?php
include "extras/Header.php";
include "Basket.php";
?>
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
?>

<br>
<?php
$sql = "select ID, ItemName, Price, Quantity from items";
$result = $conn->query($sql);

session_start();
$_SESSION["cart"] = array();
$_SESSION["cart"]["items"] = array();

if (isset($_POST["itemId"])) {
    basketManager::updateBasketData($_POST["itemId"], "+= 1");
}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<form method='post' action=''>";
        echo "" . $row["ItemName"]; "&nbsp;&nbsp;&nbsp;";
        echo " ". $row["Price"]."&nbsp;&nbsp;&nbsp;";
        echo " ". $row["Quantity"]."&nbsp;&nbsp;&nbsp;";
        echo "<input type='hidden' name='itemId' value='" . $row["ID"] . "'/>";
        echo "<input type='submit' value='ADD TO BASKET'/>";
        echo "</form><br/>";
    }
}
?>