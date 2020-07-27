<?php
	//session_start();
    //include('expira.php');
    //include('conexion.php');
   $id = $_GET["id"];
   
    $conexion=mysqli_connect('localhost','ino','ino19','inovetel_netsai');

	$query="SELECT * FROM usuarios, empresa, perfiles, areas WHERE empresa.idEmpresa = usuarios.idEmpresa AND usuarios.idPerfil = perfiles.idPerfil AND areas.idArea = usuarios.idArea AND idUsuario = 
	'$id'";
	$result=mysqli_query($conexion,$query);
	$mostrar=mysqli_fetch_array($result);

    



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Netsai::..</title>

<link href="css/StyleSheetFormulario.css" rel="stylesheet" type="text/css" />

<link href="css/tableclothform.css" rel="stylesheet" type="text/css" media="screen" />



</style>

<link href="calendario_dw/calendario_dw-estilos.css" type="text/css" rel="STYLESHEET" />

<script src="calendario_dw/jquery-1.4.4.min.js" type="text/javascript"></script>

<script src="calendario_dw/calendario_dw.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){

   $(".desde").calendarioDW();

})

</script>

</head>



<body>

<div id="container">

    <td width="1050"><center></center></td>
  <form class="contact_form" form id="form1" name="form1" enctype="multipart/form-data" method="post"action="chkUpdUsuario.php">
      
      
      
    <p>&nbsp;</p>



  <p>&nbsp;</p>



  <table width="549" border="0" align="center">



    <tr>



      <th colspan="2" bgcolor="#989477" align="center"><strong>Usuario</strong></th>



    </tr>





      <td>Nombre:</td>



      <td><input name="nomusu" type="text" id="nomusu" size="25" value="<?php echo $mostrar["usuNombre"]; ?>"  disabled="disabled" /></td>



    </tr>
	
	 <tr>
       
       
       
       <td>A. Paterno:</td>
       
       
       
       <td><label for="configc">
         
         <input name="pateruno" type="text" id="pateruno" size="25" value="<?php echo $mostrar["usuPaterno"]; ?>" disabled="disabled"/>
         
        </label></td>
		 
       
       
       
     </tr>



         <tr>
           
           
           
           <td>A. Materno:</td>
           
           
           
           <td><input name="materusu" type="text" id="materusu" size="25" value="<?php echo $mostrar["usuMaterno"]; ?>" disabled="disabled"/></td>
           
           
           
      </tr>
	       <td>Tipo de Sangre:</td>
      
           <td><input name="usuusu" type="text" id="producto" size="15" value="<?php echo $mostrar["ususan"]; ?>"  disabled="disabled"/></td>
      </tr>
	       <td>Alergia:</td>
      
           <td><input name="correousu" type="text" id="producto" size="30" value="<?php echo $mostrar["usualerg"]; ?>" disabled="disabled"/></td>
      </tr>
	<td>Nombre en caso de Emergencia:</td>
           <td><input name="producto2" type="text" id="producto3" size="30" value="<?php echo $mostrar["nomb_emergencia"]; ?>" disabled="disabled"/></td>

      </tr>
  <td>Numero de Emergencia:</td>
           <td><input name="producto3" type="text" id="producto4" size="30" value="<?php echo $mostrar["no_emergencia"]; ?>" disabled="disabled"/></td>

      </tr>
    <tr>
		<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" />
  <td>&nbsp;</td>
      
      <td colspan="2">&nbsp;</td>
      
      
      
    </tr>



  </table>
</form>



<p>&nbsp;</p>



<p>&nbsp;</p>



<p>&nbsp;</p>
<td><p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <center><p>&nbsp;</p></center></td>

</div>



</body>

</html>