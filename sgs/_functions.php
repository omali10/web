<?php

require_once("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

        case 'eliminar_registro':
            eliminar_registro();
            break;

        case 'acceso_user':
            acceso_user();
            break;

        case 'cambio_contraseña_correo': // Agregamos un nuevo caso para manejar el cambio de contraseña por correo
            cambio_contraseña_correo();
            break;
    }
}

function editar_registro() {
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', telefono = '$telefono',
    password ='$password', rol = '$rol', departamento = '$departamento' WHERE id = '$id' ";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/usuarios.php');
}

function eliminar_registro() {
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id = $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}

function acceso_user() {
    $departamento = $_POST['departamento'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['departamento'] = $departamento;

    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    $consulta = "SELECT * FROM user WHERE departamento='$departamento' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas) {
        if ($filas['rol'] == 1) { //admin
            header('Location: ../views/user.php');
        } else if ($filas['rol'] == 2) {//lector
            header('Location: ../views/lector.php');
        } else if ($filas['rol'] == 3) {//auditor
            header('Location: ../views/user.php');
        } else {
            header('Location: login.php');
            session_destroy();
        }
    } else {
        header('Location: login.php');
        session_destroy();
    }
}

function cambio_contraseña_correo() {
    $correo = $_POST['correo'];
    
    // Verificar si el correo existe en la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "r_user");
    $consulta = "SELECT * FROM user WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);
    
    if ($filas) {
        // Generar una nueva contraseña aleatoria
        $nueva_contraseña = generar_contraseña_aleatoria();

        // Actualizar la contraseña en la base de datos
        $consulta_update = "UPDATE user SET password = '$nueva_contraseña' WHERE correo = '$correo'";
        if (mysqli_query($conexion, $consulta_update)) {
            // Mostrar la nueva contraseña al usuario
            echo "TU NUEVA CONTRASEÑA ES: <br><br>";
            echo $nueva_contraseña;
        } else {
            echo "Error al restablecer la contraseña.";
        }
    } else {
        echo "No se encontró ninguna cuenta asociada a ese correo electrónico.";
    }
}

function generar_contraseña_aleatoria() {
    // Genera una contraseña aleatoria de 8 caracteres
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $longitud = strlen($caracteres);
    $contraseña = '';
    for ($i = 0; $i < 8; $i++) {
        $contraseña .= $caracteres[rand(0, $longitud - 1)];
    }
    return $contraseña;
}

?>
<br><br><br>
<a href="../sgs/login.php" class="btn btn-secondary">Regresar a login</a> <!-- Botón para ir a la página de inicio de sesión -->
