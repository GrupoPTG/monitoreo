


<?php

if(isset($_POST['asignarNorma'])){

 require_once("../modelo/connect.php");
  $normas = $_POST['documento'];
  $cliente = $_POST['cliente'];

if($cliente=="Seleccionar.."){
  ?>
            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
                  <div class="modal-content">
                    <div class="modal-body">
                    DEBE SELECCIONAR UN CLIENTE PARA CARGAR UNA NORMA
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
                      <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                  </div>
                </div>
              </div>
            <?php
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
          $sustituida= $fila['sustituida'];
          $revisionActual= $fila['revisionActual'];
          $estatus= $fila['estatus'];
          $observaciones= $fila['observaciones'];
          $r = $fila['r'];
          $e= $fila['e'];
          $strz=$fila['strz'];
          $crgo=$fila['crgo'];
          $add=$fila['adds'];
          $tc=$fila['tc'];
          $amd=$fila['amd'];
          $erta=$fila['erta'];


          $sql2 = "SELECT * FROM normacliente WHERE norma='$listaNormas' and cliente='$idCliente'";
          $resultado2 = $conexion->query($sql2);
          $rowcount=mysqli_num_rows($resultado2);
          if($rowcount>0){
            ?>
            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
                  <div class="modal-content">
                    <div class="modal-body">
                    <?php  echo "EL CLIENTE YA POSEE LA NORMA ". $listaNormas."<br>"; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
                      <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                  </div>
                </div>
              </div>
            <?php
            
          }else{
            
            $asignarNormas = "INSERT INTO normacliente VALUES (
              '',
              '$listaNormas',
              '$idCliente',
              '$sdo',
              '$sustituida',
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
            ?>
            <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
                  <div class="modal-content">
                    <div class="modal-body">
                    <?php   echo "LA NORMA " . $listaNormas. " FUE AGREGADA A LA LISTA MAESTRA DEL CLIENTE"; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
                      <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                  </div>
                </div>
              </div>
            <?php

          }//fiN Revision si el cliente tiene la norma
    

  }
}
  
}
?>