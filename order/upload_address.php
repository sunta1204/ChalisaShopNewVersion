<?php 
session_start();
	include '../connect.php';
	
?>

<?php 

	$stmt=$pdo->prepare("INSERT INTO address (order_id , fullname , address , address_zip , phoneNumber ) VALUES (?,?,?,?,?)");

	$stmt->bindParam(1,$_SESSION["order_id"]);
	$stmt->bindParam(2,$_POST["fullname"]);
	$stmt->bindParam(3,$_POST["address"]);
	$stmt->bindParam(4,$_POST["address_zip"]);
	$stmt->bindParam(5,$_POST["phoneNumber"]);


	if($stmt->execute()){
		//$admin_email = "sunta1204@gmail.com";

		//$subject = "Order ID : " . $_SESSION['order_id'];

		//$message = '<html><body>';
		//$message .= '<img src="http://chalisashop.hostingerapp.com/img/logo.png" style="max-width: 420px; display: block; margin-left: auto; margin-right: auto;"><br><br><br>';
		//$message .= "<label style='font-size: 30px;'>รายการการสั่งซื้อ</label><br><br><br>";
		//$message .= "<table><thead style='background: #2c3e50;color: #ecf0f1;font-size: 24px;'><tr>";
		//	$message .= "<th>Order ID</th>";
		//	$message .= "<th>ชื่อ-นามสกุล</th>";
		//	$message .= "<th>เบอร์โทร</th>";
		//	$message .= "<th>ที่อยู่</th>";
		//	$message .= "<th>เลขไปรษณีย์</th>";
		//$message .= "</tr></thead>";
		//$message .= "<tbody style='font-size: 16px; background: #ecf0f1;color: #3498db;'><tr>";
		//	$message .= "<td>" . $_SESSION['order_id'] . "</td>";
		//	$message .= "<td>" . $_POST['fullname'] . "</td>";
		//	$message .= "<td>" . $_POST['phoneNumber'] . "</td>";
		//	$message .= "<td>" . $_POST['address'] . "</td>";
		//	$message .= "<td>" . $_POST['address_zip'] . "</td>";
		//$message .= '</tr></tbody></table><br><small>* Order @ chalisashop.hostingerapp.com</small></body></html>';

		//$from = 'MIME-Version: 1.0' . "\r\n";
		//$from .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		//$from .= "From: ChalisaShop@gmail.com" . "\r\n";
		

		//mail($admin_email,$subject,$message,$from);

		setcookie('order_success',1,time()+30,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}else{
		setcookie('order_error',1,time()+5,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	}
?>
