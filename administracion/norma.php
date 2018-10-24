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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
include("menu.php");
?>
 


<br><br>

<?php
echo $norma = $_POST['norma'];

require_once("../modelo/connect.php");


$sql = "SELECT * FROM normas WHERE documento='$norma'";
$resultado = $conexion->query($sql);
$fila=$resultado->fetch_assoc();
     $id= $fila['id'];
	 $sdo= $fila['sdo'];
     $documento =$fila['documento'];
     $titulo =$fila['titulo'];
     $idioma =$fila['idioma'];
     $formato =$fila['formato'];
     $revisionActual =$fila['revisionActual'];
     $ultimaRevision =$fila['ultimaRevision'];
     $estatus =$fila['estatus'];
     $observaciones =$fila['observaciones'];
?>




<table>
    <tr>
        <td>Id:</td>
        <td><?php echo $id ?></td>
    </tr>
    <tr>
        <td>SDO/ORG:</td>
        <td><?php echo $sdo ?></td>
    </tr>
    <tr>
        <td>Documento:</td>
        <td><?php echo $documento ?></td>
    </tr>
    <tr>
        <td>Titulo:</td>
        <td><?php echo $titulo ?></td>
    </tr>
    <tr>
        <td>Idioma:</td>
        <td><?php echo $idioma ?></td>
    </tr>
    <tr>
        <td>Formato</td>
        <td><?php echo $formato ?></td>
    </tr>
    <tr>
        <td>Revision Actual</td>
        <td><?php echo $revisionActual ?></td>
    </tr>
    <tr>
        <td>Ultima Revision</td>
        <td><?php echo $ultimaRevision ?></td>
    </tr>
    <tr>
        <td>Estatus</td>
        <td><?php echo $estatus ?></td>
    </tr>
    <tr>
        <td>Observaciones</td>
        <td><?php echo $observaciones ?></td>
    </tr>
</table>





<br><br>


<form method="post" action="editarNorma.php">
<input type="hidden" name="norma" value="<?php echo $norma; ?>">
<input type="submit" name="editarNorma" value="Modificar Registro">
</form>

    
</body>
</html>
<?php
}else{
  header("location:../index.php");
}
?>