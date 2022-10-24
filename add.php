<?php
include "connection.php";
include "session.php";

if(isset($_POST['add'])){
    $idNumber = $_POST['idnumber'];
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];
    $mi = $_POST['mi'];
    $age = $_POST['age'];
    $course = $_POST['course']; 
    $sql = "INSERT INTO students(student_id, lastname, firstname, mi, age, course) VALUES('$idNumber', '$lastName', '$firstName', '$mi',' $age','$course')";
    if($connection->query($sql) === true){
        echo "New Student record was successfully saved.";
        header('location: index.php');
    }
    else{
        echo "Unable to save student record due to following error". $connection->connect_error;
        header('location: index.php');
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
    <title>Document</title>
</head>
<body>
    <form action="add.php" method="POST">
    <table width="30%" cellspacing="0">
        <tr>
            <td align="center" colspan="2">New Record</td>
        </tr>
        <tr>
            <td>ID Number</td>
            <td><input type="text" name="idnumber"></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lastname"></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="firstname"></td>
        </tr>
        <tr>
            <td>Middle Initial</td>
            <td><input type="text" name="mi"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age"></td>
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
                <input type="submit" name="add" value="Save">&nbsp;
                <input type="reset" name="reset" value="Clear">
            </td>
        </tr>
        
    </table>
    </form>
</body>
</html>