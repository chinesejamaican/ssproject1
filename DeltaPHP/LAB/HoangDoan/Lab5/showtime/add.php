<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include '../make_connect_db.php';


if (isset($_POST['Submit'])) {
    $sid = $_POST['sid'];
    $mid = $_POST['mid'];
    $did = $_POST['did'];
    $num_people = $_POST['num_people'];

    // checking empty fields
    if (empty($sid) || empty($mid) || empty($did) || empty($num_people)) {

        if (empty($sid)) {
            echo "<font color='red'>SID field is empty.</font><br/>";
        }

        if (empty($mid)) {
            echo "<font color='red'>mid field is empty.</font><br/>";
        }

        if (empty($did)) {
            echo "<font color='red'>did field is empty.</font><br/>";
        }

        if (empty($num_people)) {
            echo "<font color='red'>num_people field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO show_time(sid, mid, did, num_people) VALUES(:sid, :mid, :did, :num_people)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':sid', $sid);
        $query->bindparam(':mid', $mid);
        $query->bindparam(':did', $did);
        $query->bindparam(':num_people', $num_people);
        $query->execute();


        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
