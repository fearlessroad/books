<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
		#container{
			margin: 0 auto;
			width:400px;
		}
		.layout label, .layout input{
			display:block;
			width:150px;
			float:left;
			margin-bottom:10px;
		}
		.layout label{
			text-align:right;
			padding-right:20px;
		}
		br{
			clear:left;
		}
		fieldset{
			width:350px;
		}
		button{
			float:right;
			margin-right:25px;
			background-color:white;
		}
		button:hover{
			background-color:#cccccc;
		}
	</style>
</head>
<body>
<?php echo validation_errors();?>

	<div id="container">
		<h2>Welcome!</h2>
		<FIELDSET class="layout">
			<legend>Register</legend>
			<form action="/register/" method="post">
				<label>Name</label><input type="text" name="name"><br>
				<label>Alias</label><input type="text" name="alias"><br>
				<label>Email</label><input type="email" name="email"><br>
				<label>Password</label><input type="password" name="password"><br>
				<label>Confirm Password</label><input type="password" name="confirm_password"><br>
				<button>Register</button>
			</form>
		</FIELDSET>
		<FIELDSET class="layout">
			<legend>Login</legend>
			<form action="/login/" method="post">
<!-- 				<input type="hidden" name="login"> -->
				<label>Email</label><input type="email" name="email"><br>
				<label>Password</label><input type="password" name="password"><br>
				<button>Login</button>
			</form>
		</FIELDSET>
	</div>
</body>
</html>