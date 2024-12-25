function initMap() {
    const location = { lat: -7.28590554420084, lng: 112.77555691526169 }; 
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10, 
        center: location,
    });
    new google.maps.Marker({
        position: location,
        map: map,
    });
}

window.onload = initMap;