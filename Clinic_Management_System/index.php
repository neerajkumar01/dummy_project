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
			<div class="button-box">
				<div id="toggle-btn"></div>
				<button type="button" class="toggle_button" onclick="login()">
					Login
				</button>
				<button type="button" class="toggle_button" onclick="signup()">
					Sign_Up
				</button>
			</div>
			<form action = "formvalidation.php" method = "post" id="Login_form_tag" class="input_items">
				<input type="text" name="username" class="input_fields" placeholder="Enter the name" required>
				<input type="text" name="password" class="input_fields" placeholder="Enter Password" required>
				<button type="submit" class="login_form_btn">Submit</button>
				<button type="reset" class="login_form_btn">Clear</button>
			</form>
			<!-- invisible_form -->
			<form onSubmit= "return validate();" action = "registration.php" method = "post" id="signup_form_tag" class="input_items">
				<input type="text" name="username" class="input_fields" placeholder="Enter the name" required>
				<input id ="password" type="text" name="password" class="input_fields" placeholder="Enter Password" required>
				<input id = "confirm_password" type="text" name="confirm_password" class="input_fields" placeholder="Confirm Password" required>
				<button type="submit" class="login_form_btn">Submit</button>
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
