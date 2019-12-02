<?php
/**
 * @author Hoang Doan
 * @var string $cookie_bcEmail
 */
$cookie_bcEmail = "BcEmail";
$cookie_bcEmailvalue = "doanhm1@mail.broward.edu";

$cookie_Id = "BcID";
$cookie_Idvalue = "H15003072";

setcookie($cookie_bcEmail, $cookie_bcEmailvalue, time() + (86400 * 14), "/"); // 86400 = 1 day
echo "Cookie BC Email '" . $cookie_bcEmail . "' is set!<br/>";
setcookie($cookie_Id, $cookie_Idvalue, time() + (86400 * 14), "/"); // 86400 = 1 day
echo "Cookie BC ID '" . $cookie_Id . "' is set!<br/>";
?>