<?php
include "db.php";

$dept = "";
$order = "";

if(isset($_GET['department'])){
    $dept = $_GET['department'];
}

if(isset($_GET['sort'])){
    $order = $_GET['sort'];
}

$sql = "SELECT * FROM students WHERE 1";

if($dept != ""){
    $sql .= " AND department='$dept'";
}

if($order == "name"){
    $sql .= " ORDER BY name";
}
elseif($order == "dob"){
    $sql .= " ORDER BY dob";
}

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
</head>

<body>

<h2>Student Dashboard</h2>

<form method="GET">

Filter by Department:

<select name="department">
<option value="">All</option>
<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
<option value="IT">IT</option>
</select>

Sort By:

<select name="sort">
<option value="">None</option>
<option value="name">Name</option>
<option value="dob">Date of Birth</option>
</select>

<button type="submit">Apply</button>

</form>

<br>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['department']; ?></td>
<td><?php echo $row['phone']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>