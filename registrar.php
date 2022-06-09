<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtReferencia"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtCategoria"]) || empty($_POST["txtStock"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $referencia = $_POST["txtReferencia"];
    $precio = $_POST["txtPrecio"];
    $peso = $_POST["txtPeso"];
    $categoria = $_POST["txtCategoria"];
    $stock = $_POST["txtStock"];
    $fecha = date("Y-m-d");
    
    $sentencia = $bd->prepare("INSERT INTO productos(nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$referencia,$precio,$peso,$categoria,$stock,$fecha]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        echo $fecha;
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>