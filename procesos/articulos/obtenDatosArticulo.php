<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Articulos.php";

	$obj= new articulos(); // OBJETO DE LA CLASE ARTICULOS


	$idart=$_POST['idart'];//Se obtiene el ID del artículo desde una solicitud POST

	echo json_encode($obj->obtenDatosArticulo($idart));
/**
 * Se llama al método obtenDatosArticulo($idart) 
 * de la clase articulos para obtener los datos del artículo con el ID proporcionado.
 */
 ?>