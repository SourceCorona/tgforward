<?php

/**
* By @K6KKK - @GMBots
**/
header('Content-Type: application/json; charset=utf-8');
$webhook = file_get_contents("php://input");
if($webhook === null or $_GET['url'] === null){
die("Bad Request");
}
echo shell_exec("curl -d ".escapeshellarg($webhook)." -L ".escapeshellarg($_GET['url']));
