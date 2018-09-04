<?php

$host="localhost:3307";
$databaseuser="root";
$password="password";
$databasename="todo_database";
$connection=mysqli_connect($host,$databaseuser,$password,$databasename);
session_start();
$INSERT = "INSERT INTO tasks (task,date,user_id) values(?,?,?)";
$prepare_statement = $connection->prepare($INSERT);
$prepare_statement->bind_param('ssi',$_POST['task'],$_POST['date'],$_SESSION['user_id']); //binds the parameters to the statement
$prepare_statement->execute();

header("Location: main_list.php");
?>