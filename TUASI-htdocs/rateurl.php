<?php

/**
 * TUASI Spider Added URL Rater
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

if (!empty($_POST)) {
	$URLToRate = $_POST['new_url'];
	include('config.php');
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
	mysqli_real_escape_string($conn, $URLToRate);
	if ($_POST['new_mode'] == 1){
		$resultsEXP = "INSERT INTO searches (url) VALUES ('$URLToRate') ON DUPLICATE KEY UPDATE rateup = rateup + 1;";	
		}
	else if ($_POST['new_mode'] == 2){
		$resultsEXP = "INSERT INTO searches (url) VALUES ('$URLToRate') ON DUPLICATE KEY UPDATE ratedown = ratedown + 1;";
		}
	else {
		die();
		}
	if ($conn->query($resultsEXP) === TRUE) {
		}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
else {
	echo "Post data failed! <font style='color:#ff0000;'><i class='fas fa-times'></i></font><br />";
	die();
	}
?>