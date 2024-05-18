<?php 
	session_start();
	require_once "../../clases/Conexion.php";

	$c= new conectar();
	$conexion=$c->conexion();
/*
OBTIENE LOS DATOS DEL FORMULARIO
*/ 
	$idcliente=$_POST['clienteVenta'];
	$idproducto=$_POST['productoVenta'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$precio=$_POST['precioV'];
/*
CO0NSULTA EL NOMBRE DEL CLIENTE BASADO EN SU ID
*/
	$sql="SELECT nombre,apellido 
			from clientes 
			where id_cliente='$idcliente'";
	$result=mysqli_query($conexion,$sql);

	$c=mysqli_fetch_row($result);

	$ncliente=$c[1]." ".$c[0];
/*
CONSULTA EL NOMBRE DEL PRODUCTO BASADO EN SU ID
se agrego cantidad
*/
	$sql="SELECT nombre, cantidad
			from articulos 
			where id_producto='$idproducto'";
	$result=mysqli_query($conexion,$sql);
	$producto =mysqli_fetch_row($result); //se agrego 	MODIFICADO
	$nombreproducto=mysqli_fetch_row($result)[0];
	$cantidadDisponible = $producto[1];

//inicio
	if ($cantidad > $cantidadDisponible) {
		echo 0;
		exit;
	}

	// Actualiza la cantidad de stock en la base de datos
	$cantidadRestante = $cantidadDisponible - $cantidad;
	$sql = "UPDATE articulos SET cantidad='$cantidadRestante' WHERE id_producto='$idproducto'";
	mysqli_query($conexion, $sql);
//final modificacion

/**
 * CREA UNA CREA UNA CADENA DE TEXTO CON LA IFORMACION DEL ARTICULO SEPARANDO CADA DATO CON || 
 */
	$articulo=$idproducto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio."||".
				$ncliente."||".
				$idcliente."||".
				$cantidad; //AGREGADO
/**
 * Agrega la cadena de información del artículo a la variable de sesión tablaComprasTemp, 
 * que actúa como una tabla temporal para almacenar los artículos que se van a comprar.
 */
	$_SESSION['tablaComprasTemp'][]=$articulo;

 ?>