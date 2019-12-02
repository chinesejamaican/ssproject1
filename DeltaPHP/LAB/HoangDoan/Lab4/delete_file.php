<?php
$folder = "uploads/";
if(isset($_POST['delete_file']))
{
    echo "yyyyyyyyyyy";
    $filename = $_POST['file_name'];
    unlink($folder.$filename);
}
else{
    echo "aaaaaaaa";
}
?>