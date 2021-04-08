<?php
header('Content-Type: application/json; charset=utf-8');
$ip = $_SERVER['HTTP_HOST'];
is_dir("tmp")?0:mkdir("tmp");
$url = $_GET['url'];
$array = [
'ok'=>true,
'info'=>[
'id'=>$id,
'title'=>$url['videoInfo']['title'],
'thumb'=>$url['videoInfo']['thumbnail'],
'viewsCount'=>$url['videoInfo']['viewCount'],
'url'=>"http://".$ip."/tmp/".$id.".mp4",
],
'by'=>" ~ @html_iq"
];
shell_exec("wget -O 'tmp/".$id.".mp4' '".$url."'");

echo json_encode($array,128|64|256);
