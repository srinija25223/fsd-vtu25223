<?php

include "db.php";

$user_id = $_POST['user_id'];
$merchant_id = $_POST['merchant_id'];
$amount = $_POST['amount'];

mysqli_begin_transaction($conn);

try{

// deduct from user
$deduct = "UPDATE users 
SET balance = balance - $amount 
WHERE user_id = $user_id";

mysqli_query($conn,$deduct);

// add to merchant
$add = "UPDATE merchants 
SET balance = balance + $amount 
WHERE merchant_id = $merchant_id";

mysqli_query($conn,$add);

// commit transaction
mysqli_commit($conn);

echo "Payment Successful";

}

catch(Exception $e){

// rollback if error occurs
mysqli_rollback($conn);

echo "Payment Failed";

}

?>