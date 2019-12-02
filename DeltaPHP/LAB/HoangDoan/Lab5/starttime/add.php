<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
// including the database connection file
include '../make_connect_db.php';

if (isset($_POST['Submit'])) {
    $stid = $_POST['stid'];
    $time = $_POST['time'];
    $pid = $_POST['pid'];

    // checking empty fields
    if (empty($stid) || empty($time) || empty($pid)) {

        if (empty($stid)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }

        if (empty($time)) {
            echo "<font color='red'>time field is empty.</font><br/>";
        }

        if (empty($pid)) {
            echo "<font color='red'>pid field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO start_time(stid, time, pid) VALUES(:stid, :time, :pid)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':stid', $stid);
        $query->bindparam(':time', $time);
        $query->bindparam(':pid', $pid);
        $query->execute();

        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
