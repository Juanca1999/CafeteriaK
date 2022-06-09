<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo =$_POST['codigo'];
    $nombre = $_POST["txtNombre"];
    $referencia = $_POST["txtReferencia"];
    $precio = $_POST["txtPrecio"];
    $peso = $_POST["txtPeso"];
    $categoria = $_POST["txtCategoria"];
    $stock = $_POST["txtStock"];

    $sentencia = $bd->prepare("UPDATE productos SET nombre_producto = ?, referencia = ?, precio = ?, peso = ?, categoria = ?, stock = ?  where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $referencia, $precio, $peso, $categoria, $stock, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>