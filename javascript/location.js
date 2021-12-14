var x = document.getElementById("demo");
var y = document.getElementById("longitude");

function getLocation() {
    getLongitude();
    getLatitude();
}

function getLatitude() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionla);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPositionla(position) {
    x = position.coords.latitude;
}




function getLongitude() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionlo);
    } else {
        y.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPositionlo(position) {
    y.innerHTML = position.coords.longitude;
}