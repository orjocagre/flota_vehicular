<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/login-tablet.css" media="(min-width: 500px)">
    <link rel="stylesheet" href="./css/login-desktop.css" media="(min-width: 1000px)">

</head>

<body>
    <main>
        <div class="fondo">

        </div>
        <div class="contenedor-principal">
            <div class="contenedor-titulo">
                <a href="./mainpage.php">FL<span></span>TA</a>
            </div>
            <div class="division"></div>
            <form class="contenedor-login">
                <h1>Bienvenido de vuelta</h1>
                <div class="contenedor-input">
                    <span class="img-usuario"></span>
                    <input type="text" placeholder="usuario">
                </div>
                <div class="contenedor-input">
                    <span class="img-contra"></span>
                    <input type="password" placeholder="contraseña">
                </div>
                <input class="btn-enviar" type="submit" value="Iniciar Sesion">

                <div class="contenedor-registrarse">
                    <p>Aun no tienes cuenta?</p>
                    <input class="btn-secundario" type="button" value="Registrate">
                </div>
            </form>
        </div>
    </main>
    <script>
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('body-darkMode');
        }
    </script>
</body>

</html>