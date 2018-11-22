<!DOCTYPE html>
<html>
	<head>
		<title>Test-Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="font.css">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body onload="myFunction()">
		<?php
			$host='localhost';
			$user='root';
			$pass='';
			$db='phpgang';
			$con=mysqli_connect($host,$user,$pass,$db);
			if($con)
			if(isset($_POST['action']))	
			{
				if($_POST['action']=="login") 
				{
					$srn =mysqli_real_escape_string($con,$_POST['SRN']);
					$password = mysqli_real_escape_string($con,$_POST['PASSWORD']);
					$strSQL = mysqli_query($con,"select password from users where srn='".$srn."'");
					$Results = mysqli_fetch_array($strSQL);
					if($strSQL)
					{
						if(gettype($Results)==NULL)
						{
							echo "Invalid username or password!!";
						}
						else if(gettype($Results)!=NULL) 
						{
							if($password==$Results['password'])
							{
								echo $Results['password']."<br/>"." Login Sucessfully!!";
								echo "<script> location.href='question.html'; </script>";
								exit;
							}	
							else
							{
								echo "<em style='color:red;position:absolute;top:15%'>INVALID USERNAME OR PASSWORD</em>";
							}
						}
					}        
				}
				else if($_POST['action']=="signup")
				{
					$name = mysqli_real_escape_string($con,$_POST['name']);
					$srn = mysqli_real_escape_string($con,$_POST['SRN']);
					$password = mysqli_real_escape_string($con,$_POST['password']);
					$query = "SELECT name FROM users where name='".$name."'";
					$result = mysqli_query($con,$query);
					$numResults = mysqli_num_rows($result);
					if($numResults>=1)
					{
						$message = $name." name already exist!!";
					}
					else
					{
						$id=1;
						$query ="INSERT INTO users (name,srn,password) values('".$name."','".$srn."','".$password."')" ;
						echo "<br/>".$query."<br/>";
						if(mysqli_query($con,$query))
						{
							echo "<br/>Signup Sucessfully!!";
							echo "<script> location.href='login.html'; </script>";
						}
					}
				}
			}
		?>
		<div id="loader"></div>
		<div style="display:none;" id="myDiv" class="animate-bottom">
			<div class="navbar">
				<a href="login.html">Home</a>
				<a href="suggestions.html">Suggestions</a>
				<a href="faqs.html">FAQs</a>
			</div>
			<form name="login" id="form1" action="sign_in_up.php" method="POST">
				<div id="input">
					<input id="name" type="text" name="SRN" maxlength="20"  placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USERNAME" autofocus="on" required><br><br>
					<input id="pass" type="password" name="PASSWORD" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASSWORD"  autocomplete="on" required><br>
				</div>
				<input name="action" type="hidden" value="login" /></p>
				<div id="submit">
					<input id="button" onclick="valid()" type="submit" name="SUBMIT" value="&nbsp;LOGIN&nbsp;"><br/><br/>
					<button id="signup" onclick="link()">SIGN UP</button>
					<div id="mes"></div>
				</div>
			</form>
		</div>
		<script>
			var myVar;
			function myFunction() {
				myVar = setTimeout(showPage, 1500);
			}
			function showPage() {
			document.getElementById("loader").style.display = "none";
			document.getElementById("myDiv").style.display = "block";
			}
			function valid(event)
			{
				if(document.getElementById("name").value=="")
					document.getElementById("mes").innerHTML = "Enter valid Username";
				else if( document.getElementById("pass").value == "")
					document.getElementById("mes").innerHTML = "Enter Password";
			}
			function link()
			{
				location.href='signup.html';
			}
		</script>
	</body>
</html>