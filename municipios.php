<?php
//municipios.php?term=xona
require_once('Conexiones/local.php'); //CLASEPARA CONECTAR A LA BD
if ( !isset ($_REQUEST['term'] ) )
   exit;
$sql = "select id_municipio AS 'id', nombre_municipio AS 'Municipio' from municipios 
		where nombre_municipio like '%$term%' or id_municipio like '%$term%'" ;
$result = $conex->listaObjetos($sql); //CONSULTA A LA BASE DE DATOS
if ( count($result) < 0 )
  exit;
$data = array();
foreach ($result as $r)
{	
  $data[] = array ( 'label' =>$r->Municipio, 
  					'value' =>$r->Municipio
				); //ALMACENA LOS DATOS EN UN ARRAY
}
echo json_encode($data); // TRASFORMA EL ARREGLO EN FORMATO JSON Y LO MUESTRA.
flush();
?>