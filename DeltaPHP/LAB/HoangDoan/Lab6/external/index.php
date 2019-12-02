<?php 
//extract data from the post
//set POST variables
$url = 'http://ss1.ciwcertified.com/cgi-bin/process.pl';
$_POST['name'] = "Hoang Doan";
$_POST['school'] = "Broward College";
$_POST['program'] = "Computer Science";
$fields_string="";

$fields = array(
    'name' => urlencode($_POST['name']),
    'school' => urlencode($_POST['school']),
    'program' => urlencode($_POST['program']),
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
curl_exec($ch);
//close connection
curl_close($ch);

?>