<?php
include 'db/connection.php';
$res=$conn->query("SELECT * FROM orders");
while($r=$res->fetch_assoc()){
 echo $r['order_name']." - ".$r['status']."<br>";
}
?>