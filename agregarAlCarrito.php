<?php
if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
include_once 'model/conexion.php';
$sentencia = $bd->prepare("SELECT * FROM productos WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay stock...
if ($producto->stock < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    $producto->total = $producto->precio;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    $cantidadStock = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadStock + 1 > $producto->stock) {
        header("Location: ./vender.php?status=6");
        exit;
    }
    $_SESSION["carrito"][$indice]->cantidad++;
}
header("Location: ./vender.php");
