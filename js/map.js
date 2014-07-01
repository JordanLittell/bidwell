
//GOOGLE MAPS INITIALIZATION/CONFIGURATION========================================
//================================================================================

//initialize variables map, myLatLn, directionsService and directionsDisplay
var map;
var myLatLn = new google.maps.LatLng(39.755976,-121.847113);
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;

function initialize() {
  var mapOptions = {
    zoom: 6
    
  };
  //create new google maps directions display and myLatLn objects
	directionsDisplay = new google.maps.DirectionsRenderer();
	myLatLn = new google.maps.LatLng(39.755976,-121.847113);
  
	map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  	//set map and display to render on map-canvas and directionsPanel divs
  	directionsDisplay.setMap(map);
  	directionsDisplay.setPanel(document.getElementById("directionsPanel"))
  	
  	//create info window located at point of destination
  	var infowindow = new google.maps.InfoWindow({
        map: map,
        position: myLatLn,
        content: 'Destination'
      });

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    $("#error1").hide();
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
  //set info window at the initial point (the user's location)
      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'You Are Here'
      });
  //set the center of the map to the current position of the user
      map.setCenter(pos);
    }, 
    function() {
    //Browser supports Geolocation
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'We Are here';
    $("#error1").show();
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: myLatLn,
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}


function calcRoute() {
//function that gets directions between two points on the map 
//uses HTML5 Geolocation
//creates routes assuming that the user is driving 
  
  navigator.geolocation.getCurrentPosition(function(position) {
  	//create coordinates of origin (current location of user)
    var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
    //create the coordinates of destination
    var end = new google.maps.LatLng(39.755976,-121.847113);
  	var request = {
      origin:pos,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
  	}
  	//use direction service to create route and display if status==OK
  	directionsService.route(request, function(response, status) {
    	if (status == google.maps.DirectionsStatus.OK) {
    	directionsDisplay.setDirections(response);
    	}
  	})
  })
};


//GOOGLE MAPS CONFIGURATION END========================================
//======================================================================
