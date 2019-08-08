<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<meta charset="UTF-8">
	<title>Kênh tra cứu Milkcomp1</title>
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700,300italic' rel='stylesheet'
		type='text/css'>
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" href="css/animat/animate.min.css" />
	<link rel="stylesheet" href="css/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox.css" />
	<link rel="stylesheet" href="css/themes/default/default.css" />
	<link rel="stylesheet" href="css/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="css/owl-carousel/owl.theme.css" />
	<link rel="stylesheet" href="css/owl-carousel/owl.transitions.css">

	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css" />
</head>
<?php 
	$id = $_GET['id'];
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL => 'localhost:3004/api/Unit/'.$id,
		CURLOPT_USERAGENT => 'Test cURL GET Request',
		CURLOPT_SSL_VERIFYPEER => false
	));	
	$resp = curl_exec($curl);
	$val_arr = json_decode($resp, true);
	curl_close($curl);
?>

<body>
	<div class='preloader'>
		<div class='loaded'>&nbsp;</div>
	</div>
	<header id="home" class="header">
		<div class="main_menu_bg navbar-fixed-top wow slideInDown" data-wow-duration="1s">
			<div class="container">
				<div class="row">
					<div class="nave_menu">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
										data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>

								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

									<ul class="nav navbar-nav navbar-right">
										<li class="active"><a href="#home">Trang chủ</a></li>
										<li><a href="#abouts">Tra cứu</a></li>
										<li><a href="#features">Thành viên</a></li>
										<li><a href="#footer">Về chúng tôi</a></li>
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
				<!--End of row -->

			</div>
			<!--End of container -->

		</div>
	</header>
	<!--End of header -->

	<section id="banner" class="banner">
		<div class="container">
			<div class="row">
				<div class="main_banner_area text-center">
					<div class="col-md-8 col-sm-8 col-md-offset-4 col-sm-offset-4">
						<div class="single_banner_text wow zoomIn" data-wow-duration="1s">
							<p>Kính chào quý khách</p>
							<div class="separetor"></div>
						</div>
					</div>
					<div class="scrolldown">
						<a href="#abouts" class="scroll_btn"></a>
					</div>
				</div>


			</div>
		</div>
	</section><!-- End of Banner Section -->

	<section id="abouts" class="abouts sections">
		<div class="container">
			<div class="row">
				<div class="main_abouts">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="single_abouts wow slideInLeft" data-wow-duration="2s">
							<div class="head_title text-center">
								<h2 style="color:black;">Tra cứu thông tin</h2>
								<div class="separetor"></div>
								<div class="info-table">
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Tên sản phẩm</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo $val_arr['unitName'] ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Mã sản phẩm</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo $val_arr['unitId']; ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4" >Thuộc lô hàng</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo $val_arr['parcelId'] ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Đặc điểm</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo $val_arr['description'] ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Ngày lên kệ</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo date('d/m/Y H:i:s',strtotime($val_arr['sellingDate'])); ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Ngày bán</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php echo date('d/m/Y H:i:s',strtotime($val_arr['soldDate'])); ?>
										</div>
									</div>
									<div class="row-info">
										<div class="key-info col-sm-4 col-md-4 col-xs-4">Thuộc sở hữu</div>
										<div class="val-info col-md-8 col-sm-8 col-xs-8">
											<?php 
												$ownerid = explode('#',$val_arr['owner'],2)[1];
												$curl = curl_init();
												curl_setopt_array($curl, array(
													CURLOPT_RETURNTRANSFER => true,
													CURLOPT_URL => 'localhost:3004/api/Trader/'.$ownerid,
													CURLOPT_USERAGENT => 'cURL GET Request',
													CURLOPT_SSL_VERIFYPEER => false
												));	
												$resp = curl_exec($curl);
												$val = json_decode($resp, true);
												curl_close($curl);
												echo $val['name'];
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="single_abouts wow slideInRight" data-wow-duration="2s">
							<img src="images/s.png" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End of Abouts Section -->

	<section id="features" class="features sections">
		<div class="container">
			<div class="row">
				<div class="features_content text-center">
					<div class="col-md-4">
						<div class="sinle_features wow slideInUp" data-wow-duration="1s">
							<img src="images/icon1.png" alt="" />
							<h5>Turnip greens</h5>

						</div>
					</div>
					<div class="col-md-4">
						<div class="sinle_features wow slideInUp" data-wow-duration="1.5s">
							<img src="images/icon1.png" alt="" />
							<h5>Turnip greens</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc Pellentesque vel enim a elit viverra
								elementuma. Aliquam erat volutpat. </p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sinle_features wow slideInUp" data-wow-duration="2s">
							<img src="images/icon1.png" alt="" />
							<h5>Turnip greens</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisc Pellentesque vel enim a elit viverra
								elementuma. Aliquam erat volutpat. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End of Abouts Section -->

	<!-- <section id="special" class="special sections">
		<div class="container">
			<div class="row">
				<div class="head_title text-center wow slideInLeft" data-wow-duration="1.5s">
					<h2>This month specials</h2>
					<div class="separetor"></div>
				</div>
				<div class="main_special text-center wow slideInUp" data-wow-duration="3s">
					
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/s1.png" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p2.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p3.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p4.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p5.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p6.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p6.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p5.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p4.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p3.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/p2.jpg" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="images/s1.png" alt="" />
							<div class="single_special_overlay text-center">
								<h3>Greens fava</h3>
								<div class="overlay_separetor"></div>
								<p>Lorem ipsum dolor sit Pellentesque vel enim a</p>
								<p>17$</p>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<!-- footer Section -->
	<footer id="footer" class="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-5 col-sm-offset-7 col-xs-10 col-xs-offset-2">
					<div class="contact_area wow slideInLeft" data-wow-duration="2s">
						<div class="head_title text-center">
							<h2>Contact</h2>
							<div class="separetor"></div>
						</div>

						<div class="main_contact_content">
							<div class="row">
								<div class="col-sm-6">
									<div class="single_contact text-left">
										<h5>Veggie </h5>
										<span>3428 Magnolia Avenue</span>
										<span>Hackettstown, NJ 07840</span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="single_contact text-left">
										<h5>Reservations</h5>
										<span>reservations@vegggie.com</span>
										<span>+48 202-555-0114</span>
									</div>
								</div>
							</div>

							<div class="contact_form_area">
								<h3>Contact form</h3>
								<form action="#" id="formid">
									<div class="row">
										<div class="col-sm-6 col-xs-6">
											<div class="form-group">
												<input type="text" class="form-control" name="name"
													placeholder="first name">
											</div>
										</div>

										<div class="col-sm-6 col-xs-6">
											<div class="form-group">
												<input type="email" class="form-control" name="email"
													placeholder="Email">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<textarea class="form-control" name="message" rows="3"
													placeholder="Message"></textarea>
											</div>


										</div>

										<div class="form_btn_area text-center">
											<a href="" class="btn">Send</a>
										</div>
									</div>
								</form>
							</div>

						</div>

					</div>
				</div>
			</div>


			<div class="row">
				<div class="copyright_text_area">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_footer text-right wow zoomIn" data-wow-duration="2s">
							<p>Made with <i class="fa fa-heart"></i> by <a href="http://bootstrapthemes.co">Bootstrap
									Themes</a>2016. All Rights Reserved</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="single_footer text-right">

							<div class="footer_socail wow zoomIn" data-wow-duration="1.5s">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- STRAT SCROLL TO TOP -->
	<div class="scrollup">
		<a href="#"><i class="fa fa-chevron-up"></i></a>
	</div>
	<script type="text/javascript" src="js/jquery/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="js/nivo-lightbox/nivo-lightbox.min.js"></script>
	<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery-easing/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/wow/wow.min.js"></script>
</body>

</html>