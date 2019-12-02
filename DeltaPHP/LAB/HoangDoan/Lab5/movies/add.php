<html>
<head>
<title>Add Data</title>
</head>

<body>
<?php
// including the database connection file
include '../make_connect_db.php';

if (isset($_POST['Submit'])) {
    $mid = $_POST['mid'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $length = $_POST['length'];

    // checking empty fields
    if (empty($mid) || empty($title) || empty($genre) || empty($length)) {

        if (empty($mid)) {
            echo "<font color='red'>Vendor ID field is empty.</font><br/>";
        }

        if (empty($title)) {
            echo "<font color='red'>Title field is empty.</font><br/>";
        }

        if (empty($genre)) {
            echo "<font color='red'>genre field is empty.</font><br/>";
        }

        if (empty($length)) {
            echo "<font color='red'>length field is empty.</font><br/>";
        }

        // link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        // insert data to database
        $sql = "INSERT INTO moives(mid, title, genre, length) VALUES(:mid, :title, :genre, :length)";
        $query = $dbConn->prepare($sql);

        $query->bindparam(':mid', $mid);
        $query->bindparam(':title', $title);
        $query->bindparam(':genre', $genre);
        $query->bindparam(':length', $length);
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $title, ':email' => $email, ':age' => $age));

        // display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>
