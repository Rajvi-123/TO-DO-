<?php
include "db.php";

$id = $_POST['id'];
$task = $_POST['task'];

mysqli_query($conn, "UPDATE tasks SET task='$task' WHERE id=$id");
?>
