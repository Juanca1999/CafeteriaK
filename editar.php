<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from productos where codigo = ?;");
    $sentencia->execute([$codigo]);
    $producto = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                        <label class="form-label">Nombre Del Producto: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus
                        value="<?php echo $producto->nombre_producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Referencia: </label>
                        <input type="text" class="form-control" name="txtReferencia" autofocus required
                        value="<?php echo $producto->referencia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio: </label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $producto->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Peso: </label>
                        <input type="number" class="form-control" name="txtPeso" autofocus required
                        value="<?php echo $producto->peso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría: </label>
                        <input type="text" class="form-control" name="txtCategoria" autofocus required
                        value="<?php echo $producto->categoria; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock: </label>
                        <input type="number" class="form-control" name="txtStock" autofocus required
                        value="<?php echo $producto->stock; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $producto->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>