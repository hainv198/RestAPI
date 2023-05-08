<?php

if( !function_exists('wp2023_redirect') ){
	function wp2023_redirect($url){
		echo("<script>location.href = '".$url."'</script>");
	}
}