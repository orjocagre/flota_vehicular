<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fleet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/newVehicle.css">
    <link rel="stylesheet" href="./css/newVehicletablet.css" media="(min-width: 500px)">
    <link rel="stylesheet" href="./css/newVehicledesktop.css" media="(min-width: 1000px)">
</head>

<body>
    <?php include "./header.php" ?>
    <?php include "./sidebar.php" ?>

    <main class="main">
        <form action="./signInDriverController.php" method="get" class="vehicle_form form">

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

                <label class="form_label" for="licenseType">Licencia</label>


                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category1" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category1">Categoría 1</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category2" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category2">Categoría 2</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category3" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category3">Categoría 3</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category4" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category4">Categoría 4</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category5" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category5">Categoría 5</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category6" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category6">Categoría 6</label>
                </div>
                <div class="form_checkboxContainer">
                    <input class="form_checkbox" id="category7" type="checkbox" name="licenseType" value="">
                    <label class="form_label form_checkboxLabel" for="category7">Categoría 7</label>
                </div>



            </div>
            <div class="form_footer">
                <a href="./fleet.php" class="button">Cancelar</a>
                <input class="button button-special" type="submit" value="Guardar">

            </div>
        </form>
    </main>
    <script src="./headerSidebar.js"></script>
</body>

</html>