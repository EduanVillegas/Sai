<?php 
    $host_db = "localhost"; // Host de la BD 
    $usuario_db = "root"; // Usuario de la BD 
    $clave_db = ""; // Contrase�a de la BD 
    $nombre_db = "inovetel_netsai"; // Nombre de la BD 
     
    //conectamos y seleccionamos db 
    @mysql_connect($host_db, $usuario_db, $clave_db); 
    mysql_select_db($nombre_db); 
	
	function nombre($id){
		$query = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		return $row["usuNombre"];
		echo $row;
		exit;
	}
	
	function BuscarTxt($Tabla, $Obten, $Campo, $Valor)
		{
		/*
			* consulta erronea
			- no hay registro que coincida con la condición
			en caso contrario a los anteriores se encontro un valor
		*/
			
			$query = "SELECT $Obten FROM $Tabla WHERE $Campo ='$Valor'";	
			$result = mysql_query($query);
				
			if (!$result)
			{
				return '*';
			}
				
			$Encontrados = mysql_num_rows($result);
			
			if ($Encontrados==0)
			{
				return '-';
			}
			else
			{
				$row=mysql_fetch_array($result, MYSQL_BOTH);
				return $row[$Obten];
			}
		}

?>