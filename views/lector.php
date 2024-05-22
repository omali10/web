<?php
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
                        <a class="nav-link ' . ($currentPage === "ayuda" ? "active" : "") . '" href="ayuda2.php">Ayuda</a>
                    </li>
                    
                        <li class="nav-item">     
                            <a class="nav-link ' . ($currentPage === "users" ? "active" : "") . '" href="lector.php">ITSM</a>
                        </li>
                        <li class="nav-item">     
                            <a class="nav-link ' . ($currentPage === "SGC" ? "active" : "") . '" href="formatos.php">Notificaciones</a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link ' . ($currentPage === "Formatos" ? "active" : "") . '" href="https://1drv.ms/x/s!AsGX1qQUGvFgbeXRffuVkBTAZV4?e=Kxbxz8">Formatos</a>
</li>

                        
                        <!-- Agrega aquí más elementos de la barra de funciones según tu necesidad -->
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
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/es.css">
    <title>Usuarios</title>
    <style>
        body {
            background-color: #f2f2f2; /* Color de fondo gris */
            margin: 0; /* Elimina el margen predeterminado del body */
        }
        /* Encabezado */
        header {
            background-color: #1B4F72;
            color: white;
            padding: 10px;
            padding-top: 0; /* Ajuste del espacio superior */
            text-align: center;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000; /* Asegura que el encabezado esté encima de otros elementos */
        }
        /* Pie de pagina */
        footer {
            background-color: #1B2631;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Estilos para el mensaje de bienvenida */
        .welcome-box {
            background-color: #ffffff;
            border: 2px solid #1B4F72; /* Borde sólido azul */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            margin-bottom: 20px; /* Margen inferior */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
            text-align: center; /* Centrar el contenido */
        }
        .welcome-title {
            font-size: 24px; /* Tamaño de fuente grande */
            font-weight: bold; /* Negrita */
            color: #1B4F72; /* Color de texto azul */
            margin-bottom: 10px; /* Margen inferior */
            text-align: center; /* Centrar el texto */
        }
        .welcome-message {
            font-size: 18px; /* Tamaño de fuente */
            color: #555; /* Color de texto gris */
            text-align: center; /* Centrar el texto */
            text-transform: uppercase; /* Convertir a mayúsculas */
            padding: 10px; /* Añadir un poco de relleno */
            border: 2px solid #1B4F72; /* Borde sólido azul */
            border-radius: 5px; /* Bordes redondeados */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        .welcome-img {
            display: block; /* Para centrar la imagen */
            margin: 0 auto; /* Centrar horizontalmente */
            margin-top: 20px; /* Espacio superior */
            max-width: 100%; /* Ancho máximo de la imagen */
            height: auto; /* Altura automática */
           
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
    </style>
</head>

<body>
<header>
    <div class="container-fluid px-10">
        <div class="row mx-0">
            <div class="col-1 px-10">
                <img src="http://localhost/tecsm/img/Background.png" alt="Imagen del fondo" width="190" height="120">
            </div>
            <div class="col-md-6 offset-md-2 text-center">
                <h1>Tecnologico Nacional de México</h1>
                <h1>INSTITUTO TECNOLÓGICO DE SAN MARCOS </h1>
            </div>
            <div class="col-2 px-0">
                <img src="http://localhost/tecsm/img/Logo.png" alt="Imagen del fondo" width="140" height="110">
            </div> 
        </div>
    </div>
</header>
<br><br><br>
<?php generateNavbar("users"); ?>
<div class="container is-fluid">
    <div class="col-xs-12">
        <br><br>
        <!-- Mensaje de bienvenida con marcos y contornos -->
        <div class="welcome-box">
            <div class="welcome-message"><?php echo strtoupper($_SESSION['departamento']); ?></div>
            <div class="welcome-title">¡Bienvenido al Sistema de Gestión de la Calidad (SGC)!</div>
            <img class="welcome-img" src="http://localhost/tecsm/img/scg.png" alt="Imagen de bienvenida">
        </div>
    </div>
</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="../js/user.js"></script>
<br><br>
<footer>
    <!-- imagen en el pie de página -->
    <div class="container-fluid px-10">
        <div class="row mx-0 align-items-center">
            <div class="col-1 px-10">
                <img src="http://localhost/tecsm/img/LogoEmblema.png" alt="Imagen del fondo" width="350" height="270">
            </div>
            <div class="col-10 d-flex justify-content-center align-items-center">
                <div style="text-align: center;">
                    <h3>Ubicación</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20190.490196929684!2d-99.39571590779853!3d16.783501102492675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ca3dce7098d28b%3A0xced76a15b937eb58!2sTecNM%20Campus%20San%20Marcos!5e0!3m2!1ses!2smx!4v1683660184735!5m2!1ses!2smx" width="330" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-1">
    <div style="max-width: 1000px;" class="text-right">
        <h3>Dirección:</h3>
        <p>Carretera Tecomate, Pesquería Km.1, C.P 39960, San Marcos, Gro., México</p>
        <h3>Contacto:</h3>
        <p>Email: <br>dir_smarcos@tecnm.mx</p>
        <p>Teléfono:<br> 01(745) 45 3 15 34</p>
    </div>
</div>
        </div>
    </div>
</footer>
</body>

</html>
