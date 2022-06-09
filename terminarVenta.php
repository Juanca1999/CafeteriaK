<?php
session_start();
include_once 'model/conexion.php';

$ahora = date("Y-m-d H:i:s");

$bd->beginTransaction();
$sentencia = $bd->prepare("INSERT INTO ventas(codigo_producto_vendido, cantidad_vendida) VALUES (?, ?);");
$sentenciaStock = $bd->prepare("UPDATE productos SET stock = stock - ? WHERE codigo = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$sentencia->execute([$producto->codigo, $producto->cantidad]);
	$sentenciaStock->execute([$producto->cantidad, $producto->codigo]);
}
$bd->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>