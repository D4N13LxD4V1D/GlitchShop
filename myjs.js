window.onload = function () {
    var login = document.getElementById('login');
    var top = document.getElementsByClassName('top')[0];
    var body = document.getElementsByClassName('body')[0];
    var footer = document.getElementById('footer');

    // check if the user cookie is set
    if (document.cookie.indexOf('user=') != -1) {
        login.style.display = 'none';

        top.style.display = 'block';
        body.style.display = 'block';
        footer.style.display = 'grid';
        showCurrentOrders();
    } else {
        login.style.display = 'flex';

        top.style.display = 'none';
        body.style.display = 'none';
        footer.style.display = 'none';
    }
}

function showCurrentOrders() {
    var orders = document.getElementById('orders');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            orders.innerHTML = xhr.responseText;

            updateCount();
            updateButtons();
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
    xhr.open('POST', 'order.php', true);
    xhr.send(formData);
}

function removeOrder(form) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            notify(("You removed a " + (formData.get('prod_service')) + " subscription from your cart."));

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
    var chkt = document.getElementById('checkout');
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

    var sound = new Audio("media/notif.mp3");
    sound.play();
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
}

function showCheckout() {
    checkoutmodal = document.getElementsByTagName("body")[0].appendChild(document.createElement("div"));
    checkoutmodal.id = "checkout-modal";
    checkoutmodal.onclick = function () {
        checkoutmodal.remove();
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
    var navHeight = nav.scrollHeight;

    // get element position
    var element = document.getElementById(id);
    var elementPosition = element.offsetTop;

    if (id == 'shop') {
        elementPosition -= navHeight - 10;
    }

    // scroll to element
    window.scrollTo({
        top: elementPosition - navHeight,
        behavior: "smooth"
    });
}