<?php
if (isset($_POST['login'])) {
    setcookie("user", $_POST['user'], time() + 3600, "/");
    header("Refresh:0");
}

if (isset($_POST['logout'])) {
    unset($_COOKIE['user']);
    setcookie("user", "", -1, "/");
    header("Refresh:0");
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
        <link rel="stylesheet" href="mycss.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div id="login">
            <img height="100px" src="media/GIitchMode.png" />
            <span> ENTER YOUR PLAYER NAME </span>
            <form method="POST" action="index.php">
                <input type="text" name="user" placeholder="NAME" oninput="this.value = this.value.toUpperCase()">
                <input type="submit" name="login" value="LOG-IN">
            </form>
            <span id="creds">
                All images used in this Machine Project belong to SM Entertainment. <br />
                No copyright infringement is intended.
            </span>
        </div>
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
                    <a href="checkout.php"> PRODUCTS </a>
                    <a href="checkout.php"> CONTACT INFORMATION </a>
                </div>
                <div id="icons">
                    <a href="/" id="cart">
                        <img height="30px" src="media/checkout.png" />
                        <div id="count"></div>
                    </a>
                    <?php
                        if (isset($_COOKIE['user'])) {
                            echo '<div id = "nametag"> PLAYER ACCOUNT: <span id = "name">' . $_COOKIE['user'] . '</span></div>';
                        }
                    ?>
                    <div id="slider-menu">
                        <div id="slider-head">Account Settings</div>
                        <div id="orders"></div>
                        <form class="logoutform" action="index.php" method="post">
                            <input id="checkout" type="submit" name="checkout" value="CHECK-OUT">';
                            <input id="logout" type="submit" name="logout" value="LOG-OUT">
                        </form>
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
                </div>
                <div id="feature">
                    <div id="fpic"></div>
                    <div id="fdescrip">
                        <span> Featured Artist <span> NCT DREAM Glitch Mode items available for purchase.
                            </span></span>
                        <input type="submit" name="order" value="Buy Now">
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
                <div class="items">
                    <div id="itemhead">
                        Choose additional items to include in your package:
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/album-1.jpg" />
                            <span>
                                <h2> NCT DREAM Glitch Mode Album </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/photobook-1.jpg" />
                            <span>
                                <h2> NCT DREAM Glitch Mode Photobook </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/album-1.jpg" />
                            <span>
                                <h2> NCT DREAM Glitch Mode Album </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/a4-1.jpg" />
                            <span>
                                <h2> NCT DREAM Glitch Mode A4 Poster </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/film-1.jpg" />
                            <span>
                                <h2> NCT DREAM Film Photo v1 </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/film-2.jpg" />
                            <span>
                                <h2> NCT DREAM Film Photo v2 </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/poca-1.jpg" />
                            <span>
                                <h2> NCT DREAM Photocard </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/jacket-1.jpg" />
                            <span>
                                <h2> NCT DREAM Jacket </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div class="item">
                        <span class="itemprev">
                            <img src="media/items/lace-1.jpg" />
                            <span>
                                <h2> NCT DREAM ID Lace </h2>
                                <span> Description </span>
                            </span>
                        </span>
                        <div class="qtycont">
                            <input type="button" class="dec" value="-">
                            <input type="text" name="quantity" min="1" max="9" value="0">
                            <input type="button" class="inc" value="+">
                        </div>
                    </div>
                    <div id="itemfoot"></div>
                </div>
            </div>
            <input type="submit" id="proceed" name="order" value="Proceed to Checkout">
        </div>
        <div id="footer">
            <img height="200px" src="media/GlitchMode-3.png" />
            <div id="links2">
                <h2> NAVIGATE </h2>
                <hr />
                <a href="checkout.php"> ABOUT </a>
                <a href="checkout.php"> PRODUCTS </a>
                <a href="checkout.php"> CONTACT INFORMATION </a>
            </div>
            <div id="shopinfo">
                <h1> Glitch Mode </h1>
                <h2> Game and Music Store </h2>
                <span> Address: Gov. Pack Road, Baguio City, Benguet 2600 </span>
                <span> Customer Service E-Mail: customerservice@glitchmode.com </span>
            </div>
        </div>
    </body>

</html>