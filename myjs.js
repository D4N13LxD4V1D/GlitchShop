var music = new Audio("media/sound/Glitch Mode.mp3",);
var vol = 0.2;

window.onload = function () {
    PowerGlitch.glitch('.glitch');
    PowerGlitch.glitch('.glitch-hover', { playMode: 'hover' });
    var login = document.getElementById('login');
    var about = document.getElementById('about');
    var musicplayer = document.getElementById('music');
    var top = document.getElementsByClassName('top')[0];
    var body = document.getElementsByClassName('body')[0];
    var footer = document.getElementById('footer');

    about.style.display = 'none';

    // check if the user cookie is set
    if (document.cookie.indexOf('user=') != -1) {
        login.style.display = 'none';
        top.style.display = 'block';
        body.style.display = 'block';
        footer.style.display = 'grid';
        musicplayer.style.display = 'fixed';
        music.volume = vol;
        try {
            music.play()
            musicplayer.onmouseenter = function () {
                expand(musicplayer);
            };
        } catch (err) {
            console.log(err);
        }

        showCurrentOrders();
        autoscroll();
    } else {
        login.style.display = 'flex';
        top.style.display = 'none';
        body.style.display = 'none';
        footer.style.display = 'none';
        musicplayer.style.display = 'none';
    }

    // merches
    var merches = document.getElementsByClassName('merch');
    showMerches('all');
    for (var i = 0; i < merches.length; i++) {
        merches[i].addEventListener('click', function () {
            var merchName = this.id;
            // check if the merch is already active
            if (this.classList.contains('merch-active')) {
                this.classList.remove('merch-active');
                merchName = 'all';
            } else {
                // remove the active class from all merchs
                for (var j = 0; j < merches.length; j++) {
                    merches[j].classList.remove('merch-active');
                }

                // add the active class to the clicked merch
                this.classList.add('merch-active');
            }

            showMerches(merchName);
        });
    }

}

function autoscroll() {
    setTimeout(function () {
        scrollToElementByID('shop');
    }, 1000);
}

function showMerches(merchName) {
    var items = document.getElementsByClassName('items')[0];
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            items.innerHTML = xhr.responseText;
            updateButtons();
        }
    }
    xhr.open('POST', 'merch.php', true);
    var formData = new FormData();
    formData.append('action', 'getMerchItems');
    formData.append('item', merchName);
    xhr.send(formData);
}

function showCurrentOrders() {
    var orders = document.getElementById('orders');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            orders.innerHTML = xhr.responseText;
            updateCount();
            updateButtons();
            showMerches(document.getElementsByClassName('merch-active')[0] ? document.getElementsByClassName('merch-active')[0].id : 'all');
        }
    }
    xhr.open('POST', 'order.php', true);
    var formData = new FormData();
    formData.append('action', 'getCurrentOrders');
    xhr.send(formData);
}

function placeOrder(form) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            notify(("You added a " + (formData.get('prod_service')) + " subscription to your cart."));
            showCurrentOrders();
        }
    }
    var formData = new FormData(form);
    formData.append('action', 'placeOrder');
    if (formData.get('quantity') > 0) {
        xhr.open('POST', 'order.php', true);
        xhr.send(formData);
    } else {
        removeOrder(form);
    }
}

function removeOrder(form) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText != '0') {
                notify(("You removed a " + (formData.get('prod_service')) + " subscription from your cart."));
            }

            showCurrentOrders();
        }
    }
    var formData = new FormData(form);
    formData.append('action', 'deleteOrder');
    xhr.open('POST', 'order.php', true);
    xhr.send(formData);
}

function updateCount() {
    var count = document.getElementById('count');
    var chkt = document.getElementsByClassName('checkout')[0];
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText == 0) {
                count.style.visibility = 'hidden';
                chkt.style.display = 'none';
            } else {
                count.style.visibility = 'visible';
                chkt.style.display = 'block';
                count.innerHTML = xhr.responseText;
            }
        }
    }
    xhr.open('POST', 'order.php', true);
    var formData = new FormData();
    formData.append('action', 'getOrderCount');
    xhr.send(formData);
}

