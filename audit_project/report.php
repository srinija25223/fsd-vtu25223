<?php
$conn = mysqli_connect("localhost","root","","audit_system");

$sql = "SELECT * FROM daily_activity";

$result = mysqli_query($conn,$sql);

echo "<h2>Daily Activity Report</h2>";

echo "<table border=1>";

echo "<tr>
<th>Date</th>
<th>Action</th>
<th>Total</th>
</tr>";

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";
echo "<td>".$row['activity_date']."</td>";
echo "<td>".$row['action_type']."</td>";
echo "<td>".$row['total_actions']."</td>";
echo "</tr>";

}

echo "</table>";
?>