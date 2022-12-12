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
    console.log(forms);
    for (var i = 0; i < forms.length; i++) {
        console.log(forms[i].class);
        forms[i].onsubmit = function (e) {
            var form = e.target;
            if (form.class == 'buytype') {
                e.preventDefault();
                placeOrder(form);
            }
        }
    }
}

function placeOrder(form) {
    var orders = document.getElementById('orders');
    console.log("HII");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("got response");
            orders.innerHTML = xhr.responseText;
        }
    }
    var url = 'index.php?user="' + document.cookie.split('=')[1].split(';')[0] + '"&prod_service="' + form.prod_service.value + '"&quantity=' + form.quantity.value + '&order=1';
    console.log(url);
    xhr.open('POST', url, true);
    xhr.send();
}

function updateCount() {
    var count = document.getElementById('count');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            count.innerHTML = xhr.responseText;
        }
    }
    xhr.open('POST', 'index.php?', true);
    xhr.send();
}