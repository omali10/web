<br><br><br><?php
session_start();
error_reporting(0);

$validar = $_SESSION['departamento'];

if ($validar == null || $validar == '') {
    header("Location: ../sgs/login.php");
    die();
}
function generateNavbar($currentPage) {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TecNM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "home" ? "active" : "") . '" aria-current="page" href="../sgs/login.php">Cerrar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "ayuda" ? "active" : "") . '" href="ayuda.php">Ayuda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "users" ? "active" : "") . '" href="usuarios.php">Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "itsm" ? "active" : "") . '" href="user.php">ITSM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "apdf" ? "active" : "") . '" href="APDF.php">pagina x</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "subirformatos" ? "active" : "") . '" href="nformatos.php">Subir Formatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "formatos" ? "active" : "") . '" href="https://1drv.ms/x/s!AsGX1qQUGvFgbeXRffuVkBTAZV4?e=Kxbxz8">Formatos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
    <title>Usuarios</title>
    <style>
        body {
            background-color: #f2f2f2;
            margin: 0;
        }
        header {
            background-color: #1B4F72;
            color: white;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        footer {
            background-color: #1B2631;
            padding: 100px;
            text-align: center;
            color: white;
        }
        .footer-img {
            max-width: 50%; /* Reduce the image size */
            height: auto;
        }
        .welcome-box {
            background-color: #ffffff;
            border: 2px solid #1B4F72;
            border-radius: 10px;
            padding: 20px;
            margin-top: 60px; /* Adjust to compensate for fixed header */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-title {
            font-size: 24px;
            font-weight: bold;
            color: #1B4F72;
            margin-bottom: 10px;
        }
        .welcome-message {
            font-size: 18px;
            color: #555;
            text-transform: uppercase;
            padding: 10px;
            border: 2px solid #1B4F72;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .welcome-img {
            display: block;
            margin: 0 auto;
            margin-top: 20px;
            max-width: 100%;
            height: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            header h1 {
                font-size: 18px;
            }
            .welcome-title {
                font-size: 20px;
            }
            .welcome-message {
                font-size: 16px;
            }
            .footer-img {
                max-width: 50%; /* Further reduce the image size on smaller screens */
            }
        }
    </style>
</head>

<body>
<header>
    <div class="container-fluid px-4">
        <div class="row mx-0 align-items-center">
            <div class="col-4 col-md-2 px-2">
                <img src="http://localhost/tecsm/img/Background.png" alt="Imagen del fondo" class="img-fluid">
            </div>
            <div class="col-8 col-md-8 text-center">
                <h1>Tecnologico Nacional de México</h1>
                <h1>INSTITUTO TECNOLÓGICO DE SAN MARCOS</h1>
            </div>
            <div class="col-4 col-md-2 px-2">
                <img src="http://localhost/tecsm/img/Logo.png" alt="Imagen del fondo" class="img-fluid">
            </div>
        </div>
    </div>
</header>
<br><br><br>
<?php generateNavbar("users"); ?>
<div class="container is-fluid">
    <div class="col-xs-12">
        <br><br>
        <div class="welcome-box">
            <div class="welcome-message"><?php echo strtoupper($_SESSION['departamento']); ?></div>
            <div class="welcome-title">¡Bienvenido al Sistema de Gestión de la Calidad (SGC)!</div>
            <img class="welcome-img" src="http://localhost/tecsm/img/scg.png" alt="Imagen de bienvenida">
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="../js/user.js"></script>
<br><br>
<footer>
    <div class="container-fluid px-4">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-4 px-2 text-center">
                <img src="http://localhost/tecsm/img/LogoEmblema.png" alt="Imagen del fondo" class="footer-img">
            </div>
            <div class="col-12 col-md-4 text-center">
                <h3>Ubicación</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20190.490196929684!2d-99.39571590779853!3d16.783501102492675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f86308796d3e2d3%3A0xc1178d1fd3dbda11!2sINSTITUTO%20TECNOLOGICO%20DE%20SAN%20MARCOS!5e0!3m2!1ses!2smx!4v1681910382986!5m2!1ses!2smx" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-12 col-md-4 px-2 text-center">
                <img src="http://localhost/tecsm/img/Background.png" alt="Imagen del fondo" class="footer-img">
            </div>
        </div>
    </div>
</footer>
</body>
</html>
