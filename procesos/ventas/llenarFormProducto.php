<?php 
	/**SE ENCARGA DE OBTENER LOS DATOS DE UN PRODUCTO ESPECIFICO DESDE LA BASE DE DATOS */
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$obj= new ventas(); // OCUPA LA SE VENTAS CON SU METODO OBTENERDATOSPRODUCTOS

	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

 ?>