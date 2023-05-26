window.onload = function() {
    // ambilLokasi()
    // fetch("http://api.weatherapi.com/v1/current.json?key=b8e4bc8805bb48ce8f0213712221302&q=")
    // .then(res => res.json())
    // .then(res => console.log(res));
    navigator.geolocation.getCurrentPosition(function(Postion) {
        let lat = Postion.coords.latitude;
        let long = Postion.coords.longitude;
        console.log(lat)
        console.log(long)
    });
}

document.addEventListener('click', function() {
});
