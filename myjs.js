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
    } else {
        login.style.display = 'flex';
        top.style.display = 'none';
        body.style.display = 'none';
        footer.style.display = 'none';
    }

    // get all form submit buttons
    var forms = document.getElementsByTagName('form');
    for (var i = 0; i < forms.length; i++) {
        forms[i].onsubmit = function (e) {
            var form = e.target;
            if (form.className == 'buytype') {
                e.preventDefault();
                placeOrder(form);
                updateCount();
            }
        }
    }

    updateCount();
}

function placeOrder(form) {
    var orders = document.getElementById('orders');
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            orders.innerHTML = xhr.responseText;
            notif();
            notify(("You added a " + (formData.get('prod_service')) + " subscription to your cart."));
        }
    }
    var formData = new FormData(form);
    formData.append('order', 'placeOrder');
    xhr.open('POST', 'index.php', true);
    xhr.send(formData);
}

function updateCount() {
    var count = document.getElementById('count');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText == 0) {
                count.style.visibility = 'hidden';
            } else {
                count.style.visibility = 'visible';
                count.innerHTML = xhr.responseText;
            }
        }
    }
    xhr.open('POST', 'index.php', true);
    var formData = new FormData();
    formData.append('count', 'true');
    xhr.send(formData);
}

function notify(text) {

    if(document.getElementById("alert")) document.getElementById("alert").remove();
	
	alertdiv = document.getElementsByTagName("body")[0].appendChild(document.createElement("div"));
	alertdiv.id = "alert";

	msg = alertdiv.appendChild(document.createElement("p"));
	msg.innerHTML = text;

}

function notif() {
    var sound = new Audio("media/notif.mp3");
    sound.play();
}