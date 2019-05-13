<?php 
 session_start();
 include '../connect.php';

 $stmt=$pdo->prepare("UPDATE address SET track = ? WHERE order_id = ? ");
 $stmt->bindParam(1,$_POST['track']);
 $stmt->bindParam(2,$_POST['order_id']);
 $stmt->execute();
 $rowCount=$stmt->rowcount();

 if ($rowCount > 0) {
 	setcookie('add_track_success',1,time()+5,'/');
 	echo "<script>window.location.href='admin_home.php';</script>";
 } else {
 	setcookie('add_track_error',1,time()+5,'/');
 	echo "<script>window.location.href='admin_home.php';</script>";
 }
?>