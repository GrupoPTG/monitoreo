<?php
require_once("../modelo/connect.php");

$estatus=$_POST['estatus'];


$consulta = "SELECT Norcli.norma, Norcli.cliente, Norcli.revisionCliente, Norcli.estatusCliente,Norcli.observaciones,
   Nor.documento, Nor.revisionActual, Nor.sdo, Nor.titulo, Nor.estatus
FROM normacliente Norcli
INNER JOIN normas Nor ON Norcli.norma=Nor.documento WHERE cliente='$cliente' AND estatusCliente='$estatus'";

   ?>
		<section class="vendedor container my-5">
			<h1 class="user-text text-center">LISTA DE REPORTE</h1>
			<div class="row my-5">
				<div class="col-md-6">
					<h5>REPORTE</h5>
				</div>
				<div class="col-md-6">
					<div class="input-group ">
						<input type="text" id="searchTerm" class="form-control" placeholder="Buscar" onkeyup="doSearch()" />
						<span class="input-group-btn">
						<button class="btn btn-search" type="button">
							<img src="../assets/img/magnifier.png" class="calen-img" alt="">
						</button>
					</span>
					</div>
				</div>

			</div>

			<div style="font-size: 13px;" >
					<?php

          			$hacerconsulta = $conexion->query($consulta);
							 
		  				echo "<table class='table table-bordered' id='datos'>";
                        echo "<thead class='bck-thead txt-center'>";
                        echo "<tr>";
                        echo "<th><input type='checkbox'  class='check' id='checkAll'></th>";
                        echo "<th> SDO/ORG </th>";
                        echo "<th>CODIGOS</th>";
                        echo "<th>REVISION CLIENTE </th>";
                        echo "<th> REVISION ACTUAL</th>";
                        echo "<th>TITULO DE NORMA</th>";
						echo "<th> ESTATUS NORMA </th>";
						echo "<th> ESTATUS CLIENTES </th>";
						echo "<th> OBSERVACIONES</th>";
						echo "<th> OPCIONES </th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
						echo "</tr>";						
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
							echo "<td style='text-align: center'>                            
                         	 <input type='checkbox' class='check' aria-label='Checkbox for following text input' name='usersID[]' value='".$reg[0]."'> </td>";
                            echo "<td align='center' >".$reg['sdo']."</td>";
							echo "<td align='center' >".$reg['norma']."</td>";
							echo "<td align='center' >".$reg['revisionCliente']."</td>";
							echo "<td align='center' >".$reg['revisionActual']."</td>";
                            echo "<td align='center' >".$reg['titulo']."</td>";
                            echo "<td align='center' >".$reg['estatus']."</td>";
                            echo "<td align='center' >".$reg['estatusCliente']."</td>";
							echo "<td align='center' >".$reg['observaciones']."</td>";
							
					
							echo "<td  align='center' >					
                                <form action='editarNormas.php' method='post' style='display: inline-block;' >
                                    <input type='hidden' name='cliente' value=".$cliente.">		
									<input type='hidden' name='norma' value=".$reg['norma'].">
									<input type='image' name='imageField' src='../assets/img/magnifier.png' width='20px' />
								</form>	
                            </td>";//FIN DEL echo
                      
                           

							
					


              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							echo "</tr>";
							}
							echo "</table>";
							

							?>
								</div>
							</div>
								
  			<div class="col-md-12 p-0">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <a href="javascript:myFunction()" class="btn btn-trash p-1">ELIMINAR SELECCIÓN |  <img src="../assets/img/trash-can.png" class="wdt-form" alt=""></a>
                    </div>
                </div>

            </div>
							</section>