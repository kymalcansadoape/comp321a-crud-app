<?php
    include "connection.php";
    include "session.php";

    $queryId = $_GET['idnum'];

    $sql = "SELECT * FROM students WHERE student_id = '$queryId'";
    $result = $connection->query($sql);
    $field = $result->fetch_assoc();

    if(isset($_POST['update'])){
        $studentId = $_POST['idnumber'];
        $lastName = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mi = $_POST['mi'];
        $age = $_POST['age'];
        $course = $_POST['course'];

        $sql = "UPDATE students SET lastname='{$lastName}', firstname='{$firstname}', mi='{$mi}', age='$age', course='$course' WHERE student_id='{$studentId}'";

        if($connection->query($sql) === true){
            header('location: index.php');
        }
        else{
            echo "wala ni uopda";
        }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>edit</title>
</head>
<body>
<form action="" method="POST">
    <table width="30%" cellspacing="0">
        <tr>
            <td align="center" colspan="2">Edit Record</td>
        </tr>
        <tr>
            <td>ID Number</td>
            <td><input type="text" name="idnumber" value="<?= $field['student_id'] ?>"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lastname" value="<?= $field['lastname'] ?>"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="firstname" value="<?= $field['firstname'] ?>"></td>
        </tr>
        <tr>
            <td>Middle Initial</td>
            <td><input type="text" name="mi" value="<?= $field['mi'] ?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age" value="<?= $field['age'] ?>"></td>
        </tr>
        <tr>
            <td>Course</td>
            <td>
            <select name="course" id="">
                <option value="BSET">BSET</option>
                <option value="BSCPE">BSCPE</option>
                <option value="BSIT">BSIT</option>
                <option value="BSCS">BSCS</option>
            </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="update" value="Update">&nbsp;  
            </td>
        </tr>
    </table>
    </form>
</body>
</html>