<?php
include "db.php";

$sql = "SELECT department, COUNT(*) as total FROM students GROUP BY department";
$result = mysqli_query($conn,$sql);
?>

<h2>Students Per Department</h2>

<table border="1">
<tr>
<th>Department</th>
<th>Total Students</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['total']; ?></td>
</tr>

<?php } ?>

</table>