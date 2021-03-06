<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  <!--<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>-->

  <link rel="stylesheet" href="../css/login_style.css">

  
</head>

<body>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
                    <form action="../src/login.php" method="POST">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
                                        <input id="user" type="text" name="email" class="input" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" name="password" class="input" data-type="password" required="">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
                        </form>
			<div class="sign-up-htm">
                            <form action="../src/registration.php" method="POST">
				<div class="group">
					<label for="user" class="label">Name</label>
					<input id="user" type="text" name="name" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
                                        <input id="pass" type="password" name="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" name="repassword" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
                                        <input id="pass" type="email" name="email" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Address</label>
                                        <input id="pass" type="text" name="address" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Date of Birth</label>
                                        <input id="pass" type="date" name="date" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
                            </form>
			</div>
		</div>
	</div>
</div>
  
  
</body>
</html>
