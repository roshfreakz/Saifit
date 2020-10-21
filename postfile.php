<?php

$filedir = "img/user/";
$name = time();
$data = $_REQUEST['base64data'];
$image = explode('base64,', $data);

file_put_contents($filedir . $name . ".jpg", base64_decode($image[1]));
echo $name . ".jpg";
