<?php

/**
 * TUASI Spider Configuration
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

/* Spider Start Table */
$sdbname = "searchesuser";

$conn = new mysqli($servername, $username, $password, $dbname);
$connTemp = $conn;
?>
