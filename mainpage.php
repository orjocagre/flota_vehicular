<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/mainpage.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <title>Flota</title>
    <script srs="./script.js" defer></script>
</head>

<body>
    <header>
        <h1>FL<span></span>TA</h1>
        <nav>
            <ul>
                <li><a href="#">Buses Terminio</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <aside>
            <ul>
                <li><a class="btn-localizacion" href="#"><span></span>Localización</a></li>
                <li><a class="btn-mantenimiento" href="#"><span></span>Mantenimiento</a></li>
                <li><a class="btn-flota" href="#"><span></span>Flota</a></li>
            </ul>
        </aside>
        <main>
            
            <div id="map"></div>

        </main>
    </div>
    <footer>

    </footer>
</body>

</html>