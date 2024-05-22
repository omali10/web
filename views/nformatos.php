<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
    <br>
    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">Subir Archivos Word & PDF | SoftCodEPM</h2>
            <br>
            <br>
            <br>
            <br>
            <br>
      
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">AGREGAR</button>
           </div>
           <div>
       
       </div>
          
             <a href="user.php" style="display: block; margin-top: 20px;">REGRESAR</a>
               <div>
            <br>
            <br>
            
            <div class="container">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N° Documentos</th>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                            <th>Archivo</th>
                            <th>Descargar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "../sgs/_db.php";
                        $consulta = mysqli_query($conexion, "SELECT * FROM documento");
                        while ($fila = mysqli_fetch_assoc($consulta)):
                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['fecha']; ?></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td><?php echo $fila['archivo']; ?></td>
                                <td>
                                    <a href="../sgs/download.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="../sgs/delete.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        a {
            text-decoration: none;
        }
        .s {
            padding-top: 50px;
            text-align: center;
        }
    </style>
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
    <?php include "agregar.php"; ?>
</body>
</html>
