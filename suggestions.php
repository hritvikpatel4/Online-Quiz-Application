<!DOCTYPE html>
<html>
	<head>
		<title>Test-Suggestions</title>
		<link rel="stylesheet" type="text/css" href="font.css">
		<link rel="stylesheet" type="text/css" href="suggestions.css">
		<?php
			$db = mysqli_connect('localhost','root','','suggestions');
			if($db)
				echo '<br><br>connected<br/>';
			$feedback="";
			$errors = array();
			if (isset($_POST['SUBMIT'])) {
				$feedback = mysqli_real_escape_string($db,$_POST['suggestion']);
				if (empty($feedback)) {
					echo "No suggestion has been given";
				}
				else {
					echo "Suggestion has been submitted successfully";
					$sql = "INSERT INTO inputs (Feedback) VALUES ('".$feedback."')";
					mysqli_query($db,$sql);
				}
			}
		?>
	</head>
	<body onload="myFunction()">
		<div id="loader"></div>
		<div style="display:none;" id="myDiv" class="animate-bottom">
		<div class="navbar">
		<a href="login.html">Home</a>
		<a href="suggestions.html">Suggestions</a>
		<a href="faqs.html">FAQs</a>
		</div><br><br><br>
		<form id="form1" action="suggestion.php" method="POST">
			<div id="input">
				<h3 style="color:DodgerBlue;">Help us make this website better by providing your suggestions.</h3><br>
				<textarea name="suggestion" rows="10" cols="50"></textarea><br>
			</div>
			<div id="submit">
				<input id="button" type="submit" name="SUBMIT" value="SUBMIT"  ><br>
			</div>
		</form>
		<script>
			var myVar;
			function myFunction() {
				myVar = setTimeout(showPage, 1500);
			}
			function showPage() {
				document.getElementById("loader").style.display = "none";
				document.getElementById("myDiv").style.display = "block";
			}
		</script>
	</body>
</html>
