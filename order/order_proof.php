<?php 
  session_start();
  include '../connect.php';
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
	  <link href="../css/bootstrap.min.css" rel="stylesheet">
	  <!-- Material Design Bootstrap -->
	  <link href="../css/mdb.min.css" rel="stylesheet">
	  <!-- Your custom styles (optional) -->
	  <link href="../css/style.css" rel="stylesheet">
</head>

<body class="fixed-sn pink-skin" >

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
                        <a href="order/order_proof.php" class="waves-effect" style="font-size: 18px;"><i class="fas fa-shopping-basket"></i>&nbsp; ส่งหลักฐานการสั่งซื้อ </a>
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
      <form action="../check_track/check_track.php" method="post">
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
    	

   <!--Main layout-->
    <main>
       <!-- Mask & flexbox options-->
       <form action="upload_proof.php" method="post" enctype="multipart/form-data">
         <div class="mask rgba-black-light align-items-center waves-effect waves-light" style="margin-top: 50px;margin-bottom: 300px; border-radius: 30px;">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-12 mb-4 white-text text-center">
                    <img src="../logo/logo1.png" style="width: 20%; margin-top: 10px;">
                    <h3 class="h3-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>อัพโหลดหลักฐานการสั่งซื้อ</strong></h3>
                    <small class="text-danger">** หมายเหตุ กรุณาสรุปยอดจำนวนเงิน + การจัดส่ง ให้เรียบร้อย ก่อนการทำรายการ **</small>            
                  </div>
                  <div class="container">
                    <div class="form-row">
                      <div class="col">
                         <div class="md-form">
                          <i class="fas fa-user prefix pink-text"></i>
                          <input type="text" id="facebookName" name="facebookName" class="form-control validate white-text">
                          <label class="white-text" data-error="wrong" data-success="right" for="facebookName">Facebook Name</label>
                        </div>
                      </div>
                      <div class="col">
                         <div class="md-form">
                          <div class="file-field">
                            <div class="btn btn-pink btn-md float-left">
                              <span>Choose file</span>
                              <input type="file" name="proofConfirm[]" class="form-control" required="" accept="image/jpeg , image/png" accept-charset="utf-8" multiple="" class="white-text">
                            </div>
                            <div class="file-path-wrapper ">
                              <input class=" file-path validate white-text" type="text" placeholder="เสื้อที่จอง (CF)">
                            </div>
                          </div>
                          <small class="white-text">(capture ส่วนชื่อและเสื้อที่ F) สามารถอัพได้หลายภาพ</small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                          <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home"
                            role="tab" aria-controls="home">จัดส่งทั่วประเทศ</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile"
                            role="tab" aria-controls="profile">นัดรับบริเวณพื้นที่จังหวัดขอนแก่น (ส่งฟรี)</a>
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="form-inline">
                              <div class="col">
                                <div class="form-check btn btn-outline-white">
                                  <input type="radio" class="form-check-input" id="transport1" name="transport" value="1" required="">
                                  <label class="form-check-label " for="transport1" style="font-size: 18px;"> EMS + 50 บาท</label>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-check  btn btn-outline-white">
                                  <input type="radio" class="form-check-input" id="transport2" name="transport" value="2" required="">
                                  <label class="form-check-label " for="transport2" style="font-size: 18px;">KERRY + 60 บาท</label>
                                </div>
                              </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <div class="form-inline">
                              <div class="col">
                                <div class="form-check btn btn-outline-white">
                                  <input type="radio" class="form-check-input" id="transport3" name="transport" value="3" required="">
                                  <label class="form-check-label " for="transport3" style="font-size: 16px;">มหาวิทยาลัยขอนแก่น และ ระแวกใกล้เคียง</label>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-check  btn btn-outline-white">
                                  <input type="radio" class="form-check-input" id="transport4" name="transport" value="4" required="">
                                  <label class="form-check-label " for="transport4" style="font-size: 18px;">เซนทรัลขอนแก่น</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="md-form">
                        <button style="font-size: 16px;" class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#qrcode"><i class="fas fa-university"></i> เลขที่บัญชี</button>
                    </div>
                    <div class="md-form">
                      <div class="file-field">
                        <div class="btn btn-pink btn-md float-left">
                          <span>Choose file</span>
                          <input type="file" name="proofPayment" class="form-control" required="" accept="image/jpeg , image/png" accept-charset="utf-8"  class="white-text">
                        </div>
                        <div class="file-path-wrapper ">
                          <input class=" file-path validate white-text" type="text" placeholder="หลักฐานการโอนเงิน">
                        </div>
                      </div>
                      <small class="white-text">อัพโหลดหลักฐานการโอนเงิน (สลิปการโอน)</small>
                    </div>

                  </div>
                </div>
                  </div>             
                  <div class="col-md-12 mb-4 white-text text-center">
                    <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                    <button type="submit" class="btn btn-success wow fadeInDown" data-wow-delay="0.4s"><i class="fas fa-paper-plane"></i> Send</button>
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
       </form>

       <!-- Modal Bank -->
      <div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">เลขที่บัญชี</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="row text-center">
                <div class="col-12">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-bank1" role="tab" aria-controls="home">บัญชีที่ 1</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-bank2" role="tab" aria-controls="profile">บัญชีที่ 2</a>
                  </div>
                </div>
              </div><br><br>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-bank1" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="form-inline">
                    <div class="col text-center">
                      <div style="text-align: center;">
                        <img src="../img1/bank1.jpg" style="max-height: 400px; max-width: 550px;"><br><br>
                        -------------------------------------------
                        <br><br>                  
                        <label class="text-primary" style="font-size: 20px;"> เลขที่บัญชี : 984-2-90274-9 </label><br>
                        <label class="text-primary" style="font-size: 20px;"> ชื่อบัญชี : นางสาวชาลิสา ชัยสิทธิ์ </label><br>
                        <label class="text-primary" style="font-size: 20px;"> ธนาคาร : กรุงไทย </label><br>
                        -------------------------------------------<br><br>
                      </div>   
                    </div>  
                  </div>
                </div>
                <div class="tab-pane fade " id="list-bank2" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="form-inline">
                    <div class="col text-center">
                      <div style="text-align: center;">
                        <img src="../img1/bank2.png" style="max-height: 400px; max-width: 550px;"><br><br>
                        -------------------------------------------
                        <br><br>                  
                        <label class="text-primary" style="font-size: 20px;"> เลขที่บัญชี : 307-2-88822-6 </label><br>
                        <label class="text-primary" style="font-size: 20px;"> ชื่อบัญชี : นายสุริยพงศ์ มอญขาม </label><br>
                        <label class="text-primary" style="font-size: 20px;"> ธนาคาร : กสิกรไทย </label><br>
                        <label class="text-primary" style="font-size: 20px;"> พร้อมเพย์ : 0860896847 </label><br><br>
                        -------------------------------------------<br><br>
                      </div>   
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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