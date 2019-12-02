<?php

$folder = "uploads/";
if ($dir = opendir($folder))
{
    while (($file = readdir($dir)) !== false)
    {
        if ($file != "." && $file != "..") {
            echo "<form method='post' action='list_file_upload.php'>";
            echo $file. " ";
            echo "<input type='hidden' name='file_name' value='".$file."'>";
            echo "<input type='submit' name='delete_file' value='Delete File'>";
            echo "</form>";
        }
    }
    closedir($dir);
}
?>


<?php
echo "<b>Result:</b>  <br/>";
$folder = "uploads/";
if(isset($_POST['delete_file']))
{
   $filename = $_POST['file_name'];
   unlink($folder.$filename) or die("Couldn't delete file");;
   echo "Delete file: ".$folder.$filename;
}
else{
    echo "No action.";
}
?>
