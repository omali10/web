<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        /* Encabezado */
        header {
            background-color: #1B4F72;
            color: white;
            padding: 10px;
            text-align: center;
        }
        header img {
            max-width: 150%;
            height: auto;
        }
        /* Pie de pagina */
        footer {
            background-color: #1B2631;
            padding: 100px;
            text-align: center;
            color: white;
        }
        footer img {
            max-width: 200%;
            height: auto;
        }
        /* Contenedor principal */
        #main-container {
            background-color: #D0D3D4; /* Color de fondo */
            padding: 30px;
            min-height: 50vh; 
        }
        /* login */
        #login-box {
            border: 2px solid #007bff; /* Color del borde */
            background-color: #85929E; /* Color de fondo */
            background-image: url('http://localhost/tecsm/img/fondo3.jpg'); /* Imagen de fondo */
            background-size: cover; /* Ajustar la imagen de fondo */
            background-position: center; /* Centrar la imagen de fondo */
            padding: 20px;
            border-radius: 10px; /* Bordes redondeados */
            color: white; /* Color del texto */
        }
        /* Formulario */
        #login-box .form-group label {
            margin-bottom: 0.5rem;
        }
        #login-box .form-group input {
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
        }
        #login-box .form-group input[type="submit"] {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            header .container-fluid, footer .container-fluid {
                padding: 0;
            }
            header .row, footer .row {
                flex-direction: column;
                align-items: center;
            }
            header .col-1, footer .col-1 {
                display: flex;
                justify-content: center;
                margin-bottom: 10px;
            }
            header .col-md-6, footer .col-10 {
                text-align: center;
            }
            footer .col-1:last-child {
                text-align: center;
            }
            #login-box {
                background-color: rgba(133, 146, 158, 0.8);
            }
            footer .col-1 img {
                width: 200px;
                height: auto;
            }
            footer .col-10 iframe {
                width: 100%;
                height: auto;
            }
        }

        @media (max-width: 576px) {
            header h1 {
                font-size: 1.2rem;
            }
            #login-box {
                padding: 10px;
            }
            footer .col-1 img {
                width: 150px;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container-fluid px-3">
            <div class="row mx-0 align-items-center">
                <div class="col-1">
                    <img src="http://localhost/tecsm/img/Background.png" alt="Imagen del fondo" width="250" height="180">
                </div>
                <div class="col-md-6 offset-md-2 text-center">
                    <h1>Tecnologico Nacional de México</h1>
                    <h1>INSTITUTO TECNOLÓGICO DE SAN MARCOS</h1>
                </div>
                <div class="col-2">
                    <img src="http://localhost/tecsm/img/Logo.png" alt="Imagen del fondo" width="140" height="110">
                </div> 
            </div>
        </div>
    </header>
    <div id="main-container">
        <form action="_functions.php" method="POST">
            <div id="login">
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <h2 style="text-align: center;">Sistema para la gestión del SGC</h2>
                                <br>
                                <h3 class="text-align: center">Inicio de Sesión</h3>
                                <div class="form-group">
                                    <label for="departamento">DEPARTAMENTO:</label>
                                    <input type="text" name="departamento" id="departamento" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">CONTRASEÑA:</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <input type="hidden" name="accion" value="acceso_user">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-danger" value="INGRESAR">
                                </div>
                                <div class="form-group text-center">
                                    <a href="olvidar_contraseña.php" class="btn btn-link">Olvidé mi contraseña</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <div class="container-fluid px-3">
            <div class="row mx-0 align-items-center">
                <div class="col-1">
                    <img src="http://localhost/tecsm/img/LogoEmblema.png" alt="Imagen del fondo" width="350" height="270">
                </div>
                <div class="col-10 d-flex justify-content-center align-items-center">
                    <div style="text-align: center;">
                        <h3>Ubicación:</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20190.490196929684!2d-99.39571590779853!3d16.783501102492675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ca3dce7098d28b%3A0xced76a15b937eb58!2sTecNM%20Campus%20San%20Marcos!5e0!3m2!1ses!2smx!4v1683660184735!5m2!1ses!2smx" width="300" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-1 text-right">
                    <h3>Dirección:</h3>
                    <p>Carretera Tecomate, Pesquería Km.1, C.P 39960, San Marcos, Gro., México</p>
                    <h3>Contacto:</h3>
                    <p>Email: dir_smarcos@tecnm.mx</p>
                    <p>Teléfono:<br>745 45 315 34</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
