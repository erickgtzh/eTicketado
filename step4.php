<?php
include("db_manager.php");
include("my_functions.php");

$boletos = $_POST['boletos'];
$id_client = $_POST['id_client'];

$submit = $_POST['boton'];

if ($submit == 'Siguiente') {
    $total = $boletos * 100;
    $showText = "Total a pagar: $" . $total;
} else {
    header("Location:step1.php");
}

?>


<html>

<head>
    <title>Ingresa tus datos</title>
</head>

<body>
    <h1><?php echo $showText; ?></h1>
    <div>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="MRA2AQTLQJE5C">
            <input type="hidden" name="lc" value="MX">
            <input type="hidden" name="item_name" value="E-Ticket Covid">
            <input type="hidden" name="item_number" value="06">
            <input type="hidden" name="button_subtype" value="services">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <input type="hidden" name="custom" value="<?php echo $id_client; ?>">
            <input type="hidden" name="no_note" value="1">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="rm" value="1">
            <input type="hidden" name="return" value="http://localhost/sesion7/etickets/pago_ok.php">
            <input type="hidden" name="cancel_return" value="http://localhost/sesion7/etickets/pago_canc.php">
            <input type="hidden" name="currency_code" value="MXN">
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
            <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        </form>

    </div>
</body>

</html>