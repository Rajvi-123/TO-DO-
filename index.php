<!DOCTYPE html>
<html>
<head>
    <title>AJAX Todo List</title>
</head>
<body>

<h2>My Todo List</h2>

<input type="text" id="task" placeholder="Enter task">
<button onclick="addTask()">Add</button>

<div id="taskList"></div>

<script>
    function loadTasks(){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch.php", true);
        xhr.onload = function(){
            document.getElementById("taskList").innerHTML = this.responseText;
        };
        xhr.send();
    }

    loadTasks(); // load tasks on page load



    
function addTask(){
    let task = document.getElementById("task").value;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "add.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function(){
        document.getElementById("task").value = "";
        loadTasks();
    };

    xhr.send("task=" + task);
}

function deleteTask(id){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "delete.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function(){
        loadTasks();
    };

    xhr.send("id=" + id);
}


function editTask(id, task){
    document.getElementById("task").value = task;

    let btn = document.querySelector("button");
    btn.innerText = "Update";

    btn.onclick = function(){
        let updatedTask = document.getElementById("task").value;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "update.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function(){
            document.getElementById("task").value = "";
            btn.innerText = "Add";
            btn.onclick = addTask;
            loadTasks();
        };

        xhr.send("id=" + id + "&task=" + updatedTask);
    };
}





</script>

</body>
</html>
