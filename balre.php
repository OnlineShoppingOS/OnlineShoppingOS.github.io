<?php
	session_start();
if(isset($_POST["rg"])){
$mysqli = new mysqli("localhost","root","password","dbshop");
$name = $mysqli->real_escape_string($_POST['name']);
$username = $mysqli->real_escape_string($_POST['username']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = md5($_POST['password']);
$mobile_number = $mysqli->real_escape_string($_POST['mobile_number']);
$gender= $_POST['gender'];
$res="SELECT * FROM registration WHERE email='$email'";
$run1= mysqli_query($mysqli, $res);
$count=mysqli_num_rows($run1);

if($count>0)
{
	
	?>
	<script type="text/javascript">
	alert("EMAIL ID YOU ENTERED IS ALLREADY REGISTERED!!");
	
	</script>
	<?php
}else{
$query="INSERT INTO registration(name,username,email,password,mobile_number,gender) VALUES('$name','$username','$email','$password','$mobile_number','$gender')";

$run= mysqli_query($mysqli, $query);
?>
	<script type="text/javascript">
	alert("YOU HAVE SUCCESSFULLY REGISTERED");
	window.location="ballog.php";
	</script>
	<?php
}

}

?>		
	
<!DOCTYPE html>
<html>
<head>
<title>REGISTRATION</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body bgcolor = #E0FFFF>

<div class="header">
<h1>REGISTRATION</h1>
</div>
<br>
<br>
<form method="post" action="  ">
<table>
<tr>
<td>name :</td>
<td><input type="text" name="name" class="textInput" autocomplete="off"  pattern="^[A-Za-z]+" title="please enter characters only" required/></td>
</tr>

<td>username :</td>
<td><input type="text" name="username" class="textInput" autocomplete="off" required />
</td>
</tr>
<td>email :</td>
<td><input type="email" name="email" class="textInput" autocomplete="off" title="please enter @gmail.com"required ></td>
</tr>

<td>password :</td>
<td><input type="password" name="password" class="textInput" autocomplete="off" required /></td>
</tr>

<td>mobile number :</td>
<td><input type="txt" name="mobile_number" class="textInput" autocomplete="off" pattern="\d{3}[\-]\d{3}[\-]\d{4}" title="please enter 10 digits only" required /></td>
</tr>

<td>gender :</td>
<td><input type="radio" name="gender"  value="male" checked /> male
<input type="radio" name="gender"  value="female"/> female</td>


</tr>

<tr>
<td></td>
<td><br><input type="submit" name="rg" value="register"></td>
</tr>
</table>
</form>
<center><a href ="http://localhost/mainproject/ballog.php">already have an account?LOGIN here</a></center>


</body>
</html>

