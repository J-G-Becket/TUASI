<?php

/**
 * TUASI Main Configuration
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

/* Database Configuration */

/* Database IP:Port */
$servername = "127.0.0.1:3306";

/* Database Username */
$username = "root";

/* Database Password */
$password = "root";

/* Database Name */
$dbname = "database";

/* Forms Key (20 characters) */
$formkey = "aaaaaaaaaabbbbbbbbbb";

$fsplit1 = substr($formkey,0,10);
$fsplit2 = substr($formkey,11,20);
$fmid = date('Y-m-d');
$formkey = $fsplit1.$fmid.$fsplit2;
$formkey = sha1($formkey);

$conn = new mysqli($servername, $username, $password, $dbname);
$connTemp = $conn;
/* Website Configuration */

/* Website Name */
$siteNamed = "TUASI Search Engine"; 

/* Website Description */
$siteDescription = "TUASI Search Engine";

/* Website Domain */
$siteHost = "www.tuasi.com";

/* Website Icon */
$siteIcon = "images/TUASI-icon.ico";

/* Website Icon */
$siteImage = "images/TUASI-promo-hq.jpg";

?>
