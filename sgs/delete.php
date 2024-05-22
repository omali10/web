<?php
include "_db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que el ID sea un número entero

    // Primero obtenemos el nombre del archivo para eliminarlo del servidor
    $sql = "SELECT archivo FROM documento WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $archivo = $fila['archivo'];
        $ruta_archivo = "../sgs/" . $archivo;

        // Eliminamos el archivo del servidor si existe
        if (file_exists($ruta_archivo)) {
            unlink($ruta_archivo);
        }

        // Eliminamos el registro de la base de datos
        $sql = "DELETE FROM documento WHERE id = '$id'";
        if (mysqli_query($conexion, $sql)) {
            echo "Registro eliminado correctamente.<br>";

            // Reasignamos los IDs de los registros posteriores
            $sql_reasignar = "UPDATE documento SET id = id - 1 WHERE id > '$id'";
            if (mysqli_query($conexion, $sql_reasignar)) {
               
            } else {
             
            }

            // Verificamos si la tabla está vacía
            $sql_verificar = "SELECT COUNT(*) AS total FROM documento";
            $resultado_verificar = mysqli_query($conexion, $sql_verificar);
            $fila_verificar = mysqli_fetch_assoc($resultado_verificar);
            
            if ($fila_verificar['total'] == 0) {
                // Reiniciamos el contador de AUTO_INCREMENT si la tabla está vacía
                $sql_reset_auto_increment = "ALTER TABLE documento AUTO_INCREMENT = 1";
                if (mysqli_query($conexion, $sql_reset_auto_increment)) {
                
                } else {
                  
                }
            } else {
                // Reiniciamos el contador de AUTO_INCREMENT para que no queden huecos
                $sql_auto_increment = "ALTER TABLE documento AUTO_INCREMENT = (SELECT MAX(id) FROM documento)  0";
                if (mysqli_query($conexion, $sql_auto_increment)) {
           
                } else {
                   
                }
            }
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Registro no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
