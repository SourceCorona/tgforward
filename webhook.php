<?php

/**
* By @K6KKK - @GMBots
**/
$webhook = file_get_contents("php://input");
$useragent = urldecode($_GET['userAgent']) ?? "Mozilla/5.0 (Linux; Android 10; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36";
if($webhook === null or $_GET['url'] === null){
die("Bad Request");
}
echo shell_exec("curl -A '$useragent' -d ".escapeshellarg($webhook)." -L ".escapeshellarg($_GET['url']));
