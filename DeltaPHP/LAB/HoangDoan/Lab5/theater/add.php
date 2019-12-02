<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
// including the database connection file
include '../make_connect_db.php';

if (isset($_POST['Submit'])) {
    $tid = $_POST['tid'];
    $title = $_POST['title'];
    $location = $_POST['location'];

    // checking empty fields
    if (empty($tid) || empty($title) || empty($location)) {

        if (empty($tid)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }

        if (empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if (empty($location)) {
            echo "<font color='red'>Location field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO theater(tid, title, location) VALUES(:tid, :title, :location)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':tid', $tid);
        $query->bindparam(':title', $title);
        $query->bindparam(':location', $location);
        $query->execute();

        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
