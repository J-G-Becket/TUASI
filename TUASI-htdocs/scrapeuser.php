<?php

/**
 * TUASI User URL Scraper
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
function file_get_contents_curl($url)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
if (preg_match("/mailto:/", $newUrl)){
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
die();
}
}
if (preg_match("/ftp:/", $newUrl)){
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
die();
}
}
if (preg_match("/mailto:/", $newUrl)){
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
die();
}
}
if (preg_match("/www.amazon.com/", $newUrl)){
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
die();
}
}
$html = file_get_contents_curl($newUrl);
$doc = new DOMDocument();
@$doc->loadHTML($html);
$nodes = $doc->getElementsByTagName('title');
if (!empty($nodes->item(0)->nodeValue)){
$title = $nodes->item(0)->nodeValue;
}
else {
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
die();
}
}
$metas = $doc->getElementsByTagName('meta');
for ($i = 0; $i < $metas->length; $i++)
{
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
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern2 = "/redirecting/i";
if (preg_match($pattern2, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern3 = "/not found/i";
if (preg_match($pattern3, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern4 = "/403/i";
if (preg_match($pattern4, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern5 = "/access denied/i";
if (preg_match($pattern5, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern6 = "/update your browser/i";
if (preg_match($pattern6, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern7 = "/your request/i";
if (preg_match($pattern7, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern8 = "/page not found/i";
if (preg_match($pattern8, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern9 = "/you have been blocked/i";
if (preg_match($pattern9, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern10 = "/not be found/i";
if (preg_match($pattern10, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern11 = "/<script>/i";
if (preg_match($pattern11, $title)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern12 = "/<script>/i";
if (preg_match($pattern12, $description)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$pattern13 = "/<script>/i";
if (preg_match($pattern12, $newUrl)){
if (isset($_SERVER['HTTP_REFERER'])){
mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
mysqli_close($conn);
die();
}
}
$titleQuery = "INSERT INTO searchesuser (url,title,description,firstip,firstuser) VALUES ('$newUrl','$title','$description','$uIP','$uNode') ON DUPLICATE KEY UPDATE title = '$title', description = '$description', incount = (incount + 1);";
if ($conn->query($titleQuery) === TRUE) {
echo $newUrl." - Indexed".PHP_EOL;
if (isset($_SERVER['HTTP_REFERER'])){
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
}
}
else {
echo "Failure!";
echo $title;
echo "<br />";
echo $description;
echo "<br />";
echo "Error message = ".mysqli_error($conn);
}
mysqli_close($conn);
die();
}
?>