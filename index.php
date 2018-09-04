<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
		Register
		<form action="signup_outcome.php" method="POST"> 
			<table cellspacing="15px" border="0px"> 
			
				<tr> <!--table row-->
					<td>Email<td>
					<td><input type="text" name="user_email" /></td>
				</tr>
				<tr>
					<td>Password<td>
					<td><input type="password" name="user_password" /></td>
				</tr>
				<tr>
					<td>Retype the Password<td>
					<td><input type="password" name="retype_password" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="submit" /></td>
				</tr>
			
			</table>	
		</form>
		Login
		<form action="login.php" method="POST"> 
			<table cellspacing="15px" border="0px"> 
				<tr>
					<td>Email<td>
					<td><input type="text" name="user_email" /></td>
				</tr>
				<tr>
					<td>Password<td>
					<td><input type="password" name="user_password" /></td>
				</tr>
				
				<tr>
					<td><input type="submit" name="submit" value="submit" /></td>
				</tr>
					
			</table>
		</form>
	</body>
</html>
