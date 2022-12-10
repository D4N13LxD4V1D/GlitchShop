<?php
    $conn = new mysqli("localhost", "root", "");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->query("CREATE DATABASE IF NOT EXISTS GlitchDB");
    $conn->query("CREATE TABLE IF NOT EXISTS GlitchDB.ORDER (
        ID INT(6) UNSIGNED AUTO_INCREMENT,
        USER varchar(30) NOT NULL PRIMARY KEY,
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

            // check if user already has an order of Solo, Duo, or Squad
            if ($prod_service == "Solo" || $prod_service == "Duo" || $prod_service == "Squad") {
                try {
                    $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = 'Solo' OR PROD_SERVICE = 'Duo' OR PROD_SERVICE = 'Squad'");
                    if ($result->num_rows > 0) {
                        // if user already has an order of Solo, Duo, or Squad, remove the old order and add the new order
                        $current_order = $result->fetch_assoc()['PROD_SERVICE'];
                        $conn->query("DELETE FROM GlitchDB.ORDER WHERE USER = '$user' AND PROD_SERVICE = '$current_order'");
                    }
                } catch (Exception $e) {}
            }

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
        <link href="//db.onlinewebfonts.com/c/6dbf0126ffd861046c0120a7bbf66356?family=Utonium" rel="stylesheet"
            type="text/css" />
        <link rel="stylesheet" href="mycss.css" />
    </head>

    <body>
        <div class="top">
            <video id="promo" height="100%" width="100%" autoplay muted loop>
                <source src="media/GlitchMode.mp4" type="video/mp4">
            </video>
        </div>
        <div class="body">
            <div class="navbar">
                <div id="links">
                    <a href="/"><img height="50px" src="media/GlitchMode.png" /></a>
                    <a href="checkout.php"> ABOUT </a>
                    <a href="checkout.php"> SERVICES </a>
                    <a href="checkout.php"> CONTACT INFORMATION </a>
                </div>
                <div id="icons">
                    <a href="/" id="cart">
                        <img height="30px" src="media/checkout.png" />
                        <?php
                            //count indicator of current orders
                            if (isset($_COOKIE['user'])) {
                                $user = $_COOKIE['user'];
                                $result = $conn->query("SELECT SUM(QUANTITY) AS TOTAL FROM GlitchDB.ORDER WHERE USER='$user'");
                                $total = $result->fetch_assoc()['TOTAL'];
                                if ($total > 0) {
                                    echo '<div id = "count">' . $total . '</div>';
                                }
                            }
                        ?>
                    </a>
                    <a href="/"><img height="30px" src="media/user.png" /></a>
                    <?php
                        if (isset($_COOKIE['user'])) {
                            echo '<div id = "nametag"> PLAYER ACCOUNT: <span id = "name">' . $_COOKIE['user'] . '</span></div>';
                        }
                    ?>
                    <div id="slider-menu">
                        <?php
                            if (isset($_COOKIE['user'])) {
                                echo '<form action="index.php" method="post">
                                    <input type="submit" name="logout" value="Logout">
                                    </form>';
                                echo '<div id="myorders">';
                                if (isset($_COOKIE['user'])) {
                                    $user = $_COOKIE['user'];
                                    try {
                                        $result = $conn->query("SELECT * FROM GlitchDB.ORDER WHERE USER='$user'");
                                        if ($result->num_rows == 0) {
                                            throw new Exception("No orders");
                                        }
                                        echo '<h2>My Orders</h2>
                                            <table>
                                                <tr>
                                                    <th>Product/Service</th>
                                                    <th>Quantity</th>
                                                    <th>Edit</th>
                                                </tr>';
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["PROD_SERVICE"] . "</td><td>" . $row["QUANTITY"] . "</td><td>";
                                            echo '<form action="index.php" method="post">
                                                    <input type="hidden" name="prod_service" value="' . $row["PROD_SERVICE"] . '">
                                                    <input type="number" name="quantity" value="1" min="1" max="' . $row["QUANTITY"] . '">
                                                    <input type="submit" name="delete" value="Remove">
                                                </form>';
                                            echo "</td></tr>";
                                        }
                                        echo '</table>
                                            </div>';
                                        // checkout button
                                        echo '<form action="checkout.php" method="post">
                                            <input type="submit" name="checkout" value="Checkout">
                                        </form>';
                                    } catch (Exception $e) {
                                        echo "You have no orders.</div>";
                                    }
                                } else {
                                    echo "You must be logged in to view your orders.</div>";
                                }
                            } else {
                                echo '<form action="index.php" method="post">
                                    <input type="text" name="user" placeholder="Username">
                                    <input type="password" name="pass" placeholder="Password">
                                    <input type="submit" name="login" value="Login">
                                </form>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="shop">
                <h1 id="hero"> Get into the Glitch Mode. </h1>
                <div class="subtypes">
                    <div class="type" id="solo">
                        <div class="descrip">
                            <h1> Solo </h1>
                            <h2> For those who play single-player. </h2>
                            <span class="price"> Php 99.99 / month </span>
                        </div>
                        <div class=details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <form class="buytype" action="index.php" method="post">
                            <input type="hidden" name="prod_service" value="Solo">
                            <input type="hidden" name="quantity" value="1">
                            <input type="submit" name="order" value="Order">
                        </form>
                    </div>
                    <div class="type" id="duo">
                        <div class="descrip">
                            <h1> Duo </h1>
                            <h2> For the P1 and P2 with great synergy. </h2>
                            <span class="price"> Php 179.99 / month </span>
                        </div>
                        <div class=details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <form class="buytype" action="index.php" method="post">
                            <input type="hidden" name="prod_service" value="Duo">
                            <input type="hidden" name="quantity" value="1">
                            <input type="submit" name="order" value="Order">
                        </form>
                    </div>
                    <div class="type" id="squad">
                        <div class="descrip">
                            <h1> Squad </h1>
                            <h2> For the team that games together. </h2>
                            <span class="price"> Php 399.99 / month </span>
                        </div>
                        <div class=details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <form class="buytype" action="index.php" method="post">
                            <input type="hidden" name="prod_service" value="Squad">
                            <input type="hidden" name="quantity" value="1">
                            <input type="submit" name="order" value="Order">
                        </form>
                    </div>
                </div>
                <div id="feature">
                    <div id="fpic"></div>
                    <div id="fdescrip">
                        <span> Featured Promo <span> Avail a subscription and get free NCT DREAM merchandise.
                            </span></span>
                        <input type="submit" name="order" value="Subscribe Now">
                    </div>
                </div>
                <div class="merches">
                    <div class="merch" id="mark">
                        <div id="memname"> PLAYER MARK </div>
                        <img id="mempic" src="media/mark.jpg" />
                    </div>
                    <div class="merch" id="renjun">
                        <div id="memname"> PLAYER RENJUN </div>
                        <img id="mempic" src="media/renjun.jpg" />
                    </div>
                    <div class="merch" id="jeno">
                        <div id="memname"> PLAYER JENO </div>
                        <img id="mempic" src="media/jeno.jpg" />
                    </div>
                    <div class="merch" id="haechan">
                        <div id="memname"> PLAYER HAECHAN </div>
                        <img id="mempic" src="media/haechan.jpg" />
                    </div>
                    <div class="merch" id="chenle">
                        <div id="memname"> PLAYER CHENLE </div>
                        <img id="mempic" src="media/chenle.jpg" />
                    </div>
                    <div class="merch" id="jaemin">
                        <div id="memname"> PLAYER JAEMIN </div>
                        <img id="mempic" src="media/jaemin.jpg" />
                    </div>
                    <div class="merch" id="jisung">
                        <div id="memname"> PLAYER JISUNG </div>
                        <img id="mempic" src="media/jisung.jpg" />
                    </div>
                </div>
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
                </div>
                <div id="enterp">
                    <div id="epic"></div>
                    <div id="edescrip">
                        <span> Enterprise </span>
                        <p> Building a gaming company? Let's co-op that! </p>
                        <input type="submit" name="order" value="Send E-mail">
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>