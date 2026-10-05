<?php
session_start();
echo "<h1>Confentionary System</h1>";
if(isset($_SESSION['role'])){
 echo "Logged in as ".$_SESSION['role']." | <a href='logout.php'>Logout</a><br>";
 echo "<a href='create_order.php'>Create Order</a> | <a href='orders.php'>Orders</a>";
}else{
 echo "<a href='login.php'>Login / Register</a>";
}
?>