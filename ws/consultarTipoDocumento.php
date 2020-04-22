<?php
  ini_set("soap.wsdl_cache_enabled", 0);
  array('cache_wsdl' => WSDL_CACHE_NONE);
  require('../config/token.php');
  $token = obtenerToken();
  include('../config/config.php');
?>

<?php

$acronimo = $_POST['acronimo'];
try {
  $url = "https://iop.hml.gba.gob.ar/servicios/GDEBA/1/SOAP/consultaTipoDocumento";
  $client = new SoapClient($url."?wsdl", $soap_options);
  $client->__setLocation($url);
  $info = $client->consultarTipoDocumento(
    array(
        'acronimo' => $acronimo
    )
  );
  var_dump($info);
} catch (SoapFault $fault) {
  echo "<br> SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring}) ";
}

?>