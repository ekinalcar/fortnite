function curl_get($url, array $get = NULL,$retry_count = 0) {  
    global $curl_count;
	
	$defaults = array( 
		CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
		CURLOPT_HEADER => 1, 
		CURLOPT_RETURNTRANSFER => TRUE, 
        CURLOPT_TIMEOUT =>500 ,
        CURLOPT_FOLLOWLOCATION => FALSE,
        CURLOPT_HTTPHEADER => array('Authorization: Bearer YOUR_API_KEY,Accept: application/vnd.api+json')
	); 
    
	$ch = curl_init(); 
	
	curl_setopt_array($ch, ($defaults));
	
	if( ! $response = curl_exec($ch)) 
	{ 
		trigger_error(curl_error($ch)); 
	} 
    
	$curl_info 		= curl_getinfo($ch);
        
	$header_size 	= get_value($curl_info,"header_size");
	$response_code 	= get_value($curl_info,"http_code");
	
	$headers		= substr($response, 0, $header_size);
	$result 		= substr($response, $header_size);
    
	$new_headers = array();
    
	if(!empty($headers)){
		$headers = explode("\r\n",$headers);
		foreach($headers as &$header_val){
			$header_val = explode(":",$header_val);
			if(!empty($header_val[0])){
				$key = trim($header_val[0]);
				$new_headers[$key] = trim(implode(":",array_splice($header_val,1)));
				
				if(in_array($key,array("x-ratelimit-limit","x-ratelimit-remaining","x-ratelimit-reset"))){
					$new_headers[$key] = explode(",",$new_headers[$key]);
				}
			}
		}
	}
	$headers = $new_headers;
    
    $rate_limits_exceeded = array("app"=>array());
    $rate_limits_test = array("app"=>array());
    
	if(!empty($headers["x-ratelimit-limit"]) && !empty($headers["x-ratelimit-remaining"])){
        if(empty($headers["x-ratelimit-remaining"])){
            $rate_limits_exceeded["app"][] = $headers["x-ratelimit-limit"][0]. "-" .$headers["x-ratelimit-remaining"][0];
        }else{
            $rate_limits_test["app"][] = $headers["x-ratelimit-limit"][0]. "-" .$headers["x-ratelimit-remaining"][0];
        }
	}
    
	if(!empty($rate_limits_exceeded["app"])){
		
	}
    
	curl_close($ch); 
	$curl_count ++;
	return json_decode($result,true);
} 
