<?php
session_start();
include 'db/connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $email=$_POST['email'];
 $pass=$_POST['password'];
 $sql="SELECT 'customer' role FROM customers WHERE email='$email' AND password='$pass'
 UNION SELECT 'stuff' FROM stuff WHERE email='$email' AND password='$pass'
 UNION SELECT 'cooker' FROM cookers WHERE email='$email' AND password='$pass'";
 $res=$conn->query($sql);
 if($res && $res->num_rows>0){
  $row=$res->fetch_assoc();
  $_SESSION['role']=$row['role'];
  header("Location:index.php");
 } else echo "Invalid data";
}
?>
<form method='post'>
Email:<input name='email'><br>
Password:<input type='password' name='password'><br>
<button>Login</button>
</form>
<a href='register.php'>Register</a>