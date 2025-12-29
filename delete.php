<?php
include "db.php";

$id = $_POST['id'];
mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
?>
