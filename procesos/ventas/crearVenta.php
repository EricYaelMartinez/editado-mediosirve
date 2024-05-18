<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	$obj= new ventas(); /**
	Se crea una instancia del objeto ventas para poder usar sus métodos. */



	if(count($_SESSION['tablaComprasTemp'])==0){/*Verifica si la variable de sesion esta vacía si es asi imprie un 0*/
		echo 0;
	}else{
		/**
		 * si no esta vacia llama al metodo crearventa de CLASES/ VENTAS.PHP
		 */
		$result=$obj->crearVenta();
		unset($_SESSION['tablaComprasTemp']);//ELIMINA LA VARIABLE DE SESION
		echo $result; //IMPRIME EL RESULTADO DE LA OPERACION ($result=$obj->crearVenta();)
	}
 ?>