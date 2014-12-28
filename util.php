<?php
	
	include_once 'conf.php';
	
	$tplMessage = "";

	function initLang($languageArray, $language) {

		$lang[$language] = $languageArray['default'];

		foreach ($languageArray['default'] as $key => $value) {
			if(isset($languageArray[$language][$value]) && !empty($languageArray[$language][$value])){
				$lang[$value] = $languageArray[$language][$value];
			}
		}

		return $lang;
	}

	function queryToArray($query) {
		$ret = null;
		foreach ($query as $id => $value) {
		$ret[$id] = array(
			'name'   => $value['name'],
			'time'   => $value['time'],
			'status' => $value['status']);
		}
		
		return $ret;
	}

	function stDate($time, $format) {
		return date($format, $time);
	}

	function setTplMessage($str){
		$GLOBALS['tplMessage'] = $str;
	}

	function goo_gl($longUrl) {
		//http://www.webgalli.com/blog/easily-create-short-urls-with-php-curl-and-goo-gl-or-bit-ly/
		//stolen and modified
		$config       = $GLOBALS['config'];
		$googleApiKey = $config['googleApiKey'];
		$postData = array();

		if (!empty($googleApiKey) && $googleApiKey != '')
			$postData['key'] = $googleApiKey;

		$postData['longUrl'] = $longUrl;

	    $jsonData     = json_encode($postData);
	    $curlObj      = curl_init();

	    curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
	    curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
	   
	    //As the API is on https, set the value for CURLOPT_SSL_VERIFYPEER to false. This will stop cURL from verifying the SSL certificate.
	    curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($curlObj, CURLOPT_HEADER, 0);
	    curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
	    curl_setopt($curlObj, CURLOPT_POST, 1);
	    curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
	   
	    $response = curl_exec($curlObj);
	    $data     = json_decode($response);
	    curl_close($curlObj);

	    return $data->id;
	}

	function rotationToInt($value=''){
		switch (strtoupper($value)) {
			case 'CW':
				return '90'; 
				break;

			case 'CCW':
				return '270'; 
				break;
			
			default:
				return '0';
				break;
		}
	}

?>