<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
include '../make_connect_db.php';

if (isset($_POST['Submit'])) {
    $did = $_POST['did'];
    $day = $_POST['day'];

    // checking empty fields
    if (empty($did) ||  empty($day)) {

        if (empty($did)) {
            echo "<font color='red'>Vendor ID field is empty.</font><br/>";
        }

        if (empty($day)) {
            echo "<font color='red'>day field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO date_of_week(did, day) VALUES(:did, :day)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':did', $did);
        $query->bindparam(':day', $day);
        $query->execute();


        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
