<?php

/**
 * TUASI User Search Engine Module
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

if ($connTemp->connect_error) {
	die("Connection failed: " . $connTemp->connect_error);
	}
$resultTotal = mysqli_query($connTemp, "select count(1) FROM searchesuser");
$rowTotal = mysqli_fetch_array($resultTotal);
$totalRows = $rowTotal[0];
$_SESSION["fkey"] = $formkey;
echo '<i style="position:absolute; top:2px; left:'.$w5.'; font-size:'.$f11.';"><a href="./" title="Search the database of User Added URLs" target="_self" style="padding-right:25px;">User Added Database</a><a href="./?crawler" title="Search the database of Crawler Added URLs (Beta development)" target="_self" style="">Crawler Added Database (Beta)</a></i><br /><center><i><form action="" method="post" id="Search1" style="width:'.$w2.';">';
echo '<a href="./" target="_self" title="Home" style="border:none; background-color: transparent; outline: none; padding-left:0px; padding-right:15px; padding-top: 5px; padding-bottom: 5px; color:#f6ebff; font-size:'.$f2.';"class="fa" id="search-confirm1"><img src="./images/tuasi-thumb.png" style="width:'.$f8.'; height;'.$f8.'; margin-bottom:'.$h4.';"></img></a>';
echo '<input type="text" value="" name="user_search_query" id="user_search_query" style="width: '.$w4.'; border: 1px solid #f6ebff; background-color: transparent; outline: none; padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom: 5px; color:#f6ebff; font-size:'.$f2.';" class="fa"></input>';
echo '<input type="hidden" value="'.$newIP.'" name="pass_user_ip" id="pass_user_ip"></input>';
echo ' &nbsp; <input style="border:none; background-color: transparent; outline: none; padding-left:5px; padding-right:0px; padding-top: 5px; padding-bottom: 5px; color:#f6ebff; font-size:'.$f2.';"class="fa" id="search-confirm1" type="submit" value="&#xf002;" title="Search"></input>';
echo "<br /><center><i style='font-size:".$f6."; float:left; padding-left: ".$w3."; padding-top:4px;'>";
echo '<input type="radio" id="1" name="searchtype" value="1" checked="checked" required style="border:0; height:'.$h3.';"><label for="1">'.$text1.'</label></input> &nbsp; &nbsp;';
echo '<input type="radio" id="2" name="searchtype" value="2" required style="border:0; height:'.$h3.';"><label for="2">'.$text2.'</label></input> &nbsp; &nbsp;';
echo '<input type="radio" id="3" name="searchtype" value="3" required style="border:0; height:'.$h3.';"><label for="3">'.$text3.'</label></input> &nbsp;&nbsp;';
echo '<input type="radio" id="4" name="searchtype" value="4" required style="border:0; height:'.$h3.';"><label for="4">'.$text4.'</label></input> &nbsp; &nbsp;';
echo '<input type="radio" id="5" name="searchtype" value="5" required style="border:0; height:'.$h3.';"><label for="5">'.$text5.'</label></input> &nbsp; &nbsp;';
echo '<input type="radio" id="6" name="searchtype" value="6" required style="border:0; height:'.$h3.';"><label for="6">'.$text6.'</label></input>';
echo "</i></center>";
echo "</form></i></center>";
if (isset($_POST['user_search_query'])) {
	$newQuery = $_POST['user_search_query'];
	mysqli_real_escape_string($connTemp, $newQuery);
	}
else if (isset($_GET['q'])) {
	$newQuery = $_GET['q'];
	mysqli_real_escape_string($connTemp, $newQuery);
	}
else {
	$skipSearch = 1;
	}
if (!isset($skipSearch)){
	if (isset($_POST['searchtype'])) {
		$newSearchType = $_POST['searchtype'];
		if ($newSearchType == "1"){
			$titleString = "Highest Rated Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE title LIKE '%$newQuery%' OR url LIKE '%$newQuery%' OR description LIKE '%$newQuery%' ORDER BY (rateup - ratedown) DESC, (ratedown + rateup) ASC, timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else if ($newSearchType == "2"){
			$titleString = "Lowest Rated Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE title LIKE '%$newQuery%' OR url LIKE '%$newQuery%' OR description LIKE '%$newQuery%' ORDER BY (ratedown - rateup) DESC, (rateup + ratedown) ASC, timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else if ($newSearchType == "3"){
			$titleString = "Latest Indexed Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE title LIKE '%$newQuery%' OR url LIKE '%$newQuery%' OR description LIKE '%$newQuery%' ORDER BY timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else if ($newSearchType == "4"){
			$titleString = "URL Specific Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE url LIKE '%$newQuery%' ORDER BY timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else if ($newSearchType == "5"){
			$titleString = "Title Specific Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE title LIKE '%$newQuery%' ORDER BY timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else if ($newSearchType == "6"){
			$titleString = "Description Specific Results";
			$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE description LIKE '%$newQuery%' ORDER BY timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
			}
		else {
			echo "Error: Missing search type!";
			die();
			}
		}
	else {
		$titleString = "Highest Rated Results";
		$resultQuery = mysqli_query($connTemp, "SELECT * FROM searchesuser WHERE title LIKE '%$newQuery%' OR url LIKE '%$newQuery%' OR description LIKE '%$newQuery%' ORDER BY (rateup - ratedown) DESC, (ratedown + rateup) ASC, timeurl DESC LIMIT 500") or die(mysqli_error($connTemp));
		}
	echo "<br /><center><table class='atable' style='width:".$w1.";'><th style='border:none; box-shadow:none; background-color:transparent;'>".$titleString.":</th></table></center>";
	echo "<center><div class='scroller' style='height:".$h1."; width:".$w1."; padding-bottom:2px;'>";
	if (!empty(mysqli_fetch_array( $resultQuery ))){
		foreach($resultQuery as $resQuery){
			$newURL = $resQuery['url'];
			$newTitle = $resQuery['title'];
			$newDescription = $resQuery['description'];
			$newPic = $resQuery['picurl'];
			$newTime = $resQuery['timeurl'];
			$newRateUp = $resQuery['rateup'];
			$newRateDown = $resQuery['ratedown'];
			echo "<table class='atable' style='
				width:99.8%;
				color: #f6ebff;
				padding: 2px 2px;
				text-align: left;
				border: 1px solid #293134;
				-webkit-border-radius: 1px 1px 1px 1px; -moz-border-radius: 1px 1px 1px 1px; border-radius: 1px 1px 1px 1px;
				box-shadow: 1px 1px 12px #4b595f, -1px -1px 12px #4b595f, 1px 1px 12px #d5d5d7; word-break: break-all;'>";
			echo "<tr class='atable' style='border:none; box-shadow:none; background-color:transparent; background-image:none;'><td class='atable' style='border:none; box-shadow:none; background-color:transparent; background-image:none;'>";
			echo "<i style='float:right; text-align: right; font-size: ".$f7."; padding-right:2px; margin-top: -10px; margin-bottom:0px; margin-right:-10px; color: gray;' title='Date Indexed'>".$newTime."</i><p style='height:1px; margin:2px; padding:0;'></p>";
			echo "<a href='".$newURL."' target='_blank' style='font-style:normal; font-weight:bold; font-size:".$f3."; margin-left:-1px;'>".$newTitle."</a><br /><font style='color:#00ff00; font-size:".$f4.";'>".$newURL."</font>";
			echo "<br /><font style='color:#d5d5d7; font-size:".$f5."; margin-top:10px;'>";
			echo $newDescription;
			echo "</font></td></tr></table>";
			echo "<table><tr class='atable' style='border:1px solid #fff; box-shadow:none; background-color:transparent; background-image:none;'>";
			echo "<i style='float:right; padding-left:10px; padding-right:10px; padding-top:2px; padding-bottom:6px; text-shadow: 1px 1px #000;'>";
			echo '<form method="post" action="rateurluser.php">';
			echo '<input type="hidden" value="1" name="new_mode">';
			echo '<input type="hidden" value="'.$newURL.'" name="new_url">';
			echo '<input style="border:none; background-color: transparent; outline: none; padding-left:5px; padding-right:5px; color:#238823; font-size:1.5em; text-shadow: 1px 1px #000;"class="fa" id="submit1" type="submit" value="&#xf0a6;" title="Rate URL up?">';
			echo "</form>";
			echo " ".$newRateUp."</i>";
			echo "<i style='float:right; padding-left:10px; padding-right:10px; padding-top:2px; padding-bottom:6px; text-shadow: 1px 1px #000;'>";
			echo '<form method="post" action="rateurluser.php">';
			echo '<input type="hidden" value="2" name="new_mode">';
			echo '<input type="hidden" value="'.$newURL.'" name="new_url">';
			echo '<input style="border:none; background-color: transparent; outline: none; padding-left:5px; padding-right:5px; color:#D2222D; font-size:1.5em; text-shadow: 1px 1px #000;"class="fa" id="submit1" type="submit" value="&#xf0a7;" title="Rate URL down?">';
			echo "</form>";
			echo " ".$newRateDown."</i>";
			echo "</tr>";
			echo "</table>";
			}
		}
	else {
		echo "<br />No hits!";
		}
	echo "</table></center></div>";
	}
else {
	}
echo "<br /><center><i style='position:absolute; left:2%; bottom:".$h2."; font-size:".$f1.";'>Total Indexed URLs: ".number_format($totalRows)."</i><i style='position:absolute; right:2%; bottom:".$h2."; font-size:".$f1.";'><a href='?add' target='_self' title='Add a new URL to the index?'>Add URL</a></i></center>";
?>
