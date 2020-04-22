<?php 

ini_set("soap.wsdl_cache_enabled", 0);
array('cache_wsdl' => WSDL_CACHE_NONE);
require('../config/token.php');
$token = obtenerToken();
include('../config/config.php');

$calificaciones = $_POST['calificaciones'];
$respuestas = $_POST['respuestas'];

// echo json_encode($calificaciones);
// echo json_encode($respuestas);

//echo generarJSONVisibilidad();

// $datos['calif1'] = 5;
// $datos['preg1'] = "asd";
// $datos['calif2'] = 5;
// $datos['preg2'] = "asd";
// $datos['calif3'] = 5;
// $datos['preg3'] = "asd";


try {
  $url = "https://iop.hml.gba.gob.ar/servicios/GDEBA/1/SOAP/transaccion";
  $client = new SoapClient($url."?wsdl", $soap_options);
  $client->__setLocation($url);
  $datosTransaccion = generarDatosTransaccion($datos);
  //print_r($datosTransaccion);
  //print("<pre>".print_r($datosTransaccion,true)."</pre>");
  $info = $client->grabar($datosTransaccion);  
  //print(json_encode($info,JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE));
  print_r($info);
} catch (SoapFault $fault) {
  echo "<br> SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring}) ";
}

?>






<?php

function generarDatosTransaccion_old($datos){
	//ID_FORM: 208818
	//ID ORDER NAME
	//288569 0 sep1 
	//288570 1 calif1 
	//288571 2 preg1 
	//288572 3 sep2 
	//288573 4 calif2 
	//288574 5 preg2 
	//288575 6 sep3 
	//288576 7 calif3 
	//288577 8 preg3 
	$orden = 0;
	$campos[] = array('idFormComp'=>'288570','inputName' => 'calif1', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[0]);
	$orden++;
	$campos[] = array('idFormComp'=>'288571','inputName' => 'preg1', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[0]);
	$orden++;
	$campos[] = array('idFormComp'=>'288573','inputName' => 'calif2', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[1]);
	$orden++;
	$campos[] = array('idFormComp'=>'288574','inputName' => 'preg2', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[1]);
	$orden++;
	$campos[] = array('idFormComp'=>'288576','inputName' => 'calif3', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[2]);
	$orden++;
	$campos[] = array('idFormComp'=>'288577','inputName' => 'preg3', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[2]);

	return array(
	    'request' => array(
	        "estadoVisibilidad" => generarJSONVisibilidad(),
	        "fechaCreacion" => '',
	        "nombreFormulario" => 'FFCC_Encuesta_GDEBA_TEST_v2',
	        "subsanar" => '',
	        "uuid" => '',
	        'valorFormComps' => $campos,
	    )
	);
}




function generarDatosTransaccion($datos){
	$FFCC = 'FFCC_Encuesta_GDEBA_TEST_v2'
	/*
	'FFCC_Encuesta_GDEBA_TEST_v2'; --ID 208810
	288657	calif1
	288658	resp1
	288660	calif2
	288661	resp2
	288663	calif3
	288664	resp3
	288666	prioridades
	288668	resplibre
	*/
	$orden = 0;
	$campos[] = array('idFormComp'=>'288657','inputName' => 'calif1', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[0]);
	$orden++;
	$campos[] = array('idFormComp'=>'288658','inputName' => 'resp1', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[0]);
	$orden++;
	$campos[] = array('idFormComp'=>'288660','inputName' => 'calif2', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[1]);
	$orden++;
	$campos[] = array('idFormComp'=>'288661','inputName' => 'resp2', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[1]);
	$orden++;
	$campos[] = array('idFormComp'=>'288663','inputName' => 'calif3', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $calificaciones[2]);
	$orden++;
	$campos[] = array('idFormComp'=>'288664','inputName' => 'resp3', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[2]);
	$orden++;
	$campos[] = array('idFormComp'=>'288666','inputName' => 'prioridades', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[3]);
	$orden++;
	$campos[] = array('idFormComp'=>'288668','inputName' => 'resplibre', 'ordenInterno' => $orden ,'relevanciaBusqueda' => '0', 'valorStr' => $respuestas[4]);

	return array(
	    'request' => array(
	        "estadoVisibilidad" => generarJSONVisibilidad(),
	        "fechaCreacion" => '',
	        "nombreFormulario" => $FFCC,
	        "subsanar" => '',
	        "uuid" => '',
	        'valorFormComps' => $campos,
	    )
	);
}


function generarJSONVisibilidad(){

	$visibilidad = array(
		"calif1"=> array(
	        "estadoVisible"=> true
	    ),
	    "resp1"=> array(
	        "estadoVisible"=> true
	    ),
	    "calif2"=> array(
	        "estadoVisible"=> true
	    ),
	    "resp2"=> array(
	        "estadoVisible"=> true
	    ),
	    "calif3"=> array(
	        "estadoVisible"=> true
	    ),
	    "resp3"=> array(
	        "estadoVisible"=> true
	    ),
	    "prioridades"=> array(
	        "estadoVisible"=> true
	    ),
	    "resplibre"=> array(
	        "estadoVisible"=> true
	    )
	);
	return json_encode($visibilidad);
}

?>