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

<body class="fixed-sn pink-skin lady-lips-gradient">

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

      <main>
    
       <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light align-items-center waves-effect waves-light" style="margin-top: 50px;margin-bottom: 300px; border-radius: 30px;">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-12 mb-4 white-text text-center">
                    <img src="../logo/logo1.png" style="width: 30%;margin-top: 10px;">
                    <h3 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>ข้อมูลการสั่งซื้อ</strong></h3>
                    <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                  </div>
                  <div class="container">
                    <div class="form-row">
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-shopping-cart prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="order_id" readonly="" value="<?=$row['order_id']?>">
                          <label class="text-white">เลขที่คำสั่งซื้อ</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-user prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="fullname" readonly="" value="<?=$row['fullname']?>">
                          <label class="text-white">ชื่อ-นามสกุล</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-map-marked-alt prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="address" readonly="" value="<?=$row['address']?>">
                          <label class="text-white">ที่อยู่</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-map-marker-alt prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="address_zip" readonly="" value="<?=$row['address_zip']?>">
                          <label class="text-white">รหัสไปรษณีย์</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-phone prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="phoneNumber" readonly="" value="<?=$row['phoneNumber']?>">
                          <label class="text-white">เบอร์โทรติดต่อ</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-truck-moving prefix pink-text"></i>
                          <?php if ($row['transport'] == 1) { ?>
                            <input class="form-control-sm text-white" type="text" name="transport" readonly="" value="EMS">
                          <?php } elseif ($row['transport'] == 2) { ?>
                            <input class="form-control text-white" type="text" name="transport" readonly="" value="KERRY">
                          <?php } elseif ($row['transport'] == 3) { ?>
                            <input class="form-control-sm text-white" type="text" name="transport" readonly="" value="นัดรับ มข./กังสดาล/หลังมอ">
                          <?php } elseif ($row['transport'] == 4) { ?>
                            <input class="form-control-sm text-white" type="text" name="transport" readonly="" value="นัดรับ เซนทรัลขอนแก่น">
                          <?php } ?>
                          <label class="text-white">ประเภทการจัดส่ง</label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-clock prefix pink-text"></i>
                          <input class="form-control-sm text-white" type="text" name="orderDate" readonly="" value="<?=$row['orderDate']?>">
                          <label class="text-white">วันที่ทำรายการ</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mb-4">
                      <div class="col">
                        <div class="md-form form-sm">
                          <i class="fas fa-truck-loading prefix pink-text"></i>
                          <?php if ($row['transport'] == 1 || $row['transport'] == 2) { ?>
                            <input class="form-control-sm text-white" type="text" name="track" readonly="" value="<?=$row['track']?>">
                          <?php } elseif ($row['transport'] == 3 || $row['transport'] == 4) { ?>
                            <input class="form-control-sm text-white" type="text" name="track" readonly="" value="รอการติดต่อกลับเพื่อนัดหมายเวลาจัดส่ง">
                          <?php } ?>
                          <label class="text-white">เลขพัสดุ/นัดรับ</label>
                        </div>
                      </div>
                    </div>
                  </div>   
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
