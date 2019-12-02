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
    $tid = $_POST['tid'];
    $seats = $_POST['seats'];

    // checking empty fields
    if (empty($sid) || empty($tid) || empty($seats)) {

        if (empty($sid)) {
            echo "<font color='red'>SID field is empty.</font><br/>";
        }

        if (empty($tid)) {
            echo "<font color='red'>tid field is empty.</font><br/>";
        }

        if (empty($seats)) {
            echo "<font color='red'>seats field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO screen(sid, tid, seats) VALUES(:sid, :tid, :seats)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':sid', $sid);
        $query->bindparam(':tid', $tid);
        $query->bindparam(':seats', $seats);
        $query->execute();


        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
