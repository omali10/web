<br><br><br>
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
                            <a class="nav-link ' . ($currentPage === "ayuda" ? "active" : "") . '" href="ayuda.php">Ayuda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "users" ? "active" : "") . '" href="usuarios.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "itsm" ? "active" : "") . '" href="user.php">ITSM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === "calendario" ? "active" : "") . '" href="APDF.php">Calendario de Formatos</a>
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
            margin-top: 80px;
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
                max-width: 80%; /* Further reduce the image size on smaller screens */
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
<br><br><br><br>
<?php generateNavbar("users"); ?>
<div class="container is-fluid">
    <div class="col-xs-12">
        <br>
        <h2>Lista de usuarios registrados</h2>
        <br>
        <div>
            <a class="btn btn-secondary" href="user.php">Regresar <i class="fa fa-plus"></i> </a>
            <a class="btn btn-success" href="../index.php">Agregar Nuevo Usuario <i class="fa fa-plus"></i> </a>
        </div>
        <br><br>
        <table class="table table-striped table-dark " id="table_id">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Password</th>
                    <th>Telefono</th>
                    <th>Fecha</th>
                    <th>Rol</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = mysqli_connect("localhost", "root", "", "r_user");
                $search = "";
                if (isset($_GET['search'])) {
                    $search = mysqli_real_escape_string($conexion, $_GET['search']);
                }
                $SQL = "SELECT user.id, user.nombre, user.apellidos, user.correo, user.password, user.telefono,
                        user.fecha, permisos.rol, user.departamento FROM user
                        LEFT JOIN permisos ON user.rol = permisos.id";
                if (!empty($search)) {
                    $SQL .= " WHERE user.nombre LIKE '%$search%'";
                }
                $dato = mysqli_query($conexion, $SQL);
                if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['apellidos']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo $fila['password']; ?></td>
                            <td><?php echo $fila['telefono']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td><?php echo $fila['rol']; ?></td>
                            <td><?php echo $fila['departamento']; ?></td>
                            <td>
                                <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                                    <i class="fa fa-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="9">No existen registros</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
