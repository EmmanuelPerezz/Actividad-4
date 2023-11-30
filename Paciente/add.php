<?php
include_once('../config/config.php');
include('Paciente.php');

if (isset($_POST) && !empty($_POST)) {
    $p = new Paciente();

    if ($_FILES['imagen']['name'] !== '') {
        $_POST['imagen'] = saveImage($_FILES);
    }

    $save = $p->save($_POST);

    if ($save) {
        $mensaje = '<div class="alert alert-success"> Sesión Registrada </div>';
    } else {
        $mensaje = '<div class="alert alert-danger"> Error al registrar la sesión </div>';
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <?php include('../menu.php') ?>
    
    <div class="container d-flex flex-column justify-content-center aling-items-center">
        <?php
        if (isset($mensaje)) {
            echo $mensaje;
        }
        ?>
        <h1 class="text-center m-5">Registrar una sesión </h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col-md-6 mb-4">
                    <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Primer Nombre "
                        class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre"
                        class="form-control">
                </div>

            </div>
            <div class="row mb-2">
                <div class="col-md-6 mb-3">
                    <input type="text" name="primer_apellido" id="primer_apellido" placeholder="Primer Apellido"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="segundo_apellido" id="segundo_apellido" placeholder="Segundo Apellido"
                        class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="number" name="celular" id="celular" placeholder="Número telefonico"
                        class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 mb-3">
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción del Caso"
                        class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 mb-3">
                    <input type="datetime-local" name="fecha_sesion" id="fecha_sesion" class="form-control">

                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="duracion_sesion" id="duracion_sesion" placeholder="Duración de la Sesión"
                        class="form-control">
                </div>
            </div>
            <div class="row col-md-6 mb-5">
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>
            <button class="btn col-md-3 btn-success">
                Registrar
            </button>
        </form>
    </div>
</body>

</html>
