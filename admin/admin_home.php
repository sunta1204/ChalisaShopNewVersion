<?php 
	session_start();
	include '../connect.php';

	if (!isset($_SESSION['permission'])) {
		setcookie('login_fail',1,time()+5,'/');
		echo "<script>window.location.href='../index.php'</script>";
	}
	elseif ($_SESSION['permission'] == 1) {

	$stmt2=$pdo->prepare("SELECT * FROM member WHERE member_username = ? ");
	$stmt2->bindParam(1,$_SESSION["username"]);
	$stmt2->execute();
	while ($row2=$stmt2->fetch()) {
	 	$username["member_username"] = $row2["member_username"];
	 	$name["member_name"] = $row2["member_name"];
	 	$email["member_email"] = $row2["member_email"];
	 } 

	$stmt3=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = address.order_id GROUP BY address.order_id");
	$stmt3->execute();

?>
<html>
<head>
<title>Chalisa Shop</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<!-- Font Awesome -->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	  <!-- Bootstrap core CSS -->
	  <link href="../css/bootstrap.min.css" rel="stylesheet">
	  <!-- Material Design Bootstrap -->
	  <link href="../css/mdb.min.css" rel="stylesheet">
	  <!-- Your custom styles (optional) -->
	  <link href="../css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
</head>

<body class="fixed-sn pink-skin" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg');" >

  <!-- Start your project here-->
  <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="../index.php"><p class="text-white text-center" style="font-size: 24px;">Chalisa Shop</p></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                      <li class="mb-2">
                        <a href="../index.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-home"></i>&nbsp; Home </a>
                      </li>
                      <li class="mb-2">
                        <a class="waves-effect" style="font-size: 16px;"><i class="fas fa-store"></i>&nbsp; หน้าสินค้า (coming soon) </a>
                      </li>
                      <li class="mb-2">
                        <a href="../order/order_proof.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-shopping-basket"></i>&nbsp; ส่งหลักฐานการสั่งซื้อ </a>
                      </li>
                      <li class="mb-2">
                        <a data-toggle="modal" data-target="#check_track" class="waves-effect" style="font-size: 18px;"><i class="fas fa-truck"></i>&nbsp; ตรวจสอบเลขที่พัสดุ </a>
                      </li>
                      <li class="mb-2">
                        <a href="../howto.php" class="waves-effect" style="font-size: 16px;"><i class="fas fa-info-circle"></i>&nbsp; วิธีการส่งหลักฐานการสั่งซื้อ </a>
                      </li>
                      <li class="mb-2">
                        <a href="../contact.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-question-circle"></i>&nbsp; ติดต่อสอบถาม </a>
                      </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>	
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <a href="../index.php" class="btn btn-outline-light"> Chalisa Shop </a>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item dropdown">
			        <a class="btn btn-pink dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
			          aria-haspopup="true" aria-expanded="false">
			          <i class="fas fa-user"></i>&nbsp; <?= $_SESSION["name"] ?> </a>
			        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
			          <a class="dropdown-item" data-target="#profile" data-toggle="modal">My account</a>
			          <a class="dropdown-item" href="../logout/logout.php">Log out</a>
			        </div>
			      </li>    
            </ul>
        </nav>


        <!-- /.Navbar -->

    </header>
    <!--/.Double navigation-->

    <!-- Modal Prfile -->
    <form action="edit_profile.php" method="post">
    	<div class="modal fade" id="profile" tabindex="-1" aria-hidden="true">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title"> My Profile </h5>
    					<button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span></button>
    				</div>
    				<div class="modal-body mx-3">
    					<div class="md-form">
    						<i class="fas fa-user-tie prefix pink-text"></i>
    						<input readonly="" type="text" name="member_username" id="member_username" class="form-control validate" value="<?=$username['member_username']?>">
    						<label  for="member_username"> Username </label>
    					</div>
    					<div class="md-form">
    						<i class="fas fa-user prefix pink-text"></i>
    						<input type="text" name="member_name" id="member_name" class="form-control validate" value="<?=$name['member_name']?>">
    						<label for="member_name"> Fullname </label>
    					</div>
    					<div class="md-form">
    						<i class="fas fa-envelope prefix pink-text"></i>
    						<input type="text" name="member_name" id="member_name" class="form-control validate" value="<?=$email['member_email']?>">
    						<label for="member_name"> Email </label>
    					</div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i>&nbsp; Close</button>
    					<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save Change</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </form>

    <!-- Modal check_track -->
      <form action="../check_track/check_track.php" method="get">
        <div class="modal fade" id="check_track" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">ตรวจสอบเลขที่พัสดุ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <i class="fas fa-dolly prefix pink-text"></i>
              <input type="text" id="order_id" name="order_id" class="form-control validate">
              <label data-error="wrong" data-success="right" for="order_id">เลขคำสั่งซื้อของท่าน</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-success"> <i class="fas fa-paper-plane"></i>&nbsp; ตรวจสอบ</button>
          </div>
        </div>
      </div>
    </div>
      </form>

   <!--Main layout-->
    <main>

    	<?php 
				if (!empty($_COOKIE["login_success"])){ ?>
					<script type="text/javascript">
		    			$(window).on('load',function(){
		        			$('#success').alert('fade');
		        				setTimeout(function(){
		        					$('#success').alert('close');
		        				}, 3000);
		    				});
		    				$('#success').click(function(){
		    					$('success').alert('close');
		    				});
					</script>
					<div class="alert alert-success alert-dismissible fade show" role="alert" id="success">
						<center>
							<strong>Login Success!</strong> สวัสดี คุณ <?= $name["member_name"] ?>
						</center>				
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
			<?php } ?>

		  <?php 
				if (!empty($_COOKIE["delete_success"])){ ?>
					<script type="text/javascript">
		    			$(window).on('load',function(){
		        			$('#delete_success').alert('fade');
		        				setTimeout(function(){
		        					$('#delete_success').alert('close');
		        				}, 3000);
		    				});
		    				$('#delete_success').click(function(){
		    					$('delete_success').alert('close');
		    				});
					</script>
					<div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_success">
						<center>
							<strong>Delete Success!</strong> ลบรายการการสั่งซื้อสำเร็จ
						</center>				
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
			<?php } ?>

			<?php 
				if (!empty($_COOKIE["delete_error"])){ ?>
					<script type="text/javascript">
		    			$(window).on('load',function(){
		        			$('#delete_error').alert('fade');
		        				setTimeout(function(){
		        					$('#delete_error').alert('close');
		        				}, 3000);
		    				});
		    				$('#delete_error').click(function(){
		    					$('delete_error').alert('close');
		    				});
					</script>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_error">
						<center>
							<strong>Delete Error!</strong> เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง
						</center>				
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
			<?php } ?>

      <?php 
        if (!empty($_COOKIE["checkTrackError"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#checkTrackError').modal('show');
              });
          </script>
          <!-- Modal Check Track -->
          <form action="../check_track/check_track.php" method="get">
        <div class="modal fade" id="checkTrackError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">ตรวจสอบเลขที่พัสดุ</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="form-group">
              <label class="text-danger" style="font-size: 24px;">ไม่พบเลขคำสั่งซื้อ กรุณากรอกใหม่อีกครั้ง.</label>
            </div>
            <div class="md-form mb-5">
              <i class="fas fa-dolly prefix pink-text"></i>
              <input type="text" id="order_id2" name="order_id" class="form-control validate">
              <label data-error="wrong" data-success="right" for="order_id2">เลขคำสั่งซื้อของท่าน</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-success"> <i class="fas fa-paper-plane"></i>&nbsp; ตรวจสอบ</button>
          </div>
        </div>
      </div>
    </div>
      </form>
      <?php } ?>

      <?php 
        if (!empty($_COOKIE["add_track_success"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#add_track_success').alert('fade');
                    setTimeout(function(){
                      $('#add_track_success').alert('close');
                    }, 3000);
                });
                $('#add_track_success').click(function(){
                  $('add_track_success').alert('close');
                });
          </script>
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="add_track_success">
            <center>
              <strong>Add Track Success!</strong> เพิ่มเลขที่พัสดุสำเร็จ.
            </center>       
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php } ?>

      <?php 
        if (!empty($_COOKIE["add_track_error"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#add_track_error').alert('fade');
                    setTimeout(function(){
                      $('#add_track_error').alert('close');
                    }, 3000);
                });
                $('#add_track_error').click(function(){
                  $('add_track_error').alert('close');
                });
          </script>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="add_track_error">
            <center>
              <strong>Add Track Error!</strong> เพิ่มเลขที่พัสดุไม่สำเร็จ กรุณาลองใหม่อีกครั้ง.
            </center>       
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php } ?>

      <?php 
        if (!empty($_COOKIE["delete_order_success"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#delete_order_success').alert('fade');
                    setTimeout(function(){
                      $('#delete_order_success').alert('close');
                    }, 3000);
                });
                $('#delete_order_success').click(function(){
                  $('delete_order_success').alert('close');
                });
          </script>
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="delete_order_success">
            <center>
              <strong>Delete Order Success!</strong>
            </center>       
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php } ?>

      <?php 
        if (!empty($_COOKIE["delete_order_error"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#delete_order_error').alert('fade');
                    setTimeout(function(){
                      $('#delete_order_error').alert('close');
                    }, 3000);
                });
                $('#delete_order_error').click(function(){
                  $('delete_order_error').alert('close');
                });
          </script>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="delete_order_error">
            <center>
              <strong>Delete Order Error!</strong>กรุณาลองใหม่อีกครั้ง.
            </center>       
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php } ?>

 
              <!-- Content -->
              <div class="container" style="margin-top: 30px;">
              	<div class="form-inline d-flex ">
              		<?php  
              		$stmt=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = address.order_id GROUP BY address.order_id ORDER BY orders.orderDate DESC");
              		$stmt->execute();
              		while ($row=$stmt->fetch()) { ?>
	                <!-- Card deck -->
					<div class="card-deck mr-sm-2">
					  <!-- Card -->
					  <div class="card card-cascade narrower mb-4">
					    <!--Card image-->
					    <div class="view view-cascade overlay">
                <a type="button" class="waves-effect waves-light" data-target="#order_detail<?=$row['order_id']?>" data-toggle="modal">
                  <img style="max-width: 300px;max-height: 150px; margin-right: auto;margin-left: auto;" class="card-img-top " src="../payment_pic/<?=$row['proofPayment']?>" >
                </a>	      
					    </div>
					    <!--Card content-->
					    <div class="card-body card-body-cascade" style="margin-top: 5px;">
					    	<h5 class="pink-text font-weight-bold card-title">คำสั่งซื้อ : <?=$row['order_id']?></h5>
					    	<p class="card-text"> <?=$row['fullname']?> </p>
					    	<p class="card-text"> <?=$row['phoneNumber']?> </p>
					     	<?php if ($row['transport'] == 1) { ?>
								<p class="card-text"> EMS </p>
							<?php } elseif ($row['transport']== 2) { ?>
							    <p class="card-text"> Kerry </p>
							<?php }elseif ($row['transport'] == 3) { ?>
							    <p class="card-text"> นัดรับ มข / ใกล้เคียง </p>
							<?php }elseif ($row['transport'] == 4) { ?>
								<p class="card-text"> นัดรับเซนทรัล </p>
							<?php }  ?>
              <?php if ($row['transport'] == 3 || $row['transport'] == 4) { ?>
                
              <?php } elseif ($row['track'] == NULL) { ?>
                <p class="card-text text-danger">ยังไม่กรอกเลขพัสดุ</p>
              <?php } elseif ($row['track'] != NULL) { ?>
                <p class="card-text green-text"> <?=$row['track']?> </p>
              <?php } ?>
							<p class="card-text form-inline">
								<button class="btn btn-primary btn-sm" data-target="#order_detail<?=$row['order_id']?>" data-toggle="modal"><i class="fas fa-info"></i>&nbsp; รายละเอียด</button> 
							    <button class="btn btn-outline-danger btn-sm" data-target="#delete_order<?=$row['order_id']?>" data-toggle="modal"><i class="fas fa-trash"></i>&nbsp; ลบรายการ </button>
							</p>
					    </div>
					    <div class="card-footer text-muted text-center">
					    	<i class="far fa-clock pr-1"></i> <?=$row['orderDate']?>
					    </div>
					  </div>
					  <!-- Card -->
					</div>
					<!-- Card deck -->
            	<?php } ?> 
              	</div>
              </div>
              <!-- Content -->
            
    </main>
    <!--/Main layout-->

    <?php 
    	$stmt4=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = address.order_id GROUP BY address.order_id ORDER BY orders.orderDate DESC");
    	$stmt4->execute();
    	while ($order=$stmt4->fetch()) { ?>
    	 	<!-- Modal Order Detail -->
			<form action="edit_order.php" method="post">
				<div class="modal fade" aria-hidden="true" tabindex="-1" id="order_detail<?=$order['order_id']?>">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title w-100 pink-text" id="myModalLabel">รายละเอียดคำสั่งซื้อ</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
							</div>
							<div class="modal-body">
					 			<div class="row">
                  <div class="col-md-12 text-center">
                    <?php 
                      $stmt5=$pdo->prepare("SELECT order_id , proofConfirm FROM orders WHERE order_id =?");
                      $stmt5->bindParam(1,$order['order_id']);
                      $stmt5->execute();
                      while ($order_pic=$stmt5->fetch()) { ?>
                        <a class="mr-sm-2" type="button" data-target="#order_pic<?=$order_pic['order_id']?>" data-toggle="modal"> <img src="../proof_pic/<?=$order_pic['proofConfirm']?>" style="max-height: 200px;max-width: 200px;"> </a>

                      <!-- Modal proof_pic -->
                      <div class="modal fade" id="order_pic<?=$order_pic['order_id']?>" tabindex="-2" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <img style="max-width: 100%;" src="../proof_pic/<?=$order_pic['proofConfirm']?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  Modal proof_pic -->
                      <?php }
                    ?>
                    <a class="mr-sm-2" type="button" data-target="#payment_pic<?=$order['order_id']?>" data-toggle="modal"> <img src="../payment_pic/<?=$order['proofPayment']?>" style="max-height: 200px;max-width: 200px;"></a>
                    <!-- Modal proof_pic -->
                      <div class="modal fade" id="payment_pic<?=$order['order_id']?>" tabindex="-2" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <img style="max-width: 100%;" src="../payment_pic/<?=$order['proofPayment']?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  Modal proof_pic -->
                  </div>  
                </div>
                
								<!-- Detail -->
								<div class="form-group">
									<label class="pink-text" style="font-size: 20px;"> รายละเอียด </label>
								</div>
								<div class="form-row">
									<div class="col-auto">
										<div class="md-form">
											<i class="fas fa-shopping-cart prefix pink-text"></i>
											<input readonly="" type="text" name="order_id" class="form-control validate" value="<?=$order['order_id']?>">
											<label> Order ID </label>
										</div>
									</div>
									<div class="col">
										<div class="md-form">
											<i class="fas fa-user prefix pink-text"></i>
											<input readonly="" type="text" name="facebookName" class="form-control validate" value="<?=$order['facebookName']?>">
											<label> Facebook </label>
										</div>
									</div>
									<div class="col-auto">
										<div class="md-form">
											<i class="fas fa-dolly-flatbed prefix pink-text"></i>
											<?php if ($order['transport'] == 1) { ?>
												<input type="text" name="transport" class="form-control validate" value="EMS">
											<?php } elseif ($order['transport'] == 2) { ?>
												<input type="text" name="transport" class="form-control validate" value="KERRY">
											<?php } elseif ($order['transport'] == 3) { ?>
												<input type="text" name="transport" class="form-control validate" value="นัดรับ มข./ใกล้เคียง">
											<?php } elseif ($order['transport'] == 4) { ?>
												<input type="text" name="transport" class="form-control validate" value="นัดรับเซนทรัล">
											<?php } ?>
											<label>ประเภทการจัดส่ง</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="pink-text" style="font-size: 20px;">ที่อยู่การจัดส่ง</label>
								</div>
								<div class="form-row">
									<div class="col">
										<div class="md-form">
											<i class="fas fa-user prefix pink-text"></i>
											<input type="text" name="fullname" readonly="" class="form-control validate" value="<?=$order['fullname']?>">
											<label>ชื่อ-นามสกุล</label>
										</div>
									</div>
									<div class="col">
										<div class="md-form">
											<i class="fas fa-map-marked-alt prefix pink-text"></i>
											<input type="text" name="address" readonly="" class="form-control validate" value="<?=$order['address']?>">
											<label>ที่อยู่</label>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<div class="md-form">
											<i class="fas fa-map-marker-alt prefix pink-text"></i>
											<input type="text" name="address_zip" readonly="" class="form-control validate" value="<?=$order['address_zip']?>">
											<label>รหัสไปรษณีย์</label>
										</div>
									</div>
									<div class="col">
										<div class="md-form">
											<i class="fas fa-phone prefix pink-text"></i>
											<input type="text" name="phoneNumber" readonly="" class="form-control validate" value="<?=$order['phoneNumber']?>">
											<label>เบอร์ติดต่อ</label>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col">
										<div class="md-form">
                      <?php if ($order['transport'] == 3 || $order['transport'] == 4) { ?>
                        
                      <?php } elseif ($order['track'] == NULL) { ?>
												<i class="fas fa-truck-moving prefix pink-text"></i>
												<input id="track<?=$order['order_id']?>" type="text" name="track" class="form-control validate" value="<?=$order['track']?>">
												<label for="track<?=$order['order_id']?>">เลขพัสดุ</label>
											<?php } elseif ($order['track'] != NULL) { ?>
												<i class="fas fa-truck-moving prefix pink-text"></i>
												<input id="track<?=$order['order_id']?>" type="text" name="track" class="form-control validate" value="<?=$order['track']?>">
												<label for="track<?=$order['order_id']?>">เลขพัสดุ</label>
											<?php } ?>
											
										</div>
									</div>
								</div>
								<!-- Detail -->		
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i>&nbsp; Close</button>
        						<button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&nbsp; Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</form>

			<!-- Modal Delete Order -->
			<form action="delete_order.php" method="post">
				<div class="modal fade" tabindex="-1" aria-hidden="true" id="delete_order<?=$order['order_id']?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title pink-text"> ยืนยันการลบรายการสั่งซื้อ </h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						        	<span aria-hidden="true">&times;</span>
						        </button>
							</div>
							<div class="modal-body">
                <input type="hidden" name="order_id" value="<?=$order['order_id']?>">
								<label style="font-size: 20px;"> คุณแน่ใจหรือไม่ที่จะลบรายการ : </label> <label class="red-text" style="font-size: 24px;"><?=$order['order_id']?></label>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i>&nbsp; Close</button>
								<button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i>&nbsp; Confirm</button>
							</div>
						</div>
					</div>
				</div>
			</form>
    	<?php } 
    ?>
    



    <!-- Footer -->
    <footer class="page-footer font-small fixed-bottom" style="background: rgba(62, 69, 81, 0.7);">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2018 Copyright: Chalisa Shop     
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  <!-- /Start your project here-->

	<!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript">
        // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
  </script>

	
<?php } ?>