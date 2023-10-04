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
</body>

</html>