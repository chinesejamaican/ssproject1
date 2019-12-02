<?php
$cookie_bcEmail = "BcEmail";
$cookie_Id = "BcID";


unset($_COOKIE[$cookie_bcEmail]);
setcookie($cookie_bcEmail, "", time() - 3600);

unset($_COOKIE[$cookie_Id]);
setcookie($cookie_Id, "", time() - 3600);
?>
<?php
echo "Cookie 'BC Email' is deleted. <br/>";
echo "Cookie 'BC ID' is deleted.";
?>
