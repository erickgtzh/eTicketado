<?php
session_start();
include("my_functions.php");
include("db_manager.php");
error_reporting(0);
$listaProductos = getProducts();

?>


<!DOCTYPE html>
<html lang=en>

<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#17A2B8;">
    <?php
    include('nav-ini.php');
    ?>

    <div class="row">
        <?php foreach ($listaProductos as $producto) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img class="card-img-top py-auto mx-auto" src="<?= $producto['image']; ?>" title="<?= $producto['name'] ?>">
                    <div class="card-body">
                        <span><?= $producto['name'] ?></span>
                        <h5 class="card-title">$<?= $producto['price'] ?></h5>
                        <p class="card-img-top hyper" data-content="<?= $producto['description'] ?>" data-toggle="popover" data-trigger="hover" height="317" src="<?= $producto['image']; ?>" ?> Descripción</p>

                        <form action="step2.php" method="post">
                            <input type="hidden" name="id_product" id="id_product" value=<?php echo $producto['id_product']; ?> ?>
                            <input type="hidden" name="name" id="name" value=<?php echo $producto['name']; ?> ?>
                            <input type="hidden" name="price" id="price" value=<?php echo $producto['price']; ?> ?>
                            <center>
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Quiero asistir</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover();
        })
    </script>
</body>

</html>