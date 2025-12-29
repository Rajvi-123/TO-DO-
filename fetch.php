<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM tasks");

while($row = mysqli_fetch_assoc($result)){
    echo "<p>
            {$row['task']}
            <button onclick='deleteTask({$row['id']})'>Delete</button>
            <button onclick='editTask({$row['id']}, \"{$row['task']}\")'>Update</button>
          </p>";
}
?>
