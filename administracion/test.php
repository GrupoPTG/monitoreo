<?php




function diferenciaDias($inicio, $fin)
{
    $inicio = strtotime($inicio);
    $fin = strtotime($fin);
    $dif = $fin - $inicio;
    $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
    return ceil($diasFalt);
}

$inicio = date("Y-m-d"); 
$fin = "2018-11-22";
 
echo diferenciaDias($inicio, $fin);

?>