


<?php

if(isset($_POST['asignarNorma'])){

  

 require_once("../modelo/connect.php");
  $normas = $_POST['documento'];
  $cliente = $_POST['cliente'];

  


  for($i=0; $i<sizeof($normas); ++$i){

     $listaNormas = $normas[$i];


     $sql = "SELECT * FROM normas WHERE documento='$listaNormas'";
     $resultado = $conexion->query($sql);
     $fila=$resultado->fetch_assoc();
          $sdo= $fila['sdo'];
          $codigo= $fila['documento'];
          $titulo= $fila['titulo'];
          $revisionCliente= "";
          $revisionActual= $fila['revisionActual'];
          $estatus= $fila['estatus'];
          $observaciones= $fila['observaciones'];
          $r = $fila['r'];
          $e= $fila['e'];
          $strz=$fila['strz'];
          $crgo=$fila['crgo'];
          $add=$fila['add'];
          $tc=$fila['tc'];
          $amd=$fila['amd'];
          $erta=$fila['erta'];

    
    $sql2 = "SELECT * FROM normacliente WHERE norma='$listaNormas' and cliente='$cliente'";
    $resultado2 = $conexion->query($sql2);
    $rowcount=mysqli_num_rows($resultado2);
    if($rowcount>0){
      echo "EL CLIENTE YA POSEE LA NORMA ". $listaNormas ;
    }else{
      
      $asignarNormas = "INSERT INTO normacliente VALUES (
        '',
        '$listaNormas',
        '$cliente',
        '$sdo',
        '$titulo',
        '$revisionCliente',
        '$revisionActual',
        '$estatus',
        '$observaciones',
        '$r',
        '$e',
        '$strz',
        '$crgo',
        '$add',
        '$tc',
        '$amd',
        '$erta'
        )";
  
  
      $registroVendedor = $conexion->query($asignarNormas);

      echo "LA NORMA ".$listaNormas. " FUE CARGADA A LA LISTA MAESTRA DEL CLIENTE<br>";
    }//fiN Revision si el cliente tiene la norma


  


    

  }

  
}
?>