<?php
include "db.php";

$sql = "SELECT * FROM
(
SELECT customers.name, products.product_name,
(products.price * orders.quantity) AS total
FROM orders
JOIN customers ON orders.customer_id=customers.customer_id
JOIN products ON orders.product_id=products.product_id
) AS order_values
ORDER BY total DESC
LIMIT 1";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

echo "<h2>Highest Value Order</h2>";
echo "Customer: ".$row['name']."<br>";
echo "Product: ".$row['product_name']."<br>";
echo "Total Value: ".$row['total'];
?>