<?php
session_start();
include("my_functions.php");
include("db_manager.php");
error_reporting(0);
$tickets = getAllTickets();
include('nav-ini.php');
?>

<body style="background-color:#17A2B8;">
    <center>
        <div class="row my-4 pb-4">
            <table class="table table-light" id="tabla">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Código único</th>
                        <th>Código transacción</th>
                        <th>Email</th>
                        <th>Celular</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tickets as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['purchase_date'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['unique_code'] . '</td>';
                        echo '<td>' . $row['transaction_code'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['phone_number'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
    </center>
</body>

</html>