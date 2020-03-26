<?php
require_once './admin/config.php';
// logo
$result_logo = mysqli_query($con, "select * from tbl_logo where id = 1 ");
$row_logo = mysqli_fetch_assoc($result_logo);
    

// end logo
// 
//title
$result_title = mysqli_query($con, "select * from tbl_title where id = 1 ");
$row_title = mysqli_fetch_assoc($result_title);
    
//end tilte
// slider part
 $result = mysqli_query($con, "select * from tbl_slider ");                
// end slider part
 
// about us  part 
 $result_about = mysqli_query($con, "select * from tbl_aboutus where id = 1 ");
$row_about = mysqli_fetch_assoc($result_about);
// end about us  part 
// 
// service part 
 $result_service = mysqli_query($con, "select * from tbl_service where id = 1 ");
$row_service = mysqli_fetch_assoc($result_service);
// end service part
//
// portfolio part
 $result_portfolio = mysqli_query($con, "select * from tbl_portfolio");

 
// end portfolip part
// 
// footer part
$result_footer = mysqli_query($con, "select * from tbl_footer where id = 1 ");
$row_footer = mysqli_fetch_assoc($result_footer);
  
// end footer part
//
//shareicon part
$result_icon = mysqli_query($con, "select * from tbl_shareicon  ");

// end shareicon part

$result_footerimage = mysqli_query($con, "select * from tbl_footer_image");

