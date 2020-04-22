<?php
	$context = array (
	  'http' => array (
	    'header'=> 'Authorization: Bearer '.$token
	  )
	); 

	$soap_options = array(
	  'ssl'  => [
	    'verify_peer'      => false, 
	    'verify_peer_name' => false
	  ],
	  'soap_version' => '1.0',
	  'encoding' => 'UTF-8',
	  'exceptions' => true,
	  'stream_context' => stream_context_create($context),
	  'trace' => true
	);
?>