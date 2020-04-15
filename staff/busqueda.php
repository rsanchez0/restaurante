<?php

require_once "BD/conexion.php";
$tabla="";
$consulta=" SELECT * FROM clientes LIMIT 0";
$termino= "";
if(isset($_POST['productos']))
{
	$termino=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM clientes WHERE
	nombre LIKE '%".$termino."%' OR
	direccion LIKE '%".$termino."%' OR
	telefono LIKE '%".$termino."%'";
}
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<thead>
	<tr>
	<th class='bg-info' scope='col'>Nombre</th>
	<th class='bg-info' scope='col'>Direccion</th>
	<th class='bg-info' scope='col'>Telefono</th>

	</tr>
	</thead><br>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td>".$fila['nombre']."</td>
		<td>".$fila['direccion']."</td>
		<td>".$fila['telefono']."</td>

		</tr>";
	}
	echo "</tbody>
	</table>";
}else{
	echo "<center><h4>No hemos encotrado ese cliente"."<strong class='text-uppercase'>".$termino."</strong><h4><center>";
}
?>
