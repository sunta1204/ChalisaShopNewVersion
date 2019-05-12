<?php 
session_start();
include '../connect.php'; ?>

<?php 

	

	date_default_timezone_set('Asia/Bangkok');
	$date = date('d/m/Y-h:i:sa');

	$order_id = uniqid();

	for ($i=0 ; $i < count($_FILES['proofConfirm']['name']) ; $i++) { 
		if ($_FILES['proofConfirm']['name'] != "") {
			$nameImg = $order_id . $i . ".jpg";
			if (move_uploaded_file($_FILES['proofConfirm']['tmp_name'][$i], "../proof_pic/" . $nameImg)) {
								
					$stmt = $pdo->prepare("INSERT INTO orders (order_id , facebookName , proofConfirm , transport , orderDate) VALUES (?,?,?,?,?)");

					$stmt->bindParam(1,$order_id);
					$stmt->bindParam(2,$_POST["facebookName"]); 
					$stmt->bindParam(3,$nameImg); 
					$stmt->bindParam(4,$_POST["transport"]); 
					$stmt->bindParam(5,$date);
				
					$stmt->execute();								  
			}
		}
	}



	$image2 = $order_id . ".jpg";

	move_uploaded_file($_FILES['proofPayment']['tmp_name'], "../payment_pic/" . $image2);

	$stmt=$pdo->prepare("UPDATE orders SET proofPayment = ? WHERE order_id = ?");

	$stmt->bindParam(1,$image2);
	$stmt->bindParam(2,$order_id);
	
	$_SESSION["order_id"] = $order_id;

	if($stmt->execute()){
		echo "<script type='text/javascript'> window.location.href = 'form_address.php';</script>";
	}else{
		echo "Upload fail back to Home Page";
		echo "<a href='../index.php'> Upload Complete Goto index </a>";
	}
?>