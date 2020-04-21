<?php
$servername = "localhost";
$db_username = "root";
$passwdword = "";
$dbname = "eticket";

function sqlSelect($sql)
{
	global $servername, $db_username, $passwdword, $dbname;

	// Create connection
	$conn = mysqli_connect($servername, $db_username, $passwdword, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$result = mysqli_query($conn, $sql);

	//Pasa de un objeto mysqli object a un array indexado y asociativo
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	//----------------------------------------

	mysqli_close($conn);

	return ($rows);
}


function validateUser($sUser, $spasswdword)
{

	//Ejecuta y obtiene resultado en array bidimensional		
	$sql = "SELECT * FROM user WHERE username = '$sUser' AND passwd ='$spasswdword' LIMIT 1;";

	$recordsArray = sqlSelect($sql);
	$rowCount = count($recordsArray);

	if ($rowCount > 0) {
		$ret_val = $recordsArray[0]['id_user'];
		$_SESSION['username'] = $sUser;
	} else {
		$ret_val = 0;
	}

	return $ret_val;
}


function sqlInsert($sql)
{

	global $servername, $username, $passwdword, $dbname;

	// Create connection
	$conn = mysqli_connect($servername, $username, $passwdword, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		$retVal = $last_id;
	} else {
		$retVal = 0;
	}


	mysqli_close($conn);

	return ($retVal);
}


function sqlInsertSale($usuario, $unique_code, $transaction_code, $total)
{
	global $servername, $db_username, $passwdword, $dbname;

	// Create connection
	$conn = mysqli_connect($servername, $db_username, $passwdword, $dbname);

	if (!$conn) {
		die("Fallo de conexion: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM user WHERE username = '" . $usuario . "' ";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		$rows[] = $row;
	}
	$sql = "INSERT INTO sale (id_user, purchase_date, unique_code, transaction_code, total) VALUES ('" . $rows[0]['id_user'] . "', NOW(), '" . $unique_code . "', '" . $transaction_code . "', '" . $total . "')";

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
}
