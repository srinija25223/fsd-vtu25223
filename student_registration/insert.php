<?php
include 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$department = $_POST['department'];
$phone = $_POST['phone'];

$sql = "INSERT INTO students(name,email,dob,department,phone)
VALUES('$name','$email','$dob','$department','$phone')";

if($conn->query($sql)){
echo "Student Registered Successfully";
}
else{
echo "Error";
}

?>