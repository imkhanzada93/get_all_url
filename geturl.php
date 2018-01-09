<?php

	function get_url($url, $link, $i){	
		$data = strip_tags(file_get_contents($url), "<a>");

		$d = preg_split("/<\/a>/",$data);
		foreach ($d as $k => $u){
		    if( strpos($u, "<a href=") !== FALSE ){
		        $u = preg_replace("/.*<a\s+href=\"/sm","",$u);
		        $u = preg_replace("/\".*/","",$u);
		        $u = explode(':', $u);

		        if(($u[0] == 'http')||($u[0] == 'https')){
		        	$u = implode(':', $u);
		        	if(!in_array($u, $link)){
			        	print $i . ') ' . $u ."\n";
			        	array_push($link, $u);
			        	$i++;
		        	}
		        }
		    }
		}
	}
	$i = 1;
	$link = array(); 
	$url="https://www.mala.ae";
	get_url($url, $link, $i);
?>