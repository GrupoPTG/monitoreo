<?php
require_once("../modelo/connect.php");

 $num=$_POST['dias'];

 $resultado = intval(preg_replace('/[^0-9]+/', '', $num), 10);


$consulta = "SELECT * FROM normas_actualizadas WHERE fecha >= date_sub(curdate(), interval $resultado day)";


   ?>
	<section class=" my-4  ">
        <h1 class="user-text text-center">REPORTE</h1>
            <div class="row my-12">
                    <div class="col-md-4">
                    <div class="input-group ">
                        <input type="text" id="searchTerm" class="form-control" onkeyup="doSearch()" placeholder="Buscar" />
                        <span class="input-group-btn">
                            <button class="btn btn-search" type="button">
                                <img src="../assets/img/magnifier.png" class="calen-img" alt="">
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="col-md-1 offset-md-3"><i class="fas fa-download"></i></div>
                    <div class="col-md-1"><i class="fas fa-print"></i></div>
               
            </div>
					<?php

          $hacerconsulta = $conexion->query($consulta);
							 
		  echo "<table class='table table-bordered' id='datos'>";
		  echo "<thead class='bck-thead txt-center'>";
		  echo "<tr>";
		  echo "<th> ID </th>";
		  echo "<th>DOCUMENTO</th>";
		  echo "<th>TITULO DE CLIENTE</th>";;
		  echo "<th> FECHA </th>";
		  echo "</tr>";
		  echo "</thead>";
		  echo "<tbody  style='font-size: 15px;'>";
		  echo "<tr>";
		  echo "</tr>";
							
							
              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							
							while ($reg)
							{
							echo "<tr>";
                            echo "<td align='center' >".$reg[0]."</td>";
							echo "<td align='center' >".$reg[1]."</td>";
							echo "<td align='center' >".$reg[2]."</td>";
							echo "<td align='center' >".$reg[3]."</td>";
 
							




              //$reg = mysql_fetch_array($hacerconsulta,MYSQL_BOTH);
              $reg=$hacerconsulta->fetch_array();
							echo "</tr>";
							}
							echo "</table>";
							

							?>
								</div>
								
								</div>



			<div class="offset-md-5">
            <form method="post" action="reportesmensuales/reporte.php">
            <input type="hidden"  class="btn btn-send btn-col1 m-1" value="<?php echo $cliente ?>"  type="submit" name="cliente"/>
            <input type="submit"  class="btn btn-send btn-col1 m-1" value="Enviar Reporte"  type="submit" name="reporte"/>
            </form>
        </div>
    </section> 
							