<?php
  session_start();
  if ($_SESSION['login'])
    {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administracion</title>
    <link rel="stylesheet" type="text/css"  href="main.css" />
    <link rel="stylesheet" href="../assets/css/flexboxgrid.css">
    <link rel="stylesheet" href="../assets/css/mega.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/tcal.css">

    <script src="../js/script.js"></script>
    <script type="text/javascript" src="../js/tcal.js"></script>
</head>
<body>


<?php
include("menu.php");
?>

    	<div class="menu ">
        <div class="menu-down">
        	<ul class="nav nav-tabs container">
						<li class="nav-item">
								<a class="nav-link " href="crearusuario.php">USUARIOS</a>
						</li>
						<li class="nav-item">
								<a class="nav-link active" href="contratos.php">CLIENTES</a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="vendedores.php">VENDEDORES</a>
						</li>
						<li class="nav-item">
								<a class="nav-link" href="normas.php">NORMAS</a>
						</li>
					</ul>
				</div>
    	</div>


  <section class="user-create container">

<!--  NEW -->
<?php
	$norma = $_POST['norma'];
	$cliente = $_POST['cliente'];
	require_once("../modelo/connect.php");

	if(isset($_POST['editarNormas'])){
			require_once("../controlador/editarNorma.php");
		}

	///DATOS NORMA CLIENTE

	$sql = "SELECT * FROM normacliente WHERE norma='$norma' AND cliente='$cliente'";
	$resultado = $conexion->query($sql);
	$fila=$resultado->fetch_assoc();

	$sdo= $fila['sdo'];
	$documento =$fila['norma'];
	$revisionActual =$fila['revisionCliente'];
	$sustituida =$fila['sustituida'];
	$estatus =$fila['estatusCliente'];
	$observaciones =$fila['observaciones'];
	$r = $fila['r'];
	$e= $fila['e'];
	$strz=$fila['strz'];
	$crgo=$fila['crgo'];
	$add=$fila['adds'];
	$tc=$fila['tc'];
	$amd=$fila['amd'];
	$erta=$fila['erta'];

	//////////DATOS NORMAS GENERAL

	$sql2 = "SELECT * FROM normas WHERE documento='$norma'";
	$resultado2 = $conexion->query($sql2);
	$fila2=$resultado2->fetch_assoc();
		
	$asdo= $fila2['sdo'];
	$adocumento =$fila2['documento'];
	$atitulo =$fila2['titulo'];
	$arevisionActual =$fila2['revisionActual'];
	$sustituida2 =$fila2['sustituida'];
	$aestatus =$fila2['estatus'];
	$aobservaciones =$fila2['observaciones'];
	$ar = $fila2['r'];
	$ae= $fila2['e'];
	$astrz=$fila2['strz'];
	$acrgo=$fila2['crgo'];
	$aadd=$fila2['adds'];
	$atc=$fila2['tc'];
	$aamd=$fila2['amd'];
	$aerta=$fila2['erta'];

?>


<form  method="post" action="#" class="my-5">
	<h1 class="user-text text-center">LISTA MAESTRA</h1>
		<div class="row my-5">
						<div class="col-md-6">       
							<div class="input-group mb-3">
								<span class="client-span">DOCUMENTO:</span>
								<input  name="documento" value="<?php echo $documento; ?>"  class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-6">   
							<div class="input-group mb-3">
								<span class="client-span">SDO - ORG:</span>
								<input  name="sdo" class="form-control" value="<?php echo $sdo; ?>" readonly >
							</div>
						</div>
						<div class="col-md-12">
								<div class="input-group mb-3">
										<span class="client-span">TITULO:</span>
										<input  type="text" name="titulo" value="<?php echo $atitulo; ?>" class="form-control" readonly>
								</div>
						</div>

		<?php
		require_once("../modelo/connect.php");
		$consulta = "SELECT * FROM normacliente WHERE norma='$norma'";
		$hacerconsulta = $conexion->query($consulta);


		require_once("../modelo/connect.php");
		$consulta = "SELECT * FROM normas WHERE documento='$norma'";
		$hacerconsulta = $conexion->query($consulta);
		?>
	
						<div class="row">
							<div class="col-md-6 mb-3">       
									<!-- ROJO -->
									<div class="input-group mb-3">
											<span class="client-span">REVISIÓN DEL CLIENTE:</span>
											<input  type="text"  value="<?php echo  $fila['revisionCliente']?>"  class="form-control" readonly>
									</div>

									<div class="input-group mb-3">
											<span class="client-span">NUEVA FECHA:</span>
											<input name="revision"    class="form-control" >
									</div>

									<div class="input-group mb-1">
											<select class="custom-select" name="revisionSelect" >
													<option></option>
													<option>Esperando Confirmacion</option>
													<option>No la posee</option>                          
											</select>
									</div>
							</div>
							<div class="col-md-6 mb-3">   
								<!-- AMARILLO  -->
								<div class="input-group mb-3">
										<span class="client-span">REVISIÓN ACTUAL:</span>
										<input  value="<?php echo $arevisionActual?>"  class="form-control" readonly>
								</div>

								<div class="input-group mb-3">
										<span class="client-span">NUEVA REVISIÓN:</span>
										<input  name="revision2"  class="form-control" >
								</div>

								<div class="input-group mb-3">
									<span class="client-span">REEMPLAZADO POR: </span>
										<select class="custom-select" name="revisionSelect2" >
												<option></option>
												<option>Inactiva sin Sustitucion</option>
												<option>Sustituida</option>
												<option>No localizada</option>
												<option>No monitoreamos</option>                           
										</select>
								</div>

								<div class="input-group mb-3">
								<input  name="sustituida" placeholder="SUSTITUIDA POR" value="<?php echo $sustituida2 ?>"  class="form-control" >
								</div>

								
								

							</div>
							


							<div class="col-md-6">
									<div class="input-group mb-3">
											<span class="client-span">ESTATUS CLIENTE:</span>
											<input  type="text" name="titulo" value="<?php echo $fila['estatusCliente']?>"  class="form-control" readonly>
									</div>
									<div class="input-group mb-3">
											<span class="client-span">NUEVO ESTATUS:</span>
											<select class="custom-select" name="estatusSelect" >
													<option>Modificar Estatus</option>
													<option>Actualizada</option>
													<option>Desactualizada</option>
													<option>Informar</option>
													<option>-</option>                             
											</select>
									</div>    
									<div class="row"> 
											<div class="input-group my-2  col-md-4">
													<span class="client-span">R:</span>
													<input  type="text" name="rada" value="<?php echo $r; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">E:</span>
													<input   name="e" value="<?php echo $e; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">STBZ:</span>
													<input name="strz" value="<?php echo $strz; ?>" class="form-control" >
											</div>

											<div class="input-group my-2  col-md-4">
													<span class="client-span">CRGD:</span>
													<input   name="crgo" value="<?php echo $crgo; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">ADD:</span>
													<input  name="add" value="<?php echo $add; ?>" class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">TC:</span>
													<input name="tc" value="<?php echo $tc; ?>"  class="form-control" >
											</div>

											<div class="input-group my-2  col-md-4">
													<span class="client-span">AMD:</span>
													<input  name="amd" value="<?php echo $amd; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">ERTA:</span>
													<input  name="erta" value="<?php echo $erta; ?>"  class="form-control" >
											</div>

											<div class="col-md-12">
													<div class="input-group my-2">
															<span class="client-span">OBSERBACION <br> DEL CLIENTE:</span>
															<textarea  name="observaciones" class="form-control hgarea" aria-label="With textarea" name=""><?php echo $observaciones ?></textarea>
													</div>
											</div>

											
									</div>      
							</div>
							<div class="col-md-6">
									<div class="input-group mb-3">
											<span class="client-span">ESTATUS NORMA:</span>
											<input value="<?php echo $aestatus?>"   class="form-control"  readonly>
									</div>
									<div class="input-group mb-3">
											<span class="client-span">NUEVO ESTATUS:</span>
											<select class="custom-select" name="estatusSelect2" required>
											<option>Modificar Estatus</option>
											<option>Activa</option>
											<option>Inactiva</option>                              
											</select>
									</div>
									<div class="row"> 
											<div class="input-group my-2  col-md-4">
													<span class="client-span">R:</span>
													<input  type="text" name="ar" value="<?php echo $ar; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">E:</span>
													<input  name="ae" value="<?php echo $ae; ?>"  class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">STBZ:</span>
													<input name="astrz" value="<?php echo $astrz; ?>" class="form-control" >
											</div>

											<div class="input-group my-2  col-md-4">
													<span class="client-span">CRGD:</span>
													<input name="acrgo" value="<?php echo $acrgo; ?>" class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">ADD:</span>
													<input name="aadd" value="<?php echo $aadd; ?>" class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">TC:</span>
													<input name="atc" value="<?php echo $atc; ?>" class="form-control" >
											</div>

											<div class="input-group my-2  col-md-4">
													<span class="client-span">AMD:</span>
													<input name="aamd" value="<?php echo $aamd; ?>"   class="form-control" >
											</div>
											<div class="input-group my-2  col-md-4">
													<span class="client-span">ERTA:</span>
													<input name="aerta" value="<?php echo $aerta; ?>"  class="form-control" >
											</div>

											<div class="col-md-12">
													<div class="input-group my-2">
															<span class="client-span">OBSERVACION <br> DE LA NORMA:</span>
															<textarea class="form-control hgarea" aria-label="With textarea" name="aobservaciones"><?php echo $aobservaciones ?></textarea>
													</div>
											</div>

									</div>

									


							</div>
						</div>


						<div class="col-md-12" style="text-align: end; margin: 50px 0;">
							<a href="contratos.php" class="col-boton" style="margin: 0 auto;">VOLVER A LISTA</a>
						</div>

						<div class="col-md-12 txt-center ">
							<input type="hidden" value="<?php echo $arevisionActual ?>" name="revisionActualNorma">
							<input type="hidden" value="<?php echo $fila['estatusCliente']?>" name="estatusNormaCli">
							<input type="hidden" value="<?php echo $fila['revisionCliente']?>" name="revisionNormaCli">
							<input type="hidden" value="<?php echo $aestatus ?>" name="estatusNormaGralPost">
							<input type="hidden" value="<?php echo $norma?>" name="norma">
							<input type="hidden" value="<?php echo $cliente?>" name="cliente">
							<button class="btn btn-send btn-col1 m-1" type="submit" name="editarNormas">GUARDAR</button>
						</div>

				</div>     

</form>






  </section>





<?php
include("js.php");
?>
</body>
</html>

<?php
}else{
  header("location:../index.php");
}
?>
