<?php
session_start();
include("my_functions.php");
include("db_manager.php");
error_reporting(0);
$usuario = $_SESSION['username'];
$_SESSION['id_product'] = $_POST['id_product'];
$product = array(getTicket($_POST['id_product']));

?>

<body style="background-color:#17A2B8;">
    <?php
    include('nav-ini.php');

    #print_r($product[0]['name']);
    ?>

    <div class="row my-4 container md-10  offset-md-1">
        <table class="table table-light text-center" id="tabla">
            <thead>
                <tr>
                    <th width="60%">Nombre del evento</th>
                    <th width="20%" class="text-center">Cantidad de Boletos</th>
                    <th width="20%" class="text-center">Precio por unidad</th>
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $producto['id_product'] ?>">
                    </form>
                </tr>
            </thead>

            <form action="pagar.php" method="post">
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($product[0] as $indice => $producto) : ?>
                        <tr>
                            <td width="60%"><?= $producto['name'] ?></td>
                            <td width="30%" class="text-center">
                                <select name="quantity" id="quantity">
                                    <option selected value="1">1 Boleto</option>
                                    <option value="2">2 Boletos</option>
                                    <option value="3">3 Boletos</option>
                                    <option value="4">4 Boletos</option>
                                    <option value="5">5 Boletos</option>
                                    <option value="6">6 Boletos</option>
                                </select>
                            </td>
                            <td width="20%" class="text-center">$<?= $producto['price'] ?></td>
                            <td width="5%"></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="5">

                            <div class="alert alert-success" role="alert">
                                <div class="form-group">
                                    <label for="email">Correo electrónico:</label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Por favor, escribe tu correo electrónico." required>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Los tickets se enviarán a este correo.</small>

                            </div>
                            <?php if ($_SESSION['username']) { ?>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">
                                    Completar el pago
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-primary btn-lg btn-block disabled" type="submit" name="btnAccion" value="proceder">
                                    Debe iniciar sesión para continuar
                                </button>
                            <?php } ?>
            </form>
            </td>
            </tr>
            </tfoot>
        </table>

    </div>

</body>

</html>