<?php

/**
 * TUASI Spider Actionator
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

set_time_limit(300);
function customError($errno, $errstr){
	}
set_error_handler("customError");
function getCurlData($url){
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
	$contents = curl_exec($ch);
	curl_close($ch);
	return $contents;
	}
include('config.php');
if ($connTemp->connect_error) {
	die("Connection failed: " . $connTemp->connect_error);
	}
$resultsTemp = mysqli_query($connTemp, "SELECT url FROM searches ORDER BY RAND() LIMIT 1") or die(mysqli_error($connTemp));
if(!empty(mysqli_fetch_array( $resultsTemp ))){
	foreach($resultsTemp as $resTemp){
		$thisTime = $resTemp['url'];
		$thisCount = $resTemp['incount'];
		}
	}
if ($thisCount > 5){
die();
}
$urlContent = @file_get_contents($thisTime);
$dom = new DOMDocument();
@$dom->loadHTML($urlContent);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
for($i = 0; $i < $hrefs->length; $i++){
	$href = $hrefs->item($i);
	$url = $href->getAttribute('href');
	$url = filter_var($url, FILTER_SANITIZE_URL);
	if(!filter_var($url, FILTER_VALIDATE_URL) === false){
		$url2 = "https://www.tuasi.com/scrapeauto.php?url=".$url."";
		$htm = getCurlData($url2);
		echo $htm;
		}
	}
mysqli_close($connTemp);
?>