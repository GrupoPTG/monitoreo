


<?php

if(isset($_POST['asignarNorma'])){

 require_once("../modelo/connect.php");
  $normas = $_POST['documento'];
  $cliente = $_POST['cliente'];

if($cliente=="Seleccionar.."){
  echo "DEBE SELECCIONAR UN CLIENTE PARA CARGAR UNA NORMA";
}else{

   $sql = "SELECT * FROM usuarios WHERE cliente='$cliente'";
   $resultado = $conexion->query($sql);
   $fila=$resultado->fetch_assoc();
        $idCliente= $fila['id'];
  


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


          $sql2 = "SELECT * FROM normacliente WHERE norma='$listaNormas' and cliente='$idCliente'";
          $resultado2 = $conexion->query($sql2);
          $rowcount=mysqli_num_rows($resultado2);
          if($rowcount>0){
            echo "EL CLIENTE YA POSEE LA NORMA ". $listaNormas."<br>";
          }else{
            
            $asignarNormas = "INSERT INTO normacliente VALUES (
              '',
              '$listaNormas',
              '$idCliente',
              '$sdo',
              '$titulo',
              '$revisionCliente',
              '$revisionActual',
              '$estatus',
              '$observaciones'
              )";
        
        
            $registroVendedor = $conexion->query($asignarNormas);

            echo "LA NORMA " . $listaNormas. " FUE AGREGADA A LA LISTA MAESTRA DEL CLIENTE";
          }//fiN Revision si el cliente tiene la norma
    

  }
}
  
}
?>