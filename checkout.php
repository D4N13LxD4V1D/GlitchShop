<?php

echo '<div>';
try {
    $user = $_COOKIE['user'];
    $conn = new mysqli("localhost", "root", "");
    $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
    if ($result->num_rows == 0) {
        throw new Exception("No orders");
    }
    echo '<h2>MY ORDERS</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["PROD_SERVICE"] . "</td><td>" . $row["QUANTITY"] . "</td></tr>";
    }
    echo '</table>';
    echo '<p>Close this window to edit or continue shopping.</p>';
} catch (Exception $e) {
    echo "You have no orders.";
}
echo '</div>';

echo '
<div class="methods">
    <div id="methodhead">
        Choose a billing method below:
    </div>
    <div class="method">
        <span>
            <h1> Monthly </h1>
            <span> Description </span>
        </span>
        <input type="submit" name="order" value="Select">
    </div>
    <div class="method">
        <span>
            <h1> Yearly </h1>
            <span> Description </span>
        </span>
        <input type="submit" name="order" value="Select">
    </div>
    <div class="method">
        <span>
            <h1> One-time </h1>
            <span> Description </span>
        </span>
        <input type="submit" name="order" value="Select">
    </div>
    <div id="methodfoot"> </div>
</div>';