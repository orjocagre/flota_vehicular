<?php
if($_GET) {
    $userName = $_GET['userName'];
    $visible = "";
}
else {
    $userName = "";
    $visible = "invisible";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/style.css">

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
            <form action="./loginController.php" method="get" class="contenedor-login">
                <h1>Bienvenido de vuelta</h1>
                <div class="contenedor-input">
                    <span class="img-usuario"></span>
                    <input type="text" placeholder="usuario" name="userName" value="<?php echo $userName; ?>">
                </div>
                <div class="contenedor-input">
                    <span class="img-contra"></span>
                    <input type="password" placeholder="contraseña" name="password">
                </div>
                <p class="login-error <?php echo $visible;?>">Nombre de usuario o contraseña incorrectos</p>
                <input class="btn-enviar" type="submit" value="Iniciar Sesion">

                <div class="contenedor-registrarse">
                    <p>Aun no tienes cuenta?</p>
                    <a href="./signInType.php" class="btn-secundario"> Registrate</a> 
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