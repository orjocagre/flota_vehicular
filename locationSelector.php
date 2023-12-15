<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">


    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />



    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/location.css">
    <title>Flota</title>
</head>

<body>
    <!-- <?php include "./header.php"; ?> -->
    <!-- <?php include "./sidebar.php"; ?> -->
    <main class="main main-location">

        <div id="map" class="map"></div>

        <script>
            var blackMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

            mapboxgl.accessToken = 'pk.eyJ1Ijoib3Jqb2NhZ3JlIiwiYSI6ImNsbGp1NWdzZDFvNjIzbHBqZWpoMnJra3UifQ.xG5eM30Wq8fBcqdMcw-utA';
            const map = new mapboxgl.Map({
                container: 'map',
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: blackMode ? 'mapbox://styles/mapbox/dark-v11' : 'mapbox://styles/mapbox/streets-v12',
                center: [-86.3537846, 13.1036979],
                zoom: 14
            });

            map.on('style.load', loadMap);
            map.on('load', loadMap);

            var lng;
            var lat;

            map.on('load', () => {
                const geocoder = new MapboxGeocoder({
                    // Initialize the geocoder
                    accessToken: mapboxgl.accessToken, // Set the access token
                    mapboxgl: mapboxgl, // Set the mapbox-gl instance
                    zoom: 13, // Set the zoom level for geocoding results
                    placeholder: 'Ingrese una dirección o un lugar' // This placeholder text will display in the search bar
                });
                // Add the geocoder to the map
                map.addControl(geocoder, 'top-left'); // Add the search box to the top left
            });

            function loadMap() {


            }

            let marker = null;
            map.on('click', function(e) {
                if (marker == null) {
                    marker = new mapboxgl.Marker()
                        .setLngLat(e.lngLat)
                        .addTo(map);
                } else {
                    marker.setLngLat(e.lngLat)
                }
                lng = e.lngLat.lng;
                lat = e.lngLat.lat;

                window.location.href = './signInAdmin.php?lng='+lng+'&lat='+lat;

            });
        </script>


    </main>
    <footer>
    </footer>
    <script src="./headerSidebar.js"></script>
</body>

</html>