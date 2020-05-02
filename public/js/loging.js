var errorBlock = document.getElementById("error-block");
function logIn()
{
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var remember = document.getElementById("rememberMe").checked ? 1 : 0;

    if(login.length === 0){
        window.errorBlock.innerHTML = "Поле 'Логин' - пустое! Заполните его чтобы продолжить!";
    }else if(password.length < 6){
        if(password.length === 0){
            window.errorBlock.innerHTML = "Поле 'Пароль' - пустое! Заполните его чтобы продолжить!";
        }else{
            window.errorBlock.innerHTML = "Пароль должен быть не меньше 8 символов!";
        }
    }else{
        window.errorBlock.innerHTML = "";
        loginAJAX(login, password, remember);
    }
    return false;
}

function loginAJAX(login, password, remember)
{
    var xhr = new XMLHttpRequest();
    var method = "POST";
    var url = "/login/login";
    var data = "login="+ encodeURI(login)+"&password="+ password + "&remember="+ remember;
    var res = "";

    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState !== 4) return;
        if (xhr.status !== 200) {
            alert("ERROR!\n"+xhr.status + " => " + xhr.statusText);
        } else {
            res = xhr.responseText;
            getResponse(res);
        }
    };
    xhr.send(data);
}

function getResponse(data)
{
    if(data){
        if(data === "success") {
            window.location = "/cabinet";
        }
        window.errorBlock.innerHTML = data;
    }
}