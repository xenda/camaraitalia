<?php

// json_decode
if ( !function_exists('json_decode') ){
    include_once ICL_PLUGIN_PATH . '/lib/JSON.php';
    function json_decode($data, $bool) {
        if ($bool) {
            $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
        } else {
            $json = new Services_JSON();
        }
        return( $json->decode($data) );
    }
}   

if(!function_exists('_cleanup_header_comment')){
    function _cleanup_header_comment($str) {
        return trim(preg_replace("/\s*(?:\*\/|\?>).*/", '', $str));
    } 
}
?>
