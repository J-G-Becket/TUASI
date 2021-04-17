<?php

/**
 * TUASI User Add URL Form Module
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

echo '<br /><center><i><form action="scrapeuser.php" method="post" id="Search1" style="width:'.$w2.'; padding-left:30px;">';
echo '<input type="url" value="" name="user_add_url" id="user_add_url" style="width: 80%; border: 1px solid #f6ebff; background-color: transparent; outline: none; padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom: 5px; color:#f6ebff; font-size:'.$f2.';" class="fa" required>';
echo '<input type="hidden" value="'.$newIP.'" name="pass_user_ip" id="pass_user_ip">';
echo ' &nbsp; <input style="border:none; background-color: transparent; outline: none; padding-left:5px; padding-right:5px; padding-top: 3px; padding-bottom: 12px; color:#f6ebff; font-size:'.$f2.';" class="fa" id="add-confirm1" type="submit" value="&#xf067;" title="Add a new URL to Tuasi!">';
echo "</form></i></center>";
echo "<br /><center><i style='position:absolute; left:45%; bottom:".$h2."; font-size:".$f1.";'>www.tuasi.com © 2020-2021</i><i style='position:absolute; right:2%; bottom:".$h2."; font-size:".$f1.";'><a href='./' target='_self' title='Return home?'>Return Home</a></i></center>";
?>