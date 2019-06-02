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
			if (move_uploaded_file($_FILES['proofConfirm']['tmp_name'][$i], "../order_pic/" . $nameImg)) {
								
					$stmt = $pdo->prepare("INSERT INTO addorder (order_id , facebook_name , order_pic , order_price , order_date) VALUES (?,?,?,?,?)");

					$stmt->bindParam(1,$order_id);
					$stmt->bindParam(2,$_POST["facebook_name"]);
					$stmt->bindParam(3,$nameImg);
					$stmt->bindParam(4,$_POST["o_total"]); 
					$stmt->bindParam(5,$date);
					$stmt->execute();
					$rowCount = $stmt->rowcount();								  
			}
		}
	}

	if($rowCount > 0){
		echo "<script type='text/javascript'> window.location.href = '../admin/admin_home.php';</script>";
	}else{
		echo "Upload fail back to Home Page";
		echo "<a href='../index.php'> Upload Complete Goto index </a>";
	}
?>