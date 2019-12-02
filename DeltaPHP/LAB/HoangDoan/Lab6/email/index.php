<form name="contactform" method="post" action="index.php">
	<table width="450px">
		<tr>
			<td valign="top"><label for="name_lbl">Name *</label></td>
			<td valign="top"><input type="text" name="name" maxlength="50"
				size="30"></td>
		</tr>

		<tr>
			<td valign="top"><label for="email_lbl">Email Address *</label></td>
			<td valign="top"><input type="text" name="email" maxlength="80"
				size="30"></td>
		</tr>

		<tr>
			<td valign="top"><label for="complaint_title_lbl">Complaint Title *</label></td>
			<td valign="top"><input type="text" name="complaint_title"
				maxlength="80" size="30"></td>
		</tr>

		<tr>
			<td valign="top"><label for="complant_message_lbl">Complaint Message
					*</label></td>
			<td valign="top"><textarea name="complant_message" maxlength="1000"
					cols="25" rows="6"></textarea></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><input type="submit"
				value="Submit"></td>
		</tr>
	</table>
</form>

<?php
if (isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "hoangdoand@gmail.com";
    $email_subject = "Email from PHP";

    function died($error)
    {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if (! isset($_POST['name']) || ! isset($_POST['email']) || ! isset($_POST['complaint_title']) || ! isset($_POST['complant_message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $complaint_title = $_POST['complaint_title']; // not required
    $complant_message = $_POST['complant_message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (! preg_match($email_exp, $email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (! preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }

    if (strlen($complant_message) < 2) {
        $error_message .= 'The Complaint you entered do not appear to be valid.<br />';
    }

    if (strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array(
            "content-type",
            "bcc:",
            "to:",
            "cc:",
            "href"
        );
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Complaint title: " . clean_string($complaint_title) . "\n";
    $email_message .= "Complaints: " . clean_string($complant_message) . "\n";

    // create email headers
    $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

<!-- include your own success html here -->
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
}
?>