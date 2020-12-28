
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and Registration</title>
	<link rel="stylesheet" href="css/a.css">
</head>
<body>
	<div class="container_class">
	<div class="form_box">
		<div style="text-align:center;">
		</div>
			<div class="button-box">
				<div id="toggle-btn"></div>
				<button type="button" class="toggle_button" onclick="login()">
					Login
				</button>
				<button type="button" class="toggle_button" onclick="signup()">
					Sign_Up
				</button>
			</div>
			<form  action = "index.php" method = "post" id="Login_form_tag" class="input_items">
				<input type="text" name="username" class="input_fields" placeholder="Enter the name" required autocomplete="off">
				<input type="password" name="password" class="input_fields" placeholder="Enter Password" required>
				<span style="font-size:16px;">
				 <br>
				 &nbsp;&nbsp;&nbsp;Register <input id="checkvalue" type="checkbox" name="registercheck" value="register"><br>
				</span>
				<button type="submit" name="submit" class="login_form_btn">Submit</button>
				<button type="reset" class="login_form_btn">Clear</button>

			</form>
			<?php
				session_start();
				//header('location:index.php');

				$connection =  mysqli_connect('localhost','root','');

				mysqli_select_db($connection, 'CLINIC_MANAGEMENT_DATABASE');

				
				if(isset($_POST['submit']))
				{
					// name and password are stored with post body
					$name = $_POST['username'];
					$password = $_POST['password'];

					// encryption here
					$password1 = md5($password);
					$query = "SELECT * FROM REGISTRATION_AND_LOGIN WHERE USERNAME = '$name' && PASSWORD = '$password1' ";
				

					$result = mysqli_query($connection, $query);
					$usertypes = mysqli_fetch_array($result);
					$num = mysqli_num_rows($result);

					if( $num == 1 && !isset($_REQUEST['registercheck']) && $usertypes['TYPE'] == "admin" )
					{
						$_SESSION['username'] = $name;
						header('location:home.php');

					}

					else if( $num == 1 && !isset($_REQUEST['registercheck']) && $usertypes['TYPE'] == "user")
					{
						$_SESSION['username'] = $name;
						header('location:home1.php');

					}
					
					else if( $num == 1 && isset($_REQUEST['registercheck']) && $usertypes['TYPE'] == "admin")
					{
						$_SESSION['username'] = $name;
							echo "<script>";
							echo "alert('You Can Register New User');";
							echo "</script>";
					}
					else
					{
						echo "<script>";
							echo "alert('You Can't Register New User');";
							echo "</script>";
						header('location:index.php');
					}
				}
				?>
			<!-- invisible_form -->
			<form onSubmit= "return validate();" action = "registration.php" method = "post" id="signup_form_tag" class="input_items">
				
				<input type="text" name="username" class="input_fields" placeholder="Enter the name" required autocomplete="off">
				
				<input id ="password" type="password" name="password" class="input_fields" placeholder="Enter Password" required>
				<input id = "confirm_password" type="password" name="confirm_password" class="input_fields" placeholder="Confirm Password" required>
				
				<span style="font-size:16px;">
				 <br>
				 &nbsp;&nbsp;&nbsp;Admin <input id="checkvalue" type="radio" name="type" value="admin">
				 				   User <input id="checkvalue" type="radio" name="type" value="user"><br>
				</span>
				
				<button type="submit" name="submit" class="login_form_btn">Submit</button>
				<button type="reset" class="login_form_btn">Clear</button>
			</form>
			
			<!-- invisibility ends here-->
		</div>
	</div>

	<script>

	function validate()
	{
		var a = document.getElementById("password").value;
		var b = document.getElementById("confirm_password").value;
		if(a != b)
		{
			alert("password do not match");
			return false;
		}
			
	}

		var axis_x_index = document.getElementById("Login_form_tag");
		var axis_y_index = document.getElementById("signup_form_tag");
		var axis_z_index = document.getElementById("toggle-btn");
		
		function signup()
		{
			axis_x_index.style.left = "-420px"
			axis_y_index.style.left = "50px"
			axis_z_index.style.left = "110px"

		}

		function login()
		{
			axis_x_index.style.left = "50px"
			axis_y_index.style.left = "450px"
			axis_z_index.style.left = "0px"
		}
</script>
</body>
</html>
