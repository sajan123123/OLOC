<?php
  //session_start();
  include('BackEnd/admin/inc/config.php');
  
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Travel and Tour management </title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">			
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			 <?php include("inc/nav.php");?>


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12 col-md-6 ">
							<h6 class="text-white ">One Life One Choice</h6>
							<h1 class="text-white text-uppercase">
								The daries of memories.
							</h1>
							<p class="pt-20 pb-20 text-white">
									Welcome to OLOC
							</p>
							<a href="#service" class="primary-btn text-uppercase">Explore</a>
						</div>
																
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>What Services we offer to our clients</h1>
							<p>
								We think travel in itself is a success. It’s an explosive expression of humanity. It’s something we are all touched by. No matter where are we from, everyone loves to travel.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-user"></span>Touring</h4>
								<p>
									Touring and exploring are our main aim.
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-license"></span>Reveiws</h4>
								<p>
									
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-phone"></span>Customer Support</h4>
								<p>
									  Best travel and tour provider.
								</p>								
							</div>
						</div>
					
					</div>
				</div>	
			</section>
			<!-- End feature Area -->		

			<!-- Start home-about Area -->
			<section class="home-about-area" id="about">
				<div class="container-fluid">				
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 no-padding home-about-left">
							<img class="img-fluid" src="img/ba.jpg" alt="">
						</div>
						<div class="col-lg-6 no-padding home-about-right">
							<h1>One Life One Choice<br>
							</h1>
							<p>
								<span>We live to travel.</span>
							</p>
							<p>

							</p>
							<a class="text-uppercase primary-btn" href="instruments.php">View tour Packages</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->	

			<!-- Start reviews Area -->

             <section class="reviews-area section-gap" id="review">
                 <div class="container">
                     <div class="row d-flex justify-content-center">
                         <div class="col-md-8 pb-40 header-text text-center">
                             <h1>Our Satisfied Client Feedbacks</h1>
                             <p class="mb-10 text-center">
                                 This is why we are leading in this rental gig.
                             </p>
                         </div>
                     </div>
                     <!--Display Core testimonials-->
                     <div class="row">

                         <!--Get remaining testimonials from database-->
                         <?php
                         //get details of all published feedbacks
                         $ret="SELECT * FROM feedbacks WHERE f_status = 'Published'  ORDER BY RAND() ";
                         $stmt= $mysqli->prepare($ret) ;
                         $stmt->execute() ;//ok
                         $res=$stmt->get_result();
                         $cnt=1;
                         while($row=$res->fetch_object())
                         {
                             ?>

                             <div class="col-lg-4 col-md-6">
                                 <div class="single-review">
                                     <h4><?php echo $row->user_name;?></h4>
                                     <p>
                                         <?php echo $row->feedback;?>
                                     </p>
                                     <div class="star">
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                         <span class="fa fa-star checked"></span>
                                     </div>
                                 </div>
                             </div>

                         <?php }?>

                     </div>
                 </div>
             </section>
			<!-- End reviews Area -->
			


			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Latest From Our Blog</h1>
								<p>Enjoy the essence of music.</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b1.jpg" alt="">								
							</div>
							<p class="date">10 2018</p>
							<a href=""><h4>JP majesty best guitar in the town.</h4></a>
							
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 29K Likes</p>
								<p><span class="lnr lnr-bubble"></span> 10K Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b2.jpg" alt="">								
							</div>
							<p class="date">10 June 2018</p>
							<a href=""><h4>trun your hobbie into life.</h4></a>
							
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15K Likes</p>
								<p><span class="lnr lnr-bubble"></span> 20K Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b3.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href=""><h4>How to customize your own music creation.</h4></a>
							
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 150K Likes</p>
								<p><span class="lnr lnr-bubble"></span> 200K Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b4.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2019</p>
							<a href=""><h4>Playing the way you dream.</h4></a>
							
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 50K Likes</p>
								<p><span class="lnr lnr-bubble"></span> 20K Comments</p>
							</div>									
						</div>							
					</div>
				</div>	
			</section>
			<!-- End blog Area -->


			<!-- start footer Area -->		
				<?php include('inc/footer.php');?>
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>			
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



