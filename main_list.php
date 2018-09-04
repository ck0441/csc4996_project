
<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
		Register
		<form action="task_outcome.php" method="POST"> 
			<table cellspacing="15px" border="0px"> 
			
				<tr> <!--table row-->
					<td>Enter task<td>
					<td><input type="text" name="task" /></td>
				</tr>
				<tr>
					<td>Complete by<td>
					<td><input type="date" name="date" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="submit" /></td>
				</tr>
			
			</table>
		</form>
		<?php
$host="localhost:3307";
$databaseuser="root";
$password="password";
$databasename="todo_database";
$connection=mysqli_connect($host,$databaseuser,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error(' . mysqli_connect_errno(). ')' . mysqli_connect_error());
	
}
session_start();
$prepare_statement = $connection->prepare("SELECT task,date FROM tasks WHERE user_id = ?"); //creates statement  object


$prepare_statement->bind_param('i',$_SESSION['user_id']);
$prepare_statement->execute();

//$prepare_statement->execute([$_SESSION['user_id']]); another way to execute


$prepare_statement->bind_result($task,$date);

while($prepare_statement->fetch()) // while it can fetch info,
{
	echo $task . " " . $date . "\n<br>"; 
	
	
	
}




		?>	
	</body>
</html>

