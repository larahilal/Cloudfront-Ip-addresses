<?php

$json = file_get_contents('https://ip-ranges.amazonaws.com/ip-ranges.json');

$data = json_decode($json, true);

$cloudFrontIps = array();

foreach($data['prefixes'] as $element) {

    if ($element['service']== 'CLOUDFRONT'){

    	$cloudFrontIps[]= $element['ip_prefix'];
    }

}

foreach($data['ipv6_prefixes'] as $unit){

	if ($unit['service']== 'CLOUDFRONT'){

		$cloudFrontIps[]=$unit['ipv6_prefixes'];
	}

}

print_r($cloudFrontIps);


