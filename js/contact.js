var map;
map = new GMaps({
    el: '#map',
    lat: 12.9131013,  // Latitude for Bangalore location
    lng: 77.6324936,  // Longitude for Bangalore location
    scrollwheel: false
});

map.addMarker({
    lat: 12.9131013,  // Latitude for Bangalore marker
    lng: 77.6324936,  // Longitude for Bangalore marker
    title: 'Marker with InfoWindow',
    infoWindow: {
        content: '<p>Uniquebuildss Construction & Interiors Company,<br>Bangalore, India</p>'
    }
});
