<?php

function obtenerToken(){
  $headers = array(
    'Content-Type:application/json',
    'Authorization: Basic '. base64_encode("user:password") // <---
  );
  $service_url = 'https://iop.hml.gba.gob.ar/servicios/JWT/1/REST/jwt';
  $username="WS_GDEBA_HML_DPMA_WSTESTGDEBA";
  $password="dpma*123";
  $ch = curl_init($service_url);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $return = curl_exec($ch);
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $header = substr($return, 0, $header_size);
  $body = substr($return, $header_size);
  return $body;
}
 
?>
