/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function myMap() {

    var myLatLng = {lat: 50.0928392, lng: 19.9244297};
    var mapOptions = {
        zoom: 15,
        center: myLatLng
    }

    var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

    var contentString = '<div id="content">' +
            '<h3>PrestaPros</h3>' +
            '<p>' +
            '30-067 Kraków ul. Piastowska 44/4<br>' +
            'tel. (+48)574 887 340<br>' +
            '</p>' +
            '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
//        icon: '/img/marker.png',
//        title: 'Hello World!'
    });

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });

    marker.setMap(map);
}

