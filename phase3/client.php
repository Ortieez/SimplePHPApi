<?php

require("../utils/functions.php");
$url = "http://localhost/math.api/utils/add";
$data = array('numbers' => [1, 10, 4], "dttm" => date('Y-m-d h:i:s'));

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

echo $result;
?>