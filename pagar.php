<?php
session_start();
include("my_functions.php");
include("db_manager.php");

error_reporting(0);

$product = getTicket($_SESSION['id_product']);
$quantity = $_POST['quantity'];
$email = $_POST['email'];
$SID = session_id();
$total = 0;

foreach ($product[0] as $indice => $producto) {
    $total = $total + ($producto['price'] * $quantity);
}

if ($_POST) {
    sqlInsertSale($_SESSION['username'], $SID, uniqid(), $total);
}

$id_sesion_nueva = session_id();

$mail_username = "erickgtzh@gmail.com";  // Correo electronico saliente ejemplo: tucorreo@gmail.com
$mail_userpassword = "Holocun1414";     // Tu contraseña de gmail
$mail_setFromEmail =  $mail_username;    // Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. 
$mail_setFromName = "Erick Gutierrez";  // El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
$mail_addAddress = $email;              // Agregar quien recibe el e-mail enviado
$mail_subject = "e-Ticketado Boletos";
$template = "email_template.html";
sendEmail($mail_username, $mail_userpassword, $mail_setFromEmail, $mail_setFromName, $mail_addAddress, $product, $mail_subject, $template, $quantity, $SID);

include('nav-ini.php');
?>

<body style="background-color:#17A2B8;">
    <center>
        <div class="jumbotron">
            <h1 class="display-4"> ¡Último paso! </h1>
            <hr class="" my-4>
            <p class="lead"> Estás a punto de pagar con tu cuenta PayPal la cantidad de :
                <h3>$ <?php echo number_format($total, 2); ?> </h3>
            </p>
            </h1>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="MRA2AQTLQJE5C">
                <input type="hidden" name="lc" value="MX">
                <input type="hidden" name="item_name" value="ErickGtz - Project">
                <input type="hidden" name="item_number" value="<?php echo $quantity; ?>">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <input type="hidden" name="custom" value="<?php echo $id_client; ?>">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="return" value="http://localhost/etickets/pago_ok.php">
                <input type="hidden" name="cancel_return" value="http://localhost/etickets/pago_canc.php">
                <input type="hidden" name="currency_code" value="MXN">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
            </form>

    </center>
</body>

</html>