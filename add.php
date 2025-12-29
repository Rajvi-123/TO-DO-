<?php
include "db.php";

$task = $_POST['task'];

if(!empty($task)){
    mysqli_query($conn, "INSERT INTO tasks (task) VALUES ('$task')");
}
?>
