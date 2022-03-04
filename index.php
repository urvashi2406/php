<!DOCTYPE html>
 
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="sty.css">
    <script type="text/javascript" src="jquery/jquery.js"></script>
    
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   
    <script defer src="fontawesome/js/all.js"></script>


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Blood Donation Website">
        <meta name="author" content="Exceptional Programmers">
		 
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
   <?php
   include 'db.php'; 
   session_start();

   include 'nav.php';
   ?>
</div>
</div>
   <div class="container-fluid " style="background-image: url('img/header.png') !important;height:auto;background-position: center;background-size: cover;padding: 3%;">
				<div class="row px-0 mx-0">

					<div class="col-md-3 col-sm-3 col-3 ">
					</div>
					<div class="col-md-6 col-sm-6 col-6 " style="color: white;">
						 
							<h1 class="text-center">Donate blood, save a life</h1>
						<p class="text-center">Donate blood to help others.</p>
						
						<div style="padding: 3%;border-bottom: 4px solid darkgrey;">
						<h1 class="text-center">We are here to help you..</h1>
					   </div>
			 
					

				
					</div>

                          <div class="col-md-3 col-sm-3 col-3 ">
					</div>
				</div>
			</div>
		



		<div class="container-fluid bgc">
				<div class="row">
					<div class="col-md-12">
						 
						<p class="text-center pera-text">
							We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.

							We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
						</p>
						<a href="#" class="btn btn-default btn-lg text-center center-aligned">Become a Life Saver!</a>
					</div>
				</div>
			 </div>



			

			<div class="container-fluid mx-0 px-0" style="width: 100%;">
				<div class="row bg1 px-0 mx-0">
    				<div class="col-12 col-sm-12 col-md-4 wd">
    					<div class="card">
     						<h3 class="text-center red">Our Vission</h3>
								<img src="img/binoculars.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
									We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
								</p>
						</div>
    				</div>
    				
    				<div class="col-12 col-sm-12 col-md-4 wd">
    					<div class="card">
      							<h3 class="text-center red">Our Goal</h3>
								<img src="img/target.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
									We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
								</p>
						</div>
    				</div>
    			
    				<div class="col-12 col-sm-12 col-md-4 wd">
    					<div class="card">
      						<h3 class="text-center red">Our Mission</h3>
								<img src="img/goal.png" alt="Our Vission" class="img img-responsive" width="168" height="168">
								<p class="text-center">
									We are a group of exceptional programmers; our aim is to promote education. If you are a student, then contact us to secure your future. We deliver free international standard video lectures and content. We are also providing services in Web & Software Development.
								</p>
							</div>
   			 		</div>
 			</div>
 		</div>
 </div>

 	<?php
 	include 'contact.php';
 	?>
  
</body>
</html>