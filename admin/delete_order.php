<?php
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
	$stmt->bindParam(1,$_POST['order_id']);
	$stmt->execute();
	while ($array_proof_pic=$stmt->fetch()) {
		@unlink("../proof_pic/$array_proof_pic[proofConfirm]");
	}

	$stmt2=$pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
	$stmt2->bindParam(1,$_POST['order_id']);
	$stmt2->execute();
	while ($array_payment_pic=$stmt2->fetch()) {
		@unlink("../payment_pic/$array_payment_pic[proofPayment]");
	}

	$stmt3=$pdo->prepare("DELETE FROM orders WHERE order_id = ?");
	$stmt3->bindParam(1,$_POST['order_id']);

	$stmt4=$pdo->prepare("DELETE FROM address WHERE order_id = ?");
	$stmt4->bindParam(1,$_POST['order_id']);

	if ($stmt3->execute() && $stmt4->execute()) {
		setcookie('delete_order_success',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
	}else {
		setcookie('delete_order_error',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = 'admin_home.php';</script>";
	}
?>