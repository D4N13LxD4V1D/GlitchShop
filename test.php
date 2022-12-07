<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <title> Glitch </title>

        <link rel = "stylesheet" type = "text/css" href = "//db.onlinewebfonts.com/c/6dbf0126ffd861046c0120a7bbf66356?family=Utonium"/>
        <link rel = "stylesheet" href = "mycss.css" />
        <script src = "myjs.js"></script>
    </head>
    <body>
        <div class = "top">
            <video id = "promo" height = "100%" width = "100%" autoplay muted loop >
                <source src = "media/GlitchMode.mp4" type = "video/mp4">
            </video>
        </div>
        <div class = "body">
            <div class = "navbar">
                <div id = "links">
                    <a href = "/"><img height = "50px" src = "media/GlitchMode.png" /></a>
                    <a href = "checkout.php"> ABOUT </a>
                    <a href = "checkout.php"> SERVICES </a>
                    <a href = "checkout.php"> CONTACT INFORMATION </a>
                </div>
                <div id = "icons">
                    <a href = "/"><img height = "30px" src = "media/checkout.png" /></a>
                    <a href = "/"><img height = "30px" src = "media/user.png" /></a>
                    <div id = "nametag"> PLAYER ACCOUNT: <span id = "name">Fragrant</span></div>
                </div>
            </div>
            <div class = "shop">
                <h1 id = "hero"> Get into the Glitch Mode. <h1/>
                <div class = "subtypes">
                    <div class = "type" id = "solo">
                        <div class = "descrip">
                            <h1> Solo </h1>
                            <h2> For those who play single-player. </h2>
                            <span class = "price"> Php 99.99 / month </span>
                        </div>
                        <div class = details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <div class = "buytype">
                            <input type = "submit" name = "order" value = "Order">
                        </div>
                    </div>
                    <div class = "type" id = "duo">
                        <div class = "descrip">
                            <h1> Duo </h1>
                            <h2> For the P1 and P2 with great synergy. </h2>
                            <span class = "price"> Php 179.99 / month </span>
                        </div>
                        <div class = details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <div class = "buytype">
                            <input type = "submit" name = "order" value = "Order">
                        </div>
                    </div>
                    <div class = "type" id = "squad">
                        <div class = "descrip">
                            <h1> Squad </h1>
                            <h2> For the team that games together. </h2>
                            <span class = "price"> Php 399.99 / month </span>
                        </div>
                        <div class = details>
                            <ul>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                                <li> Detail #1 </li>
                            </ul>
                        </div>
                        <div class = "buytype">
                            <input type = "submit" name = "order" value = "Order">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id = "empty">
        </div>
    </body>
</html>