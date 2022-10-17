<?php

include "connection.php";
$id = $_GET['idnum'];
$sql = "DELETE FROM students WHERE student_id='{$id}' ";

if($connection->query($sql) === true){
    echo "Succes delete";
    header('location: index.php');
}
else{
    echo "unable to delete record";
}
