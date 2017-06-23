<html>
<head>
	<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
        body { 
          background: linear-gradient(216deg, #ff8a40, #fd5068, #dc4588);
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
	h1{
		text-align: center;
		margin: auto;
	}
	form {
		margin: auto;
		max-width: 500px;
		background-color: #ffffff;
		padding: 30px;
		border: 1px solid #f8f8f8;
	}
	input {
		display: block;
		padding: 10px;
		width: 100%;
		margin-top: 10px;
	}
	input[type="submit"] {
		border-radius: 12px;
		text-align: center;
		width: 50%;
		margin: 20px auto 0;
		background: linear-gradient(#FFDA63, #FFB940);
		color: brown;
		opacity: 0.8;
	}
	input[type="submit"]:hover {
		opacity: 1;
	}
	#fullNameError, #emailError, #passwordError {
		color: red;
	}
	</style>
</head>
<body background="">
	<div class="container">
	<form name="registerform" id="formulir" method="post" action="processor/register-user.php">
		<h1>Create Account</h1>
		<p><br></p>
		<p><b>What's your name?</b></p>
		<input type="text" name="NAME">
		<p><b>Enter your username</b></p>
		<input type="text" name="USERNAME">
		<p><b>Enter your email</b></p>
		<input type="email" name="EMAIL" placeholder="alex@gmail.com">
		<p><b>Create a password</b></p>
		<input type="password" name="PASSWORD">
		<p><b>Confirm your password</b></p>
		<input type="password" name="confirmPassword">
		<div class="form-group">
      	<label for="sel1" name="city"><p><b>Select your city (select one):</b></p></label>
      	<select class="form-control" id="sel1" name="KOTA">
        	<option value="surabaya">--Select your city--</option>
        	<option value="surabaya">Surabaya</option>
        	<option value="jakarta">Jakarta</option>
        	<option value="bandung">Bandung</option>
        	<option value="denpasar">Denpasar</option>
      	</select>
		<p><b>Enter your age</b></p>
		<input type="text" name="UMUR">
		<p><b>Jenis Kelamin</b></p>
		<select class="form-control" id="sel1" name="GENDER">
        	<option value="male">Male</option>
        	<option value="female">Female</option>
      	</select>
		<input type="submit" id="regis" class="btn-primary" name="REGISTER" value="OK">
		<center><a href="login.php">back</a></center>
	</form>
	</div>
</body>
</html>