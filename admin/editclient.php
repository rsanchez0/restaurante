<?php

	include("../functions.php");

	if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) )
		header("Location: login.php");

	if($_SESSION['user_level'] != "admin")
		header("Location: login.php");

	if(isset($_POST['btnedit'])) {

		if (!empty($_POST['clientname']) && !empty($_POST['itemPrice']) ) {


			$id = $sqlconnection->real_escape_string($_POST['id']);
			$clientname = $sqlconnection->real_escape_string($_POST['nombre']);
			$clientad = $sqlconnection->real_escape_string($_POST['direccion']);

			$updateItemQuery = "UPDATE clientes SET nombre = '{$clientname}' , direccion = {$clientad} WHERE  id  = {id} ";

			if ($sqlconnection->query($updateItemQuery) === TRUE) {
				header("Location: menu.php");
				exit();
			}

			else {
				//handle
				echo "someting wong";
				echo $sqlconnection->error;
				echo $updateItemQuery;
			}

		}
	}

?>
