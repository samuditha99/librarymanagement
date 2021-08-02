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



	<center>
		<table style="text-align: center; align-items: center;" width="70%">
			<tr>
				<td>
					<h3>Student Login</h3>
					<img src="images/student.png" width="110"><br><br>
					<form method="POST" action="loginstudent.php">
						<input type="text" name="user_s" placeholder="Username Here">
						<br><br>
						<input type="Password" name="pass_s" placeholder="Password Here">
						<br><br>
						<input class="button" type="submit" name="action" value="Log">
						<input  class="button reset" type="reset" value="Clear">
					</form>
					<a href="new_student.php">Click Here For Register</a>

				</td>
				<td>
					<h3>Professor Login</h3>
					<img src="images/professor.png" width="110"><br><br>
					<form method="POST" action="loginprof.php">
						<input type="text" name="user_p" placeholder="Username Here">
						<br><br>
						<input type="Password" name="pass_p" placeholder="Password Here">
						<br><br>
						<input class="button" type="submit" name="action" value="Log">
						<input  class="button reset" type="reset" value="Clear">
					</form>
					<a class="c" href="new_professor.php">Click Here For Register</a>
				</td>
				<td>
					<h3>Librarian Login</h3>
					<img src="images/settings (2).png" width="110"><br><br>
					<form method="POST" action="loginlib.php">
						<input type="text" name="user_l" placeholder="Username Here">
						<br><br>
						<input type="Password" name="pass_l" placeholder="Password Here">
						<br><br>
						<input class="button" type="submit" name="action" value="Log">
						<input  class="button reset" type="reset" value="Clear">
					</form>
					<a href="new_librarian.php">Click Here For Register</a>
				</td>
			</tr>
		</table>
		<!-- Create Message for student -->
		<?php
		if (isset($_GET['create'])) {
			if ($_GET['create']=='student') {
				?>

				<h3 style="color: green">Student Create Successfully</h3>
				<?php
			}
		}
		?>
		<!-- Create Message for professor  -->
		<?php
		if (isset($_GET['create'])) {
			if ($_GET['create']=='professor') {
				?>

				<h3 style="color: green">Professor Create Successfully</h3>
				<?php
			}
		}
		?>
		<!-- Create Message for librarian -->
		<?php
		if (isset($_GET['create'])) {
			if ($_GET['create']=='librarian') {
				?>

				<h3 style="color: green">Librarian Create Successfully</h3>
				<?php
			}
		}
		?>
	</center>
</body>
</html>