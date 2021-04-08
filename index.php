<?php
header('Content-Type: application/json; charset=utf-8');
$ip = "108.160.139.70";
is_dir("tmp")?0:mkdir("tmp");
$url = $_GET['url'];
preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
$id = $matches[1];
$url =json_decode(file_get_contents("https://api.snappea.com/v1/video/details?url=".$url),true);
if(isset($url['videoInfo']['title'])){
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
shell_exec("wget -O 'tmp/".$id.".mp4' '".$url['videoInfo']['downloadInfoList'][4]['partList'][0]['urlList'][0]."'");
}else{
$array = [
'ok'=>false,
'message'=>"Bad Request",
'by'=>" ~ @html_iq"
];
}
echo json_encode($array,128|64|256);
