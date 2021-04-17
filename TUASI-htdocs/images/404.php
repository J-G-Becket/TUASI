<?php

/**
 * TUASI 404 Page
 *
 * PHP version 8.0.3
 *
 * @category Search Engine
 * @package  TUASI 1.1.0
 * @author   J.G.Becket <staff@tuasi.com>
 * @license  MIT License
 * @version  1.1.0
 * @link     https://www.tuasi.com/os/
 * @updated  16/04/2021
 */

$httphost = $_SERVER ['HTTP_HOST'];
$useragent = $_SERVER ['HTTP_USER_AGENT'];
$remoteaddy = $_SERVER ['REMOTE_ADDR'];
$lastpage = $_SERVER ['REQUEST_URI'];

echo "<p><h3>".$httphost." Says:</h3></p><br />";
echo "<p><h3>User: </h3>".$useragent."</p><br />";
echo "<p><h3>From: </h3>".$remoteaddy."</p><br />";
echo "<p><h3>You tried to go here: ".$lastpage."</p><br />";
echo "<p><h4>The page you have requested cannot be found and you have landed on ".$httphost."'s 404 Page.</h4></p><br />";
echo "<p><h4>Visit the homepage on <a href='https://".$httphost."/' target='_self' title='visit the homepage'>".$httphost."</a></h4></p>";
?>