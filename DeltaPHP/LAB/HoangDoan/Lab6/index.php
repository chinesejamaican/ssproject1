<?php
/**
 * @author HoangDoan
 * 
 * 
 * Create a folder named lab6 in your development environment. In this folder, create a sub-folder called email and a folder called external.

 In the email folder do the following:

 Create a web form using PHP that will allow a customer to fill out a complaint about service received. The following infornation must be filled in by the customer:
 Customer Name
 Customer Email
 Complaint Title
 Complaint Message
 In the web form, create a hidden field that has a value corresponding to an email account that the complaint will be sent to.
 The action of the web form must be a PHP script that emails the information entered into the form to the following:
 The email account in the hidden field of the form. The message of the email must include all the information filled in by the custome.
 The customer with an appropriate confrimation message that their complaint has been received.
 In the external folder do the following:

 Create a web page using PHP that makes a call to http://ss1.ciwcertified.com/cgi-bin/process.pl using the curl_init() function.
 Pass the following parameters:
 Name
 School
 Program of Study
 Use the curl_exec() function to execute the call.
 Display the response returned by the call. (See example below)
 */
?>