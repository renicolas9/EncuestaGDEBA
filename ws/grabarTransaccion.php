
<?php
  ini_set("soap.wsdl_cache_enabled", 0);
  array('cache_wsdl' => WSDL_CACHE_NONE);
  require('../config/token.php');
  $token = obtenerToken();
  include('../config/config.php');
?>

<?php

 
/*$datos['calif1'] = $_POST['calif1'];
$datos['preg1'] = $_POST['preg1'];
$datos['calif2'] = $_POST['calif2'];
$datos['preg2'] = $_POST['preg2'];
$datos['calif3'] = $_POST['calif3'];
$datos['preg3'] = $_POST['preg3'];*/


$datos['calif1'] = 5;
$datos['preg1'] = 5;
$datos['calif2'] = 5;
$datos['preg2'] = 5;
$datos['calif3'] = 5;
$datos['preg3'] = 5;



try {
  $url = "https://iop.hml.gba.gob.ar/servicios/GDEBA/1/SOAP/transaccion";
  $client = new SoapClient($url."?wsdl", $soap_options);
  $client->__setLocation($url);
  $datosTransaccion = generarDatosTransaccion($datos);
  $info = $client->grabar($datosTransaccion);
  var_dump($info);
} catch (SoapFault $fault) {
  echo "<br> SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring}) ";
}

?>






<?php

function generarDatosTransaccion($datos){

	//ID_FORM: 208818
	//ID 		ORDER 	NAME
	//288569	0		sep1 
	//288570	1		calif1 
	//288571	2		preg1 
	//288572	3		sep2 
	//288573	4		calif2 
	//288574	5		preg2 
	//288575	6		sep3 
	//288576	7		calif3 
	//288577	8		preg3 

	$orden = 0;
	$campos[] = array('idFormComp'=>288570,'inputName' => 'calif1', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorInt' => );
	$orden++;
	$campos[] = array('idFormComp'=>288571,'inputName' => 'preg1', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorStr' => );
	$orden++;
	$campos[] = array('idFormComp'=>288573,'inputName' => 'calif2', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorInt' => );
	$orden++;
	$campos[] = array('idFormComp'=>288574,'inputName' => 'preg2', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorStr' => );
	$orden++;
	$campos[] = array('idFormComp'=>288576,'inputName' => 'calif3', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorInt' => );
	$orden++;
	$campos[] = array('idFormComp'=>288577,'inputName' => 'preg3', 'ordenInterno' => $orden ,'revelanciaBusqueda' => '0', 'valorStr' => );

	return array(
	    'arg0' => array(
	        "estadoVisibilidad" => generarJSONVisibilidad(),
	        "fechaCreacion" => '',
	        "nombreFormulario" => 'FFCC_Encuesta_GDEBA_TEST_v1',
	        "subsanar" => json_encode(
	            array(
	                "nombreComponentes" => array()
	            )
	        ),
	        "uuid" => '', //valorFormComps representa a cada componente a cargar.
	        'valorFormComps' => $campos
	    )
	);
}



function generarJSONVisibilidad(){

	$visibilidad = array(
		"calif1"=> array(
            "estadoVisible"=> true
        ),
        "preg1"=> array(
            "estadoVisible"=> true
        ),
        "calif2"=> array(
            "estadoVisible"=> true
        ),
        "preg2"=> array(
            "estadoVisible"=> true
        ),
        "calif3"=> array(
            "estadoVisible"=> true
        ),
        "preg3"=> array(
            "estadoVisible"=> true
        )
	);

	return json_encode($visibilidad);
}

?>		