<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/location.css">
    <title>Flota</title>
</head>

<body>
    <?php include "./header.php"; ?>
    <?php include "./sidebar.php"; ?>
    <main class="main">

        <div id="map"></div>

        <script>
            var blackMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

            const darkStyles = [{
                    elementType: "geometry",
                    stylers: [{
                        color: "#213635"
                    }]
                },
                {
                    elementType: "labels.text.stroke",
                    stylers: [{
                        color: "#213635"
                    }]
                },
                {
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#746855"
                    }]
                },
                {
                    featureType: "administrative.locality",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#d59563"
                    }],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#d59563"
                    }],
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry",
                    stylers: [{
                        color: "#263c3f"
                    }],
                },
                {
                    featureType: "poi.park",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#6b9a76"
                    }],
                },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{
                        color: "#38414e"
                    }],
                },
                {
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [{
                        color: "#212a37"
                    }],
                },
                {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#9ca5b3"
                    }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [{
                        color: "#746855"
                    }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [{
                        color: "#1f2835"
                    }],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#f3d19c"
                    }],
                },
                {
                    featureType: "transit",
                    elementType: "geometry",
                    stylers: [{
                        color: "#2f3948"
                    }],
                },
                {
                    featureType: "transit.station",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#d59563"
                    }],
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{
                        color: "#17263c"
                    }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#515c6d"
                    }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.stroke",
                    stylers: [{
                        color: "#17263c"
                    }],
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off" // Oculta las etiquetas de puntos de interés
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off" // Oculta las etiquetas de nombres de calles
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off" // Oculta los iconos de nombres de calles
                    }]
                },
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de puntos de interés
                    ]
                },
                {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de transporte público
                    ]
                },
                {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de nombres de calles
                    ]
                },
                {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta las etiquetas administrativas (ciudades, sectores, etc.)
                    ]
                },
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de puntos de interés
                    ]
                },
                {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de transporte público
                    ]
                },
                {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de nombres de calles
                    ]
                },
                {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta las etiquetas de los cuerpos de agua (ríos, lagos, etc.)
                    ]
                },
            ];


            const lightStyles = [{
                    "featureType": "poi",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off" // Oculta las etiquetas de puntos de interés
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off" // Oculta las etiquetas de nombres de calles
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off" // Oculta los iconos de nombres de calles
                    }]
                },
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de puntos de interés
                    ]
                },
                {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de transporte público
                    ]
                },
                {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de nombres de calles
                    ]
                },
                {
                    featureType: "administrative",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta las etiquetas administrativas (ciudades, sectores, etc.)
                    ]
                },
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de puntos de interés
                    ]
                },
                {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de transporte público
                    ]
                },
                {
                    featureType: "road",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta etiquetas de nombres de calles
                    ]
                },
                {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                            visibility: "off"
                        } // Oculta las etiquetas de los cuerpos de agua (ríos, lagos, etc.)
                    ]
                },
            ];

            var map;

            function initMap() {
                var location = {
                    lat: 12.1328200,
                    lng: -86.2504000
                };

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 4,
                    center: location,
                    zoom: 14,
                    styles: blackMode ? darkStyles : lightStyles
                });
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOaRkq9mZFsIeZ9Ruqh_A_9YDNNX5A6Bc&callback=initMap"></script>

    </main>
    <footer>
    </footer>
    <script src="./headerSidebar.js"></script>
</body>

</html>