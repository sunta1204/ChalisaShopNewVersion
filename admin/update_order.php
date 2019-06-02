<?php 
session_start();
include '../connect.php'; ?>

<?php 

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y-h:i:sa');

	$image2 = $_POST['order_id'] . ".jpg";

	move_uploaded_file($_FILES['proofPayment']['tmp_name'], "../payment_pic/" . $image2);

	$stmt=$pdo->prepare("UPDATE addorder SET cus_name = ? , cus_phone = ? , cus_address = ? , cus_zip = ? ,  slip_payment = ? WHERE order_id = ?");
	$stmt->bindParam(1,$_POST['cus_name']);
	$stmt->bindParam(2,$_POST['cus_phone']);
	$stmt->bindParam(3,$_POST['cus_address']);
	$stmt->bindParam(4,$_POST['cus_zip']);
	$stmt->bindParam(5,$image2);
	$stmt->bindParam(6,$_POST['order_id']);

	if($stmt->execute()){
		echo "<script type='text/javascript'> window.location.href = 'list_order.php';</script>";
	}else{
		echo "Upload fail back to Home Page";
		echo "<a href='../index.php'> Upload Complete Goto index </a>";
	}
?>