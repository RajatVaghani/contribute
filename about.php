
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Contribute - About Us</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="css/font-awesome.min.css">


	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="150">

   <?php

		include 'includes/nav.php';

   ?>

    <!-- Begin page content -->

	<section id="main" class="sec container-fluid" style="border-bottom:none">
        <h1 class="page-header">About Us</h1>
	</section>

    <section class="sec container-fluid" style="background:#eee;padding:50px">
        <h1 class="page-header" style="border-bottom:1px solid #ddd">Our Vision</h1>
    </section>

    <section class="sec container-fluid" style="padding:50px;">
        <h1 class="page-header">Our Team</h1>
    </section>



	<?php

		include 'includes/footer.php';

	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>

	<script>

	// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
	var mainbottom = $('#main').offset().top;

	// on scroll,
	$(window).on('scroll',function(){

	    // we round here to reduce a little workload
	    var stop = Math.round($(window).scrollTop());

	    if (stop > mainbottom) {
	        $('.navbar').addClass('past-main');
	    } else {
	        $('.navbar').removeClass('past-main');
	    }

	});



	</script>
    </body>
</html>
