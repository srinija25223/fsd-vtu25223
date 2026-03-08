<?php
include "db.php";

$sql="SELECT customers.name, COUNT(orders.order_id) AS total_orders
FROM orders
JOIN customers ON orders.customer_id=customers.customer_id
GROUP BY customers.name
ORDER BY total_orders DESC
LIMIT 1";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

echo "<h2>Most Active Customer</h2>";
echo "Customer: ".$row['name']."<br>";
echo "Total Orders: ".$row['total_orders'];
?>