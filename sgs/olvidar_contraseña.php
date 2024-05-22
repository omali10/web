<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
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
        /* Contenedor principal */
        #main-container {
            background-color: #D0D3D4; /* Color de fondo */
            padding: 30px;
            height: 50vh; 
        }
        /* Formulario */
        #login-box {
            border: 2px solid #007bff; /* Color del borde */
            background-color: #85929E; /* Color de fondo */
            padding: 20px;
            border-radius: 10px; /* Bordes redondeados */
            color: white; /* Color del texto */
        }
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
    </style>
</head>

<body>
    <header>
        <h1>Restablecer Contraseña</h1>
    </header>

    <div id="main-container">
        <?php
        // Aquí incluimos el código PHP para manejar el restablecimiento de contraseña
        require_once ("_functions.php");
        ?>
        
        <form action="_functions.php" method="POST">
            <div id="login-box">
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" name="accion" value="cambio_contraseña_correo">
                    <input type="submit" class="btn btn-danger" value="Restablecer Contraseña">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
