<?php
if(isset($_POST['createVendedor'])){

$largo=5;
  $str = "abcdefghijklmnopqrstuvwxyz";
  $may = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $num = "1234567890";
  $cad = "";
  # Comienzo de la generacion de clave.
  $cad = substr($may ,rand(0,24),1);
  $cad .= substr($num ,rand(0,10),1);
  $cad .= substr($num ,rand(0,10),1);
  for($i=0; $i<$largo; $i++) {
  $cad .= substr($str,rand(0,24),1);
  }
  ;

  
  $nombreVendedor= $_POST['vendedor'];
  $emailVendedor=$_POST['correo'];
  $telefono=$_POST['telefono'];
  $territorio=$_POST['territorio'];
  
 
  

 


  $registrarVendedor = "INSERT INTO vendedor VALUES (
    '',
    '$nombreVendedor',
    '$telefono',
    '$emailVendedor',
    '$cad',
    '$territorio'
    )";

  
require ("../modelo/connect.php");
  //Consulta Registrar Usuario
  if($conexion->query($registrarVendedor)!==False){
    ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
          <div class="modal-content">
            <div class="modal-body">
              El Vendedor fue registrado con exito
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
    ?>
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block; width:100%;" >
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
          <div class="modal-content">
            <div class="modal-body">
            El Vendedor no fue registrado por favor consulte con el administrador
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarVentana()">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
          </div>
        </div>
      </div>
    <?php
  }



     //Consulta obtener el ultimo ID de vendedor registrado
     $ultimoIdVendedor ="SELECT MAX(id) AS id FROM vendedor";
     $resultado = $conexion->query($ultimoIdVendedor);
     if ($row = $resultado->fetch_row() ){
           $code = trim($row[0]);
           $vendedorId = $code++;
         }



         if(isset($_POST['cliente']))
         {
          require ("../modelo/connect.php");
           $cliente=$_POST['cliente'];
           for($i=0; $i<sizeof($cliente); ++$i){

            $clienteName = $cliente[$i];
        
             $clienteName;

             $sql = "SELECT * FROM usuarios WHERE cliente='$clienteName'";
              $resultado = $conexion->query($sql);
              $fila=$resultado->fetch_assoc();
                
                  $clienteId =$fila['id'];
                  $email =$fila['emailCliente'];
                  $pais =$fila['pais'];
        
            $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
              '',
              '$vendedorId',
              '$clienteName',
              '$clienteId',
              '$email',
              '$pais'
              )";
            $registroVendedor = $conexion->query($registrarVendedor);
        
          }

           
         }
         /*
         else{
            $cliente="vendedor sin clientes";

           $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
            '',
            '$vendedorId',
            '$cliente',
            '',
            ''
            )";
          $registroVendedor = $conexion->query($registrarVendedor);
         }
         */
       

 

}//existe registrar vendedor?

?>



