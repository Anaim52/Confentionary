<?php
include 'db/connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $conn->query("INSERT INTO orders (order_name,order_detail,order_size,order_price,status)
 VALUES ('".$_POST['name']."','".$_POST['detail']."','".$_POST['size']."','".$_POST['price']."','new')");
 echo "Order created";
}
?>
<form method='post'>
Order name:<input name='name'><br>
Details:<input name='detail'><br>
Size:<input name='size'><br>
Price:<input name='price'><br>
<button>Create</button>
</form>