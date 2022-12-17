<?php

echo '<div id="orders_check">';
try {
    $user = $_COOKIE['user'];
    $num = 0;
    $conn = new mysqli("localhost", "root", "");
    $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
    if ($result->num_rows == 0) {
        throw new Exception("No orders");
    }
    echo '<h2 id="receipthead">MY ORDERS</h2>
        <table id = "receipt">
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Quantity</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        $num++;
        echo "<tr><td>" . $num . "</td><td id = 'receiptline'>" . $row["PROD_SERVICE"] . "</td><td>" . $row["QUANTITY"] . "</td></tr>";
    }
    
    echo '</table>';
    echo '<p>Close this window to edit or continue shopping.</p>';
} catch (Exception $e) {
    echo "You have no orders.";
}
echo '</div>';