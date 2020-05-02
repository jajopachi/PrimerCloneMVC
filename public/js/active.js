url = window.location.href;

var pattern = /https?:\/\//;
var result = url.replace(pattern, "");
var host = result.split("/", 2)[0];

var certificate = url.match(/https?/)[0];
var main = certificate + "://" + host + "/";

switch (url) {
    case main:
        getElem("li.home").className += " active";
        break;
    case main + "login":
        getElem("li.login").className += " active";
        break;
    case main + "register":
        getElem("li.register").className += " active";
        break;
    case main + "catalog":
        getElem("li.catalog").className += " active";
        break;
    case main + "services/feedback":
        getElem("li.feedback").className += " active";
        break;
    case main + "services/advertise":
        getElem("li.advertise").className += " active";
        break;
    case main + "services/privacypolicy":
        getElem("li.privacy-policy").className += " active";
        break;
    case main + "cabinet":
        getElem("li.cabinet").className += " active";
        break;
}

function getElem(elem)
{
    return document.querySelector(elem);
}

document.querySelector("body").addEventListener("load", (event) => {
    startTime();
});

function startTime()
{
    var timeObj = new Date();
    var hours = timeObj.getHours();
    var minutes = timeObj.getMinutes();
    var seconds = timeObj.getSeconds();
    minutes = checkTime(minutes);
    seconds = checkTime(seconds);
    document.getElementById('curr-time').innerHTML = hours + ":" + minutes + ":" + seconds;
    time = setTimeout('startTime()',500);
}
function checkTime(i)
{
    if (i < 10) {
        i="0" + i;
    }
    return i;
}