function notify(text) {

    if (document.getElementById("alert")) document.getElementById("alert").remove();

    alertdiv = document.getElementsByTagName("body")[0].appendChild(document.createElement("div"));
    alertdiv.id = "alert";

    msg = alertdiv.appendChild(document.createElement("p"));
    msg.innerHTML = text;

    var sound = new Audio("media/sound/notif.mp3");
    sound.play();
}

function expand(x) {
    music.play();
    x.innerHTML = "<input type='range' id='volume' name='vol' min='0' max='100' value='" + vol * 100 + "' />";
    x.style.width = '200px';
    document.getElementById('volume').style.width = '80%';

    let volume = document.querySelector("#volume");

    volume.addEventListener("input", function (e) {
        music.volume = e.currentTarget.value / 100;
        vol = e.currentTarget.value / 100;
    });

    x.onmouseenter = function () {
        expand(x);
    };
}

function collapse(x) {
    document.getElementById('volume').style.width = '0';
    x.innerHTML = '<img class="glitch" height="50px" src="media/GIitchMode.png" />';
    x.style.width = '100px';
}

function updateButtons() {
    var forms = document.getElementsByTagName('form');
    for (var i = 0; i < forms.length; i++) {
        forms[i].onsubmit = function (e) {
            var form = e.target;
            if (form.className == 'buytype') {
                e.preventDefault();
                placeOrder(form);
            } else if (form.className == "remove") {
                e.preventDefault();
                removeOrder(form);
            } else if (form.className == "checkout") {
                e.preventDefault();
                showCheckout();
            }
        }
    }

    var inc = document.getElementsByClassName('inc');
    for (var i = 0; i < inc.length; i++) {
        inc[i].onclick = function (e) {
            var form = this.parentNode.parentNode;
            this.parentNode.querySelector('input[type=number]').stepUp();
            placeOrder(form);
            showMerches(document.getElementsByClassName('merch-active')[0] ? document.getElementsByClassName('merch-active')[0].id : 'all');
        }
    }

    var dec = document.getElementsByClassName('dec');
    for (var i = 0; i < dec.length; i++) {
        dec[i].onclick = function (e) {
            var form = this.parentNode.parentNode;
            this.parentNode.querySelector('input[type=number]').stepDown();
            placeOrder(form);
            showMerches(document.getElementsByClassName('merch-active')[0] ? document.getElementsByClassName('merch-active')[0].id : 'all');
        }
    }
}

function showCheckout() {
    if (document.getElementById('checkout-modal')) { return; }

    checkoutmodal = document.getElementsByTagName("body")[0].appendChild(document.createElement("div"));
    checkoutmodal.id = "checkout-modal";
    checkoutmodal.onclick = function (e) {
        if (e.target == checkoutmodal) {
            checkoutmodal.remove();
        }
    }

    checkout = checkoutmodal.appendChild(document.createElement("div"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            checkout.innerHTML = xhr.responseText;
        }
    }
    xhr.open('POST', 'checkout.php', true);
    xhr.send();
}

function scrollToElementByID(id) {
    // get nav bar height
    var nav = document.getElementsByClassName('navbar')[0];
    var about = document.getElementById('about');
    var top = document.getElementsByClassName('top')[0];
    var navHeight = nav.scrollHeight;

    // get element position
    var element = document.getElementById(id);
    var elementPosition = element.offsetTop;

    if (id == 'about') {
        about.style.display = 'flex';
        top.style.display = 'none';
    }

    // scroll to element
    window.scrollTo({
        top: elementPosition - navHeight,
        behavior: "smooth"
    });
}

function disappear() {
    var about = document.getElementById('about');
    var top = document.getElementsByClassName('top')[0];
    scrollToElementByID('shop');

    setTimeout(function () {
        about.style.display = 'none';
        top.style.display = 'block';
    }, 1000);
}

window.onscroll = function () {
    var scroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (scroll / height) * 100;
    // console.log(document.styleSheets[0].cssRules);
    document.styleSheets[0].cssRules[28].style.width = scrolled + "%";
}