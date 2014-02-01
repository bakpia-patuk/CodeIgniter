window.onload=initialize;
var map;
function initialize() {
	alert('fddhjdch');
  var mapOptions = {
    zoom: 20,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

}

//google.maps.event.addDomListener(window, 'load', initialize);