<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
    <a class="new-btn" href="add.php">New Student</a>
    <table width="60%" border="1" cellspacing="0" align="center">
        <tr>
            <td>ID number</td>
            <td>Last Name</td>
            <td>First Name</td>
            <td>MI</td>
            <td>Age</td>
            <td>Course</td>
            <td>Actions</td>
        </tr>
        <?php
        $sql = "SELECT * FROM students";
        $result = $connection->query($sql) ;

        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
        ?>
                <tr>
                    <td> <?= $row['student_id'] ?> </td>
                    <td> <?= $row['lastname'] ?> </td>
                    <td> <?= $row['firstname'] ?> </td>
                    <td> <?= $row['mi'] ?> </td>
                    <td> <?= $row['age'] ?> </td>
                    <td> <?= $row['course'] ?> </td>
                    <td>
                        <a href="edit.php?idnum=<?= $row['student_id'] ?>">Edit</a>  
                    | 
                        <a href="delete.php?idnum=<?= $row['student_id']?>">
                    Delete                                                                                                                   
                </a>
                </td>
                </tr>
        <?php }
        }
        else{
            ?>
                    <tr>
                        <td class="edit" colspan="7">No record to show</td>
                    </tr>
        <?php
        }
            $connection->close();
        ?>
    </table>
</body>

</html>