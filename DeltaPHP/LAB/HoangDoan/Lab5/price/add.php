<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include '../make_connect_db.php';

if (isset($_POST['Submit'])) {
    $pid = $_POST['pid'];
    $cost = $_POST['cost'];

    // checking empty fields
    if (empty($pid) || empty($cost)) {

        if (empty($pid)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }

        if (empty($cost)) {
            echo "<font color='red'>cost field is empty.</font><br/>";
        }


        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO vendors(pid, cost) VALUES(:pid, :cost)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':pid', $pid);
        $query->bindparam(':cost', $cost);
        $query->execute();


        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