if(isset($_REQUEST['submit'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $gettbl_contact = mysqli_query($con," INSERT INTO tbl_contact(name,email,subject,message)"
            
            . "VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['message']."')");
}
$select_query = mysqli_query($con, "SELECT * FROM `tbl_contact` ");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
	<title><?=$row_title['title_main_title']?></title>
        <meta name="description" content="<?=$row_title['title_text1']?>">
	<meta name="keywords" content="<?=$row_title['title_sub_title']?>">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link href="css/lightbox.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" href="admin/images/<?= $row_logo['image']?>" type="image/gif" sizes="16x16"> 
        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body id="top" data-spy="scroll">
	<header id="home">
		<section class="top-nav hidden-xs">
		
		</section>

		<div id="main-nav">

			<nav class="navbar">
				<div class="container">

					<div class="navbar-header">
						<a href="index.html" class=""><img src="admin/images/<?= $row_logo['image']?>"></a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="navbar-collapse collapse" id="ftheme">

						<ul class="nav navbar-nav navbar-right">
							<li><a href="#home">home</a></li>
                                                        <?php
                                                        if(!empty($row_about['switch']))
                                                        {
                                                        ?> 
							<li><a href="#about">about</a></li>
                                                        <?php }
                                                        if(!empty($row_service['switch']))
                                                        {
                                                        ?>
							<li><a href="#service">services</a></li>
                                                        <?php }
                                                        ?>
							<li><a href="#portfolio">portfolio</a></li>
                                                        <?php
                                                        if(!empty($row_footer['switch']))
                                                        {
                                                        ?>
							<li><a href="#contact">contact</a></li>
                                                        <?php } ?>
                                                        <li class="hidden-sm hidden-xs">
								<a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
							</li>
						</ul>

					</div>

					<div class="search-form">
						<form>
							<input type="text" id="s" size="40" placeholder="Search..." />
						</form>
					</div>

				</div>
			</nav>
		</div>

	</header>

	<!--slider-->
	<div id="slider" class="flexslider">

		<ul class="slides">
                    
        <?php
           
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <li>
                        <img src="admin/images/<?=$row['image']?>" style="width: 100%">
			</li>
            <?php }
            ?>
                        
		</ul>

	</div>

        
       <?php
       if(!empty($row_about['switch']))
       {
       ?> 
	<!--about-->
	<div id="about">
              
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<div class="about-heading">
                                            <h2 class="about"><?=$row_about['main_title']?></h2>
						<p><?=$row_about['sub_title']?></p>
					</div>
				</div>
			</div>
		</div>

		<!--about wrapper left-->
		<div class="container">

			<div class="row">
				

				<!--about wrapper right-->
				<div class="col-xs-12 col-md-7">
					<div class="about-right">
						<div class="about-right-heading">
							<h1><?=$row_about['main_title2']?></h1>
						</div>

						<div class="about-right-boot">
							<div class="about-right-wrapper">
								<a href="#"><h3><?=$row_about['sub_title1']?></h3></a>
                                                                <p><?=$row_about['text1']?></p>
                                                        </div>
						</div>

						<div class="about-right-best">
							<div class="about-right-wrapper">
								<a href="#"><h3><?=$row_about['sub_title2']?></h3></a>
								<p><?=$row_about['text2']?></p>
							</div>
						</div>

						<div class="about-right-support">
							<div class="about-right-wrapper">
                                                            
								<a href="#"><h3><?=$row_about['sub_title3']?></h3></a>
								<p><?=$row_about['text3']?></p>
							</div>
						</div>

					</div>
				</div>
                                <div class="col-xs-12 hidden-sm col-md-5">

					<div class="about-left">
                                            <img src="admin/images/<?=$row_about['image']?>"  alt="">
					</div>

				</div>
			</div>

		</div>
	</div>
       <?php }
       
       ?>
	<!--service-->
        <?php
       if(!empty($row_service['switch']))
       {
           ?>
	<div id="service">
            <div class="container" >
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-offset-3">
					<div class="service-heading">
                                            <h2 class="service"><?=$row_service['service_title']?></h2>
						<p><?=$row_service['sub_service']?></p>
					</div>
				</div>
			</div>
		</div>

		<!--services wrapper-->
		<section class="services">
			

				<div class="contener">
					
                                    <div style="text-align: center;">
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                      <i class="<?=$row_service['icon1']?>" style="font-size:48px;color:#01b1d7;"></i>
                                                      <h2><?=$row_service['main_title1']?></h2>
                                                      <p><?=$row_service['text1']?></p>
                                                        </div>
                                                        <div class="col-md-4">
                                                   <i class="<?=$row_service['icon2']?>" style="font-size:48px;color:#01b1d7;"></i>
                                                        <h2><?=$row_service['main_title2']?></h2>
                                                      <p><?=$row_service['text2']?></p>
                                                      
                                                        </div>
                                                        <div class="col-md-4">
                                                            <i class="<?=$row_service['icon3']?>" style="font-size:48px;color:#01b1d7;"></i>
                                                        <h2><?=$row_service['main_title3']?></h2>
                                                        <p><?=$row_service['text3']?></p>
                                                      
                                                        </div>
                                                        
                                                    </div>
                                        
                                        
							
                                                
                                                </div>              
                         </div>
		</section>

        </div>
        <?php 
        }
        ?>
	
	<!--portfolio-->
	<div id="portfolio">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<div class="portfolio-heading">
						<h2 style="margin-top: 10px;">portfolio</h2>
						<p>Usually in chronological order. For example, you can write a narrative paragraph detailng what you management</p>
					</div>
				</div>

			</div>
		</div>

		<div class="portfolio-thumbnail">
			<div class="container-fluid">
				<div class="row">
                                    <?php
                                       while ($row_portfolio = mysqli_fetch_assoc($result_portfolio)) {
                                    
                                     ?>	
                                    <div class="col-xs-6 col-sm-3 col-md-3">
                                            <a href="admin/images/<?=$row_portfolio['image']?>" class="link-preview" data-lightbox="portfolio" data-title="Taylor Ava" title="Preview">
					
						<div class="item">
                                                    <img src="admin/images/<?=$row_portfolio['image']?>" alt="">
							<div class="caption">
								<i class="fa fa-search" aria-hidden="true"></i>
								<p><?=$row_portfolio['name']?></p>
							</div>
                                                </div></a>
                                                </div>
                                                <?php					
                                                }
                                                ?>
					
					

					
					

					

					
					

				</div>
			</div>
		</div>
	</div>

	<!--contact form-->
        <?php
       if(!empty($row_footer['switch']))
       {
       ?> 
         <div id="contact">
	<div id="get-touch">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<div class="get-touch-heading">
                                            <h2 class="contact">CONTACT</h2>
						<p>Usually in chronological order. For example, you can write a narrative paragraph detailng what you management</p>
				</div>
				</div>
			</div>
                   

			<div class="content">
				<div class="row">
					<div id="sendmessage">Your message has been sent. Thank you!</div>
					<div id="errormessage"></div>

                                        <form action="" method="post" role="form" class="form contactForm">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
								<div class="validation"></div>
							</div>
						</div>
						<div class="submit">
                                                    <button class="btn btn-default" name="submit" type="submit">Send Now</button>
						</div>
					</form>
				</div>
			</div></div>
		</div>
	</div>
       <?php } ?>

	<!--contact-->
	
		

		


	<!--client-->
	<div id="client">
		<div class="container">
			<?php
           
            while ($row_icon = mysqli_fetch_assoc($result_icon)) {
                ?>
                    <a href="<?=$row_icon['link']?>" target="<?=!empty($row_icon['target'])?'_blank':""?>"><i class="<?=$row_icon['icon']?>" style="font-size:25px;color:gray"></i></a>
          
		<?php
            }
            ?>
                </div>
	</div>

	<!--footer-->
	<div id="footer">
            <div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer-heading" style="color: white;">
						<h3><span><?=$row_footer['about_title']?></span> </h3>
						<p  style="color: white;"><?=$row_footer['about']?></p>
				
					</div>
				</div>

				<div class="col-md-4">
					<div class="footer-heading">
						<h3><span><?=$row_footer['latest_title']?></span></h3>
	
                                                
                                                <ul  style="color: white;">
							<li><a href="#"  style="color: white;"><?=$row_footer['latest']?></a></li>
						</ul>
                                    
            
            
                                                
					</div>
				</div>

				<div class="col-md-4">
					<div class="footer-heading">
						<h3><span><?=$row_footer['instagram_title']?></span></h3>
						     <?php
           
            while ($row_footerimage = mysqli_fetch_assoc($result_footerimage)) {
                ?>
                                                <div class="insta">
                                               
							<ul>
                                                            <img src="admin/images/<?=$row_footerimage['image']?>" alt="">
                                                         
							</ul>
          
						</div>
                                                     <?php
            }
            ?>
                                                
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--bottom footer-->
	<div id="bottom-footer" class="hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="footer-left">
						&copy; Bladephp Theme. All rights reserved
						<div class="credits">
							
                                                    Designed by <a href="<?=$row_footer['designed']?>">Bladephp</a>
						</div>
					</div>
				</div>

				<div class="col-md-8">
					<div class="footer-right">
						<ul class="list-unstyled list-inline pull-right">
							<li><a href="#home">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#service">Service</a></li>
							<li><a href="#portfolo">Portfolio</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
	<script src="js/jquery.inview.js"></script>
	<script src="js/script.js"></script>
	<!--<script src="contactform/contactform.js"></script>-->

</body>

</html>
