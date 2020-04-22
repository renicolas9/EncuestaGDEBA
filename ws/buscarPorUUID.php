<?php
  ini_set("soap.wsdl_cache_enabled", 0);
  array('cache_wsdl' => WSDL_CACHE_NONE);
  require('../config/token.php');
  $token = obtenerToken();
  include('../config/config.php');
?>

<?php

$uuid = $_POST['uuid'];
//echo $cuit;

try {
  $url = "https://iop.hml.gba.gob.ar/servicios/GDEBA/1/SOAP/transaccion";
  $client = new SoapClient($url."?wsdl", $soap_options);
  $client->__setLocation($url);
  $info = $client->buscarPorUUID(
    array(
        'uuid' => $uuid
    )
  );
  var_dump($info);
} catch (SoapFault $fault) {
  echo "<br> SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring}) ";
}

//}

?>