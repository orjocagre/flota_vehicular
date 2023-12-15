<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fleet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">


    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />




    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "./header.php" ?>
    <?php include "./sidebar.php" ?>

    <main class="main main-form">
        <form action="./signInAdminController.php" method="get" class="vehicle_form form">

            <div class="form_header">
                <h1 class="form_title">crear cuenta</h1>
            </div>
            <div class="form_body">

                <label class="form_label" for="userName">Nombre de usuario</label>
                <input class="form_text" type="text" name="userName">

                <label class="form_label" for="password">Constraseña</label>
                <input class="form_text" type="password" name="password">

                <label class="form_label" for="passwordConfirmation">Confirmar constraseña</label>
                <input class="form_text" type="password" name="passwordConfirmation">

                <label class="form_label" for="firstName">Primer nombre</label>
                <input class="form_text" type="text" name="firstName">

                <label class="form_label" for="secondName">Segundo nombre</label>
                <input class="form_text" type="text" name="secondName">

                <label class="form_label" for="firstSurname">Primer apellido</label>
                <input class="form_text" type="text" name="firstSurname">

                <label class="form_label" for="secondSurname">Segundo apellido</label>
                <input class="form_text" type="text" name="secondSurname">

                <label class="form_label" for="birthDate">Fecha de nacimiento</label>
                <input class="form_text" type="text" name="birthDate">

                <label class="form_label" for="sex">Género</label>
                <select name="sex" id="sex" class="form_select">
                    <option class="form_option" value="1">Masculino</option>
                    <option class="form_option" value="2">Femenino</option>
                </select>

                <label class="form_label" for="id">Cedula</label>
                <input class="form_text" type="text" name="id">

                <label class="form_label" for="phone">Telefono</label>
                <input class="form_text" type="text" name="phone">

                <label class="form_label" for="mail">Correo</label>
                <input class="form_text" type="text" name="mail">

                <label class="form_label" for="businessName">Nombre de la empresa</label>
                <input class="form_text" type="text" name="businessName">

                <label class="form_label" for="businessLogo">Logo de la empresa</label>
                <label class="form_fileContainer" for="businessLogo">
                    <label class="form_fileButton" for="businessLogo">Seleccionar imagen</label>
                    <input class="form_file" type="file" name="businessLogo" id="businessLogo">
                    <span class="form_fileName" id="imageName"></span>
                </label>

                <label class="form_label">Ubicación de los vehiculos</label>
                <hr>
                <label class="form_label" for="businessLatitude">Latitud</label>
                <input id="txtLatitude" class="form_text txtLatitude" type="text" name="businessLatitude" value="">
                <label class="form_label" for="businessLongitude">Longitud</label>
                <input id="txtLongitude" class="form_text txtLongitude" type="text" name="businessLongitude" value="">

                <label class="form_label">No sabe las coordenadas?</label>
                <!-- <button href="./locationSelector.php" class="button">Buscar en el mapa</button> -->
                <button type="button" onclick="abrirModal()" class="button">Buscar en el mapa</button>

                <!-- Ventana Modal -->
                <div id="miModal" class="modal">
                    <div id="map" class="map map-modal"></div>




                </div>


                <script>
                    var blackMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                    const txtLng = document.getElementById('txtLongitude');
                    const txtLat = document.getElementById('txtLatitude');

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

                        txtLng.value = lng;
                        txtLat.value = lat;

                        cerrarModal();




                    });
                </script>




                <script>
                    function abrirModal() {
                        // Muestra la ventana modal
                        document.getElementById('miModal').style.display = 'block';
                        document.getElementById('map').style.display = 'block';
                    }

                    function cerrarModal() {
                        // Oculta la ventana modal
                        document.getElementById('miModal').style.display = 'none';
                        document.getElementById('map').style.display = 'none';

                    }
                </script>

                <script>
                    let input = document.getElementById("businessLogo");
                    let imageName = document.getElementById("imageName")

                    input.addEventListener("change", () => {
                        let inputImage = document.querySelector("input[type=file]").files[0];
                        imageName.innerText = inputImage.name;
                    })
                </script>




            </div>
            <div class="form_footer">
                <a href="./fleet.php" class="button">Cancelar</a>
                <input class="button button-special" type="submit" value="Guardar">

            </div>
        </form>
    </main>
    <script src="./headerSidebar.js"></script>
    <script>
        function obtenerUbicacion() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(mostrarUbicacion, mostrarError);
            } else {
                alert("La geolocalización no es compatible en este navegador");
            }
        }

        function mostrarUbicacion(posicion) {
            var latitud = posicion.coords.latitude;
            var longitud = posicion.coords.longitude;

            txtLng.value = longitud;
            txtLat.value = latitud;
        }

        function mostrarError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("El usuario ha denegado la solicitud de geolocalización.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("La información de ubicación no está disponible.");
                    break;
                case error.TIMEOUT:
                    alert("Se ha agotado el tiempo de espera para obtener la ubicación.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Se ha producido un error desconocido.");
                    break;
            }
        }

        // Llamar a la función para obtener la ubicación cuando la página cargue
        obtenerUbicacion();
    </script>
</body>

</html>