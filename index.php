<?php
header('Content-Type: application/json; charset=utf-8');
$ip = $_SERVER['HTTP_HOST'];
$rand = substr(str_shuffle('AaBbCcDDEeFFGGHhIiJjKjLlMmOoPpQQRrSsTuUuVvWwXxYyZz123457890@#1'),0,4); 


is_dir("tmp")?0:mkdir("tmp");
$url = $_GET['url'];
$array = [
'ok'=>true,
'info'=>[
'url'=>"http://".$ip."/tmp/".$rand.".mp4",
],
'by'=>" ~ @html_iq"
];
shell_exec("wget -O 'tmp/".$rand.".mp4' '".$url."'");

echo json_encode($array,128|64|256);
