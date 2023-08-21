<script>
    $('#summernote').summernote({
        // placeholder: 'Atlantis',
        fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        tabsize: 2,
        height: 200
    });
    
    var saved_markers = <?= get_saved_locations() ?>;

    var user_location = [109.99335317806884, -1.8832461535074572];

    mapboxgl.accessToken = 'pk.eyJ1Ijoia2hhdWxhaGFsYXp3YXIiLCJhIjoiY2p5MWlwZWFnMDl2dDNocDZxenk2NW10dyJ9.RvPGUU817y-TkV7SRQ5ZZg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: user_location,
        zoom: 10
    });

    //  geocoder here
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        // limit results to Australia
        //country: 'IN',
    });

    var marker ;
        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("Data Ditemukan");
                console.log(ev.result.center);

            });
        });

        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;
        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
            .setLngLat(user_location)
            .addTo(map)
            .on('dragend', onDragEnd);
        }
        
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                .setLngLat(marker)

                    .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups


                       .setHTML('<h3>' + 'Perhatian !' + '</h3><p>' + 'Geser Titik Merah !!!' + '</p>'))

                    .addTo(map);

                });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        // $('#signupForm').submit(function(event){
        //     event.preventDefault();
        //     var namain = $('#namain').val();
        //     var lat = $('#lat').val();
        //     var lng = $('#lng').val();

        //     var url = 'locations_model.php?add_location&namain='+ namain +'&lat=' + lat + '&lng=' + lng ;
        //     $.ajax({
        //         url: url,
        //         method: 'GET',
        //         dataType: 'json',
        //         success: function(data){
        //             alert(data);
        //             location.reload();
        //         }
        //     });
        // });

        // document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    </script>