<?php
header('Content-type: text/javascript');
echo (isset($_GET['mobile'])) ? 'document.mobile = true;'."\n\n\n" : '';
include('jquery-1.4.1.min.js');
echo "\n\n\n";
include('jquery.colorbox-min.js');
echo "\n\n\n";
include('jquery.dd.js');
echo "\n\n\n";
include('layout.js');
?>