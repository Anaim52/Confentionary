<?php
include 'db/connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $role=$_POST['role'];
 $sql="INSERT INTO $role (name,email,password) VALUES
 ('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')";
 $conn->query($sql);
 echo "Registered";
}
?>
<form method='post'>
Name:<input name='name'><br>
Email:<input name='email'><br>
Password:<input type='password' name='password'><br>
Role:
<select name='role'>
<option value='customers'>Customer</option>
<option value='stuff'>Stuff</option>
<option value='cookers'>Cooker</option>
</select><br>
<button>Register</button>
</form>