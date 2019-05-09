<?php 
	session_start();
	include '../connect.php';

	$stmt=$pdo->prepare("SELECT * FROM orders , address WHERE orders.order_id = ? AND orders.order_id = address.order_id GROUP BY address.order_id");
	$stmt->bindParam(1,$_GET["order_id"]);
	$stmt->execute();
	$row=$stmt->fetch();

	if (!empty($row["order_id"])) { ?>

<!DOCTYPE html>
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
                <li class="nav-item">
                    <a class="nav-link" data-target="#login" data-toggle="modal" ><i class="fas fa-user"></i>&nbsp; <span class="clearfix d-none d-sm-inline-block">LogIn</span></a>
                </li>    
            </ul>
        </nav>


        <!-- /.Navbar -->

    </header>
    <!--/.Double navigation-->

    <!-- Modal check_track -->
      <form action="./check_track.php" method="post">
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

    	<!-- Modal Login -->
    	<form action="../login/login.php" method="post">
    		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  			aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h4 class="modal-title w-100 font-weight-bold">Log in</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body mx-3">
		        <div class="md-form mb-5">
		          <i class="fas fa-user prefix pink-text"></i>
		          <input type="text" id="member_username" name="member_username" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="member_username">Username</label>
		        </div>

		        <div class="md-form mb-4">
		          <i class="fas fa-lock prefix pink-text"></i>
		          <input type="password" id="member_password" name="member_password" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="member_password">Password</label>
		        </div>

		      </div>
		      <div class="modal-footer d-flex justify-content-center">
		        <button class="btn btn-success"><i class="fas fa-paper-plane"></i>&nbsp; Login</button>
		      </div>
		    </div>
		  </div>
		</div>
    	</form>
    
       <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light align-items-center waves-effect waves-light" style="margin-top: 180px;margin-bottom: 300px; border-radius: 20px;">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-12 mb-4 white-text text-center">
                    <img src="../logo/logo1.png" style="width: 30%;margin-top: 10px;">
                    <h3 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>ข้อมูลการสั่งซื้อ</strong></h3>
                    <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                    <div class="table-responsive">
                    	<table class="table table-hover">
	                    	<thead>
	                    		<tr>
	                    			<th style="font-size: 20px;">เลขที่คำสั่งซื้อ</th>
	                    			<th style="font-size: 20px;">ชื่อ-นามสกุล</th>
	                    			<th style="font-size: 20px;">ที่อยู่การจัดส่ง</th>
	                    			<th style="font-size: 20px;">รหัสไปรษณีย์</th>
	                    			<th style="font-size: 20px;">เบอร์ติดต่อ</th>
	                    			<th style="font-size: 20px;">ประเภทการจัดส่ง</th>
	                    			<th style="font-size: 20px;">วันที่ทำรายการ</th>
	                    			<th style="font-size: 20px;">เลขที่พัสดุ / นัดรับ</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    		<tr>
	                    			<td style="font-size: 16px;"><?=$row['order_id']?></td>
	                    			<td style="font-size: 16px;"><?=$row['fullname']?></td>
	                    			<td style="font-size: 16px;"><?=$row['address']?></td>
	                    			<td style="font-size: 16px;"><?=$row['address_zip']?></td>
	                    			<td style="font-size: 16px;"><?=$row['phoneNumber']?></td>
	                    			<?php if ($row["transport"] == 1) {?>
										<td style="font-size: 16px;"> EMS </td>
									<?php }elseif ($row["transport"] == 2) { ?>
										<td style="font-size: 16px;"> KERRY </td>
									<?php }elseif ($row["transport"] == 3) {?>
										<td style="font-size: 16px;"> นัดรับบริเวณ มข และ ระแวกใกล้เคียง </td>
									<?php } elseif ($row['transport'] == 4) { ?>
										<td style="font-size: 16px;"> นัดรับที่ เซนทรัลขอนแก่น </td>
									<?php } ?>
	                    			<td style="font-size: 16px;"><?=$row['orderDate']?></td>
	                    			<?php if ($row['transport'] == 3 || $row['transport'] == 4) { ?>
	                    				<td style="font-size: 16px;">รอการติดต่อกลับเพื่อนัดหมายเวลาจัดส่ง</td>
	                    			<?php } elseif ($row['track'] == NULL) { ?>
	                    				<td style="font-size: 16px;">รอการตรวจสอบ และ ดำเนินการ</td>
	                    			<?php } elseif ($row['track'] != NULL) { ?>
	                    				<td style="font-size: 16px;"><?=$row['track']?></td>
	                    			<?php } ?>
	                    		</tr>
	                    	</tbody>
	                    </table>
                    </div>
                    
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
    </main>
    <!--/Main layout-->

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

</body>
</html>


	<?php } else {
		setcookie('checkTrackError',1,time()+10,'/');
		echo "<script type='text/javascript'> window.location.href = '../index.php';</script>";
	} ?>
