<?php
$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS GlitchDB");
$conn->query("CREATE TABLE IF NOT EXISTS GlitchDB.ORDER (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  USER varchar(30) NOT NULL,
  PROD_SERVICE varchar(255) NOT NULL,
  QUANTITY int
  )");

if (isset($_POST['login'])) {
  setcookie("user", $_POST['user'], time() + 3600);
  header("Location: /");
}

if (isset($_POST['logout'])) {
  setcookie("user", "", time() - 3600);
  unset($_COOKIE['user']);
  header("Location: /");
}

if (isset($_POST['order'])) {
  if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
    $prod_service = $_POST['prod_service'];
    $quantity = $_POST['quantity'];
    $conn->query("INSERT INTO GlitchDB.ORDER (USER, PROD_SERVICE, QUANTITY) VALUES ('$user', '$prod_service', '$quantity')");
    header("Location: /");
  } else {
    echo "You must be logged in to order.";
    header("Location: /");
  }
}

if (isset($_POST['delete'], $_POST['quantity'])) {
  $user = $_COOKIE['user'];
  $prod_service = $_POST['prod_service'];
  $quantity = $_POST['quantity'];
  $current_quantity = $conn->query("SELECT QUANTITY FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = '$prod_service'")->fetch_assoc()['QUANTITY'];
  if ($current_quantity - $quantity > 0) {
    $conn->query("UPDATE GlitchDB.ORDER SET QUANTITY = QUANTITY - '$quantity' WHERE USER = '$user' AND PROD_SERVICE = '$prod_service'");
  } else {
    $conn->query("DELETE FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = '$prod_service' AND QUANTITY = '$current_quantity'");
  }
  header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glitch Gameshop</title>

    <script src="myjs.js"></script>
    <link href="//db.onlinewebfonts.com/c/6dbf0126ffd861046c0120a7bbf66356?family=Utonium" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="mycss.css" />
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <a href="/">HOME</a>
        <a href="/"><div class="logo"><h1>GLITCH</h1><h2>GAME SHOP</h2></div></a>
        <a href="checkout.php">CHECKOUT</a>
    </div>
    
    <!-- login -->
    <form action="index.php" method="post">
        <label for="user">Username:</label>
        <input type="text" name="user" id="user">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="login" value="Login">
    </form>

    <!-- logout current user -->
    <form action="index.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>

    <!-- post an order for the current user -->
    <h2>Create Order</h2>
    <form action="index.php" method="post">
        <label for="prod_service">Product/Service:</label>
        <input type="text" name="prod_service" id="prod_service">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity">
        <input type="submit" name="order" value="Order">
    </form>

    <!-- overall orders -->
    <div id="orders">
        <h2>Orders</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Product/Service</th>
                <th>Quantity</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM GlitchDB.ORDER");
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['USER'] . "</td><td>" . $row['PROD_SERVICE'] . "</td><td>" . $row['QUANTITY'] . "</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- orders of current user -->
    <div id="myorders">
        <h2>My Orders</h2>
        <table>
            <tr>
                <th>Product/Service</th>
                <th>Quantity</th>
            </tr>
            <?php
            if (isset($_COOKIE['user'])) {
              $user = $_COOKIE['user'];
              $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['PROD_SERVICE'] . "</td><td>" . $row['QUANTITY'] . "</td></tr>";
                }
            } else {
                echo "You must be logged in to view your orders.";
            }
            ?>
        </table>
    </div>

    <!-- order counts -->
    <div id="ordercounts">
        <h2>Order Counts</h2>
        <table>
            <tr>
                <th>Product/Service</th>
                <th>Quantity</th>
            </tr>
            <?php
            $result = $conn->query("SELECT PROD_SERVICE, SUM(QUANTITY) AS QUANTITY FROM GlitchDB.ORDER GROUP BY PROD_SERVICE");
            while ($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['PROD_SERVICE'] . "</td><td>" . $row['QUANTITY'] . "</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- delete orders -->
    <div id="deleteorders">
        <h2>Delete Orders</h2>
        <form action="index.php" method="post">
            <label for="prod_service">Product/Service:</label>
            <input type="text" name="prod_service" id="prod_service">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity">
            <input type="submit" name="delete" value="Delete">
        </form>
    </div>
</body>
</html>