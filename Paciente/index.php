<?php
include_once('../config/config.php');
include('Paciente.php');


$p = new Paciente();
$data = $p->getAll();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $remove = $p->delete($_GET['id']);
    if ($remove) {
        header('Location:' . ROOT . '/Paciente/index.php');
    } else {
        $mensaje = '<div class="alert alert-danger"> Error al Eliminar</div>';

    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Sesiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/servicios_psicologicos"> Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/Paciente/index.php"> Ver Calendario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>/Paciente/add.php"> Registar Sesión </a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1 class="text-center my-5">Calendario</h1>
        <div class="row">
            <?php
            while ($pt = mysqli_fetch_object($data)) {
                $date = $pt->fecha_sesion;
                echo "<div class='col'>";
                echo "<div class='border border-info p-4'>";
                echo "<h5> <img src='" . ROOT . "/images/$pt->imagen' width='60' height='60'/>
                            $pt->primer_nombre $pt->segundo_nombre $pt->primer_apellido $pt->segundo_apellido  </h5>";
                echo "<p> <b  class='text-primary'>Fecha de la Sesión:</b> <br>" . date('d-M-Y H:i', strtotime($date)) . "</p>";
                echo "<div class='text-center'>";
                echo "<a class='btn btn-success' href='" . ROOT . "/Paciente/edit.php?id=$pt->id'> Modificar </a> - <a class='btn btn-danger' href='" . ROOT . "/Paciente/index.php?id=$pt->id'> Eliminar </a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>