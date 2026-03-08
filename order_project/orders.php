<?php
include "db.php";

$sql = "SELECT customers.name, products.product_name, products.price,
orders.quantity, orders.order_date,
(products.price * orders.quantity) AS total
FROM orders
JOIN customers ON orders.customer_id = customers.customer_id
JOIN products ON orders.product_id = products.product_id
ORDER BY orders.order_date DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<style>

body{
font-family: Arial;
background:#f4f4f4;
}

table{
width:80%;
margin:auto;
border-collapse:collapse;
background:white;
}

th,td{
padding:10px;
border:1px solid gray;
text-align:center;
}

th{
background:#333;
color:white;
}

h2{
text-align:center;
}

</style>

</head>

<body>

<h2>Customer Order History</h2>

<table>

<tr>
<th>Customer</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['product_name']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['total']."</td>";
echo "<td>".$row['order_date']."</td>";
echo "</tr>";

}

?>

</table>

</body>
</html>