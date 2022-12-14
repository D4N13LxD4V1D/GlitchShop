<?php
$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['order'])) {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $prod_service = $_POST['prod_service'];
            $quantity = $_POST['quantity'];

            // check if user already has an order of Solo, Duo, or Squad
            if ($prod_service == "Solo" || $prod_service == "Duo" || $prod_service == "Squad") {
                try {
                    $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = 'Solo' OR PROD_SERVICE = 'Duo' OR PROD_SERVICE = 'Squad'");
                    if ($result->num_rows > 0) {
                        // if user already has an order of Solo, Duo, or Squad, remove the old order
                        $conn->query("DELETE FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = 'Solo' OR PROD_SERVICE = 'Duo' OR PROD_SERVICE = 'Squad'");
                    }
                } catch (Exception $e) {}
            }

            // add new order
            $conn->query("INSERT INTO GlitchDB.ORDER (USER, PROD_SERVICE, QUANTITY) VALUES ('$user', '$prod_service', '$quantity')");
            
            try {
                $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
                if ($result->num_rows == 0) {
                    throw new Exception("No orders");
                }
                echo '<h2>MY ORDERS</h2>
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Qty.</th>
                            <th></th>
                        </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["PROD_SERVICE"] . "</td><td>" . $row["QUANTITY"] . "</td><td>";
                    echo '<form class="remove" action="order.php" method="post">
                            <input type="hidden" name="prod_service" value="' . $row["PROD_SERVICE"] . '">
                            <input type="hidden" name="quantity" value="1" min="1" max="' . $row["QUANTITY"] . '">
                            <input id="delete" type="submit" name="delete" value="🗑️">
                        </form>';
                    echo "</td></tr>";
                }
                echo '</table>';
            } catch (Exception $e) {
                echo "You have no orders.";
            }
        }
    }

    if (isset($_POST['delete'])) {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $prod_service = $_POST['prod_service'];
            $quantity = $_POST['quantity'];
            $current_quantity = $conn->query("SELECT QUANTITY FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = '$prod_service'")->fetch_assoc()['QUANTITY'];
            if ($current_quantity - $quantity > 0) {
                $conn->query("UPDATE GlitchDB.ORDER SET QUANTITY = QUANTITY - '$quantity' WHERE USER = '$user' AND PROD_SERVICE = '$prod_service'");
            } else {
                $conn->query("DELETE FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = '$prod_service' AND QUANTITY = '$current_quantity'");
            }

            try {
                $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
                if ($result->num_rows == 0) {
                    throw new Exception("No orders");
                }
                echo '<h2>MY ORDERS</h2>
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Qty.</th>
                            <th></th>
                        </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["PROD_SERVICE"] . "</td><td>" . $row["QUANTITY"] . "</td><td>";
                    echo '<form class="remove" action="order.php" method="post">
                            <input type="hidden" name="prod_service" value="' . $row["PROD_SERVICE"] . '">
                            <input type="hidden" name="quantity" value="1" min="1" max="' . $row["QUANTITY"] . '">
                            <input id="delete" type="submit" name="delete" value="🗑️">
                        </form>';
                    echo "</td></tr>";
                }
                echo '</table>';
            } catch (Exception $e) {
                echo "You have no orders.";
            }
        } else {
            header("Refresh:0");
        }
    }

    if (isset($_POST['count'])) {
        $user = $_COOKIE['user'];
        $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
        echo $result->num_rows;
    }
}