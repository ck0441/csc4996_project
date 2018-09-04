
<?php
$user_email = $_POST['user_email'];
$user_password= $_POST['user_password'];
$retype_password = $_POST['retype_password'];

if(!empty($user_email) || !empty($user_password) || !empty($retype_password))
{
	$host="localhost:3307";
	$databaseuser="root";
	$password="password";
	$databasename="todo_database";
	$connection=mysqli_connect($host,$databaseuser,$password,$databasename);
	if(mysqli_connect_error())
	{
		die('Connect Error(' . mysqli_connect_errno(). ')' . mysqli_connect_error());
		
	}
	else
	{
		if($user_password!=$retype_password)
		{
			echo "The passwords don't match";
			die();
		}
	
		$SELECT = "SELECT email From users Where email = ? Limit 1";
		$INSERT = "INSERT INTO users (email,password) values(?,?)";
		
		$prepare_statement = $connection->prepare($SELECT); //take the select statement and make sure its correct
		$prepare_statement->bind_param('s',$user_email); //user email goes to ? line 26
		$prepare_statement->execute();
		$prepare_statement->bind_result($user_email);
		$prepare_statement->store_result();
		$regnumber = $prepare_statement->num_rows;
		
		if($regnumber==0) //if result is empty
		{
			$prepare_statement->close();
		
			$prepare_statement = $connection->prepare($INSERT);
			$prepare_statement->bind_param('ss',$user_email, $user_password);
			$prepare_statement->execute();
			
		}
		else
		{
			echo "Email account has already been used";
			die();
		}
		//$prepare->close();
		//$connection->close();
	}
}	
else
{
	echo "all fields are required";
	die();
}

/*if(isset($_POST['submit'])) //checks if submit button clicked
{
	$username=$_POST['user_email'];
	$password=$_POST['user_password'];
	$reenterpassword=$_POST['retype_password'];
}*/
	
		
		


	?>		
