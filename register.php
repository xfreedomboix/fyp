<html>
<head>
    <title>Registration</title>
			<link rel="shortcut icon" href="pictures/mainlogin/mmuicon.png" />
		<link rel="stylesheet" href="css/registercss.css" >

	<style type="text/css">
input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
</head>
<body>  
<?php

if (!isset($_POST['submit'])) {
?>  
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<table border="0" width="320" height="200" align="center">
	<tr>
				<td colspan="4" style="color:black;font-size:20pt"><b>Registration</b></td>
			</tr>
       <tr><td> Login ID: </td><td><input type="number" name="uid" max="9999999999" min="1" placeholder="Numerical ID. EG: 1132701346" style="width: 200px;" required /><br /> </td> </tr>
        <tr><td> Password: </td><td><input type="password" name="password" placeholder="Login password" style="width: 200px;"required /><br /> </td> </tr>
         <tr><td>Name: </td><td><input type="text" name="username" placeholder="Full Name" style="width: 200px;" required /><br /></td> </tr>
	 <tr><td>Email: </td><td><input type="text" name="email" placeholder="Contact email" style="width: 200px;" required /><br /></td> </tr>


 <tr><td>  <input type="submit" name="submit" value="Register" /></td><td><button onclick="window.location.href='mainlogin.html'">Return</button></td>  </tr>
		</table>
    </form>
<?php
} else {

    $mysqli = new mysqli("localhost","root","","user_login");
    $UID  = $_POST['uid'];
    $password   = $_POST['password'];
	$password= md5($password);
     $username   = $_POST['username'];
    $email = $_POST['email'];
    $exists = 0;
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {



    $result = $mysqli->query("SELECT UserID from logins WHERE UserID = '{$UID}' LIMIT 1");
 if ($result->num_rows == 1) {
        $exists = 1;
        $result = $mysqli->query("SELECT email from logins WHERE email = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 3;    
    } 
else {
        $result = $mysqli->query("SELECT email from logins WHERE email = '{$email}' LIMIT 1");
        if ($result->num_rows == 1) $exists = 2;
    }


if($exists==1) echo '<script>alert("User ID already exist!"); location.replace(document.referrer);</script>';
else if ($exists == 2) echo '<script>alert("Email already exist!"); location.replace(document.referrer);</script>';
else if ($exists == 3) echo '<script>alert("Email and User ID already exist!"); location.replace(document.referrer);</script>';




    else {
        $sql = "INSERT  INTO `logins` (`UserID`, `Username`, `name`,`Password`,`email`)
                VALUES ('{$UID}', '{$username}','{$username}','{$password}','{$email}')"; 
		$sql2 ="INSERT INTO `stud_prog` (`UserID`) VALUES ('{$UID}')";
        if ($mysqli->query($sql)){
echo '<script>alert("Account successfuly registered!"); window.location="mainlogin.html";</script>';
		$mysqli->query($sql2);
		}
         else {
            echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
            exit();
        }
    }
}
 else {
  echo '<script>alert("Email is not valid!"); location.replace(document.referrer);</script>';
}
}
?>      
</body>
</html>