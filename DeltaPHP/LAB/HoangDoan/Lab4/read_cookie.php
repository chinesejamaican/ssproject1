<?php
/**
 * @author Hoang Doan
 * @var string $cookie_bcEmail
 */
$cookie_bcEmail = "BcEmail";
$cookie_Id = "BcID";
if(!isset($_COOKIE[$cookie_bcEmail]) && !isset($_COOKIE[$cookie_Id])) {
    echo "Cookie BC Email '" . $cookie_bcEmail . "' is not set!";
    echo "Cookie BC ID '" . $cookie_Id . "' is not set!";
} else {
    echo "Cookie BC Email '" . $cookie_bcEmail . "' is set!<br/>";
    echo "Value is: " . $_COOKIE[$cookie_bcEmail]. "<br/>";
    
    echo "Cookie BC ID '" . $cookie_Id . "' is set!<br/>";
    echo "Value is: " . $_COOKIE[$cookie_Id];
}
?>
