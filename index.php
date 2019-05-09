<?php 
  session_start();
  include 'connect.php';
?>
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
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <!-- Material Design Bootstrap -->
	  <link href="css/mdb.min.css" rel="stylesheet">
	  <!-- Your custom styles (optional) -->
	  <link href="css/style.css" rel="stylesheet">
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
                        <a href="index.php"><p class="text-white text-center" style="font-size: 24px;">Chalisa Shop</p></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                      <li class="mb-2">
                        <a href="index.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-home"></i>&nbsp; Home </a>
                      </li>
                      <li class="mb-2">
                        <a class="waves-effect" style="font-size: 16px;"><i class="fas fa-store"></i>&nbsp; หน้าสินค้า (coming soon) </a>
                      </li>
                      <li class="mb-2">
                        <a href="order/order_proof.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-shopping-basket"></i>&nbsp; ส่งหลักฐานการสั่งซื้อ </a>
                      </li>
                      <li class="mb-2">
                        <a data-toggle="modal" data-target="#check_track" class="waves-effect" style="font-size: 18px;"><i class="fas fa-truck"></i>&nbsp; ตรวจสอบเลขที่พัสดุ </a>
                      </li>
                      <li class="mb-2">
                        <a href="howto.php" class="waves-effect" style="font-size: 16px;"><i class="fas fa-info-circle"></i>&nbsp; วิธีการส่งหลักฐานการสั่งซื้อ </a>
                      </li>
                      <li class="mb-2">
                        <a href="contact.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-question-circle"></i>&nbsp; ติดต่อสอบถาม </a>
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
                <a href="index.php" class="btn btn-outline-light"> Chalisa Shop </a>
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
      <form action="check_track/check_track.php" method="get">
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
    	<form action="login/login.php" method="post">
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
   <!--Main layout-->
    <main>
       <?php 
      if (!empty($_COOKIE["logout_success"])){ ?>
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#logout_success').alert('fade');
                  setTimeout(function(){
                    $('#logout_success').alert('close');
                  }, 3000);
              });
              $('#logout_success').click(function(){
                $('logout_success').alert('close');
              });
        </script>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="logout_success">
          <center>
            <strong>Logout Success!</strong>
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
          <form action="check_track/check_track.php" method="get">
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
        if (!empty($_COOKIE["order_success"])){ ?>
          <script type="text/javascript">
              $(window).on('load',function(){
                  $('#success').modal('show');
              });
          </script>
          <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title text-success" id="exampleModalLabel">การทำรายการสำเร็จ</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <label class="text-success" style="font-size: 20px; "> คำสั่งซื้อของท่านสำเร็จ </label><br>
                    <label class="text-primary" style="font-size: 20px;"> รหัสคำสั่งซื้อของท่านคือ : </label> <label class="text-danger" style="font-size: 24px;"><?=$_SESSION["order_id"] ?></label><br>
                    <label class="text-primary" style="font-size: 20px; "> โปรดจำรหัสคำสั่งซื้อนี้ เพื่อใช้ในการเช็คเลขพัสดุ. ขอบคุณค่ะ. </label>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
          </div>
      <?php } ?>

      <?php 
    if (!empty($_COOKIE["login_error"])){ ?>
      <script type="text/javascript">
          $(window).on('load',function(){
              $('#login_error').alert('fade');
                setTimeout(function(){
                  $('#login_error').alert('close');
                }, 3000);
            });
            $('#login_error').click(function(){
              $('login_error').alert('close');
            });
      </script>
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="login_error">
        <center>
          <strong>Login Error!</strong> Username หรือ Password ไม่ถูกต้อง.
        </center>       
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    
       <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light align-items-center waves-effect waves-light" style="margin-top: 180px;margin-bottom: 300px; border-radius: 20px;">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-12 mb-4 white-text text-center">
                    <img src="logo/logo1.png" style="width: 30%;">
                    <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>Welcome To Chalisa Shop</strong></h1>
                    <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                    <button data-target="#login" data-toggle="modal" class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">Log In</button>
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
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
        // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
  </script>

</body>
</html>