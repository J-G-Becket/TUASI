<?php

/**
 * TUASI Spider URL Scraper
 *
 * PHP version 8.0.3
 *
 * @category   Search Engine
 * @package    TUASI Search Engine
 * @author     John G. Becket, Esq. <staff@tuasi.com>
 * @copyright  Copyright (c) 2021 John G. Becket, Esq.
 * @license    MIT License - LICENSE.TXT - https://opensource.org/licenses/MIT 
 * @version    1.1.0
 * @link       https://www.tuasi.com/?opensource
 * @updated    17/04/2021
 */

include('config.php');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['user_add_url'])){
$newUrl = $_POST['user_add_url'];
}
else if (isset($_GET['url'])) {
$newUrl = $_GET['url'];
}
else {
die();
}
if (filter_var($newUrl, FILTER_VALIDATE_URL)) {
mysqli_real_escape_string($conn, $newUrl);
function file_get_contents_curl($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
return utf8_decode($data);
}
if (preg_match("/mailto:/", $newUrl)){
die();
}
if (preg_match("/ftp:/", $newUrl)){
die();
}
if (preg_match("/archive.org/", $newUrl)){
die();
}
if (preg_match("/amazon.com/", $newUrl)){
die();
}
if (preg_match("/scribd.com/", $newUrl)){
die();
}
if (preg_match("/taobao.com/", $newUrl)){
die();
}
if (preg_match("/mail.ru/", $newUrl)){
die();
}
if (!empty($newUrl)){
$html = file_get_contents_curl($newUrl);
}
else {
	die();
}
$doc = new DOMDocument();
if (!empty($html)){
@$doc->loadHTML($html);
}
else {
die();
}
$nodes = $doc->getElementsByTagName('title');
if (!empty($nodes->item(0)->nodeValue)){
$title = $nodes->item(0)->nodeValue;
}
else {
$title = $newUrl;
die();
}
$metas = $doc->getElementsByTagName('meta');
for ($i = 0; $i < $metas->length; $i++){
$meta = $metas->item($i);
if($meta->getAttribute('name') == 'description')
$description = $meta->getAttribute('content');
if($meta->getAttribute('name') == 'keywords')
$keywords = $meta->getAttribute('content');
}
if(!empty($title)){
mysqli_real_escape_string($conn, $title);
$title = addslashes($title);
$title = strip_tags($title);
}
else {
$title = $newUrl;
}
if(!empty($description)){
mysqli_real_escape_string($conn, $description);
$description = addslashes($description);
$description = strip_tags($description);
}
else {
$description = "";
}
if (isset($_POST['pass_user_ip'])){
$uIP = $_POST['pass_user_ip'];
}
else {
$uIP = null;
}
if (isset($_POST['pass_user_node'])){
$uNode = $_POST['pass_user_node'];
}
else {
$uNode = "staff";
}
$title = LTRIM(RTRIM($title));
$pattern1 = "/404/i";
if (preg_match($pattern1, $title)){
die();	
}
$pattern2 = "/redirecting/i";
if (preg_match($pattern2, $title)){
die();	
}
$pattern3 = "/not found/i";
if (preg_match($pattern3, $title)){
die();	
}
$pattern4 = "/403/i";
if (preg_match($pattern4, $title)){
die();	
}
$pattern5 = "/access denied/i";
if (preg_match($pattern5, $title)){
die();	
}
$pattern6 = "/update your browser/i";
if (preg_match($pattern6, $title)){
die();	
}
$pattern7 = "/your request/i";
if (preg_match($pattern7, $title)){
die();	
}
$pattern8 = "/page not found/i";
if (preg_match($pattern8, $title)){
die();	
}
$pattern9 = "/you have been blocked/i";
if (preg_match($pattern9, $title)){
die();	
}
$pattern10 = "/not be found/i";
if (preg_match($pattern10, $title)){
die();	
}
$pattern11 = "/<script>/i";
if (preg_match($pattern11, $title)){
die();	
}
$pattern12 = "/<script>/i";
if (preg_match($pattern12, $description)){
die();	
}
$pattern13 = "/<script>/i";
if (preg_match($pattern12, $newUrl)){
die();	
}
mysqli_set_charset($conn,"UTF8");
$titleQuery = "INSERT INTO searches (url,title,description,firstip,firstuser) VALUES ('$newUrl','$title','$description','$uIP','$uNode') ON DUPLICATE KEY UPDATE title = '$title', description = '$description', incount = (incount + 1);";
if ($conn->query($titleQuery) === TRUE) {
echo $newUrl." - Indexed".PHP_EOL;
die();
}
}
else {
die();
}
mysqli_close($conn);
die();
?>