
let map;

var defaultCenter = {
    lat : -1.1327775645680171, 
    lng : 110.8413860076444
};

function initMap() {
	map = new google.maps.Map(document.getElementById("map"), {
		center: defaultCenter,
		zoom: 10,
	});

	var marker = new google.maps.Marker({
		position: defaultCenter,
		map: map,
		title: 'Click to zoom',
		draggable:true
	});


	marker.addListener('drag', handleEvent);
	marker.addListener('dragend', handleEvent);

	var infowindow = new google.maps.InfoWindow({
		content: '<h4>Drag untuk pindah lokasi</h4>'
	});

	infowindow.open(map, marker);
}

function handleEvent(event) {
	document.getElementById('lat').value = event.latLng.lat();
	document.getElementById('lng').value = event.latLng.lng();
}

$(function(){
	initMap();
})

// window.initMap = initMap;