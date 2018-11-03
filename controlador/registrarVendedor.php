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
<<<<<<< HEAD
  
 
  

 
=======
  $cliente=$_POST['cliente'];
>>>>>>> 48fea412ae2a4dd66f5d6951347cc9777aeb7f37


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
      echo "El Vendedor fue registrado con exito";
  }else{
      echo "El Vendedor no fue registrado por favor consulte con el administrador";
  }



     //Consulta obtener el ultimo ID de vendedor registrado
     $ultimoIdVendedor ="SELECT MAX(id) AS id FROM vendedor";
     $resultado = $conexion->query($ultimoIdVendedor);
     if ($row = $resultado->fetch_row() ){
           $code = trim($row[0]);
           $vendedorId = $code++;
         }



<<<<<<< HEAD
         if(isset($_POST['cliente']))
         {
           $cliente=$_POST['cliente'];
           for($i=0; $i<sizeof($cliente); ++$i){

            $clienteName = $cliente[$i];
        
             $clienteName;
        
            $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
              '',
              '$vendedorId',
              '$clienteName',
              '',
              ''
              )";
            $registroVendedor = $conexion->query($registrarVendedor);
        
          }

           
         }
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
       

 
=======


  for($i=0; $i<sizeof($cliente); ++$i){

    $clienteName = $cliente[$i];

     $clienteName;


    $registrarVendedor = "INSERT INTO vendedorcliente VALUES (
      '',
      '$vendedorId',
      '$clienteName',
      '',
      ''
      )";


    $registroVendedor = $conexion->query($registrarVendedor);

  }
>>>>>>> 48fea412ae2a4dd66f5d6951347cc9777aeb7f37

}//existe registrar vendedor?

?>



