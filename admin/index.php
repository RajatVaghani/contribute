<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header('Location: dashboard.php');
}

 ?>
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

    <title>Contribute - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

	<link rel="stylesheet" href="../css/font-awesome.min.css">


	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="150">

   <?php

		include '../includes/admin_nav.php';

   ?>

    <!-- Begin page content -->

	<section id="main" class="sec container-fluid" style="min-height:180px;background: #006064;">
        <h3 style="text-align:center;color:#f7f7f7;">Admin - Login</h3>
	</section>


    <section class="sec container" style="border-bottom: none;">
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-xs-12">
                <div class="box">
                    <?php

                        if(isset($_GET['e'])){
                    ?>
                        <div class="alert alert-danger">
                            Please check username and password again.
                        </div>
                    <?php
                        }

                     ?>
                    <form class="form" action="action_login.php" method="post">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter Email" class="form-control" style="height: 45px;font-size: 15px;" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Enter Password" class="form-control" style="height: 45px;font-size: 15px;" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="strokebtn btn btn" style="padding: 9px;width: 100%;margin: 10px auto;">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>




	<?php

		include '../includes/admin_footer.php';

	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.scrollTo.min.js"></script>

	<script>

	// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
	var mainbottom = $('#main').offset().top;

	// on scroll,
	$(window).on('scroll',function(){

	    // we round here to reduce a little workload
	    var stop = Math.round($(window).scrollTop());

	    if (stop > 0) {
	        $('.navbar').addClass('past-main');
	    } else {
	        $('.navbar').removeClass('past-main');
	    }

	});



	</script>
    </body>
</html>
