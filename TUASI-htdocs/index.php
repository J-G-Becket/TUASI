<?php

/**
 * TUASI Search Engine UI
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
echo "<html style='height:100vh; width:100vw; margin:0;'><head>";
echo '<title>'.$siteNamed.'</title>';
echo '<meta property="og:image" content="https://'.$siteHost.'/'.$siteImage.'"/>';
echo '<meta name="description" content="'.$siteDescription.'"/>';
echo '<meta property="og:title" content="'.$siteNamed.'"/>';
echo '<meta property="og:description" content="'.$siteDescription.'"/>';
echo '<meta property="og:url" content="https://'.$siteHost.'/">';
echo "<meta name='viewport' content='width=device-width, initial-scale=0.86, user-scalable=1'>";
echo "<link rel='shortcut icon' href='".$siteIcon."' type='image/x-icon'/>";
echo "<link rel='icon' href='".$siteIcon."' type='image/gif'/>";
echo "<link rel='stylesheet' type='text/css' href='css/style.css'/>";
echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.12.1/css/all.css'>";
echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.12.1/css/v4-shims.css'>";
echo '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
echo "</head><body>";
$newIP = $_SERVER ['REMOTE_ADDR'];
function isMobileAgain() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}
if(isMobileAgain()){
	$mobTrue = 1;
	}
if (!empty($mobTrue)){
	$w1 = "98%";
	$w2 = "90%";
	$w3 = "14%";
	$w4 = "70%";
	$w5 = "19%";
	$h1 = "73vh";
	$h2 = "1px";
	$h3 = "0.5em";
	$h4 = "-5px";
	$f1 = "0.6em";
	$f2 = "2.0em";
	$f3 = "0.8em";
	$f4 = "0.5em";
	$f5 = "0.7em";
	$f6 = "0.5em";
	$f7 = "0.6em";
	$f8 = "35px";
	$f9 = "1.2em";
	$f10 = "0.9em";
	$f11 = "0.6em";
	$text1 = "Up";
	$text2 = "Down";
	$text3 = "Latest";
	$text4 = "URL";
	$text5 = "Title";
	$text6 = "Desc";
	}
else {
	$w1 = "60%";
	$w2 = "60%";
	$w3 = "10.1%";
	$w4 = "80%";
	$w5 = "26.1%";
	$h1 = "76%";
	$h2 = "1%";
	$h3 = "0.9em";
	$h4 = "-7px";
	$f1 = "1.0em";
	$f2 = "3.0em";
	$f3 = "1.0em";
	$f4 = "0.9em";
	$f5 = "0.9em";
	$f6 = "0.9em";
	$f7 = "0.8em";
	$f8 = "50px";
	$f9 = "1.5em";
	$f10 = "1.2em";
	$f11 = "0.8em";
	$text1 = "Upvoted";
	$text2 = "Downvoted";
	$text3 = "Latest";
	$text4 = "URL";
	$text5 = "Title";
	$text6 = "Description";
	}
if (isset($_GET['add'])) {
	include("modules/addnew.php");
	die();
	}
else if (isset($_GET['crawler'])) {
	include("modules/search.php");
	die();
	}
else {
	include("modules/searchu.php");
	}
echo "</body>";
echo "</html>";
?>