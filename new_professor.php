<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>

<div class="heading">
<h1>Lowa State University</h1>
<h2>LMS</h2>

</div>

<form method="post" action="submit_professor.php"><fieldset>
	<legend><h3>Register New Professor</h3></legend>
	<br>
	<input type="text" name="fname" placeholder="Enter Your First Name" required> &nbsp;
	<input type="text" name="lname" placeholder="Enter Your Last Name" required> 
	<br><br>
	Select Gender :
	<input type="radio" name="gender" value="Male">Male 
	<input type="radio" name="gender" value="Female">Female
	<br><br>
	<input type="text" name="nic" placeholder="Enter Your NIC" required> &nbsp;
	<input type="text" name="tel" placeholder="Enter Your Telephone">
	<br><br>
	Enter Your Username :
	<input type="text" name="username_p" required>
	<br><br>
	Enter Your Password :
	<input type="Password" name="password_p" required> &nbsp; 
	<input type="Password" name="passwordconfirm_p" placeholder="Confirm Password" required>
	<?php
		if (isset($_GET['password'])) {
			if ($_GET['password']=='incorrect') {
				?>

				<h4 style="color: red">* Password Mismatch</h4>
				<?php
			}
		}
		?>
	<br>
	<input class="button" type="submit" name="action" value="Register">
	<input  class="button reset" type="reset" value="Clear">
</fieldset>
</form>


</body>
</html>