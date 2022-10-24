<?php 

include "connection.php";
include "session.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Search Result</title>
</head>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <th>ID Number</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middle</th>
            <th>Age</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
        <?php 
        if(isset($_GET['search'])){
            $search_key = $_GET['query'];
            $sql = "SELECT * FROM students WHERE lastname LIKE '%$search_key%' OR firstname LIKE '%$search_key%' ";
            $result = $connection->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    $idnum = $row['student_id'];
                    $lastname = $row['lastname'];
                    $firstname = $row['firstname'];
                    $mi = $row['mi'];
                    $age = $row['age'];
                    $course = $row['course'];
    ?>
            <tr>
                <td><?= $idnum ?></td>
                <td><?= $lastname ?></td>
                <td><?= $firstname ?></td>
                <td><?= $mi ?></td>
                <td><?= $age ?></td>
                <td><?= $course ?></td>
                <td colspan="2">
                    <a href="edit.php?idnum=<?=$idnum;?>">Edit</a>
                    |
                    <a href="delete.php?idnum=<?=$idnum;?>">Delete</a>
                </td>
            </tr>
            <?php 
                    }
            } else {
            ?>
            <tr>
                <td colspan="7"> No record(s) found...</td>
            </tr>
            <?php
                }
            }
        ?>
    </table> 

</body>
</html>
