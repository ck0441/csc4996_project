<?php

$host="localhost:3307";
$databaseuser="root";
$password="password";
$databasename="todo_database";
$connection=mysqli_connect($host,$databaseuser,$password,$databasename);

$user_email = $_POST['user_email'];
$user_password= $_POST['user_password'];

$SELECT = "SELECT id From users Where email = ? and password = ? ";
$prepare_statement = $connection->prepare($SELECT);
$prepare_statement->bind_param('ss',$user_email,$user_password); //binds the parameters to the statement
$prepare_statement->execute();
$prepare_statement->bind_result($user_id);

if(!$prepare_statement->fetch())
{
	echo "Email account or password is not valid";
	die();
	
}
else // successful login
{
	session_start(); //makes the session variable available
	$_SESSION['user_id'] = $user_id;
	header("Location: main_list.php");
	die();
}
				
?>