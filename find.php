<?php 

	if(isset($_GET['find'])){
		$find = $_GET['find'];
		
		if($find=="school" || $find=="college"){
			
		}else{
			header('Location: index.php');
		}
		
	}else{
		header('Location: index.php');
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

    <title>Educate - Find <?php echo $find; ?>s</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	

  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="150">

   <?php
   	
		include 'includes/nav.php';
   
   ?>

    <!-- Begin page content -->
    
	
	<?php
		if($find=="school")
		{
	?>	
		
		<section id="main" class="sec container" style="text-align:center;">
			<div class="page-header" style="text-align:left;">
				<h2><a href="../"><i class="fa fa-angle-left"></i></a>&nbsp;&nbsp;Which board are you searching for?</h2>
			</div>
			<div class="btn-group" role="group" style="padding-top:30px;">
			  <a href="../schools/icse" class="btn btn-default mainop">ICSE/ISC</a>
			  <a href="../schools/cbse" class="btn btn-default mainop">CBSE</a>
			  <a href="../schools/ib" class="btn btn-default mainop">IB</a>
			  <a href="../schools/state" class="btn btn-default mainop">State Board</a>
			  <a href="../schools/any" class="btn btn-default mainop">All</a>
			</div>
		</section>
	
		
	<?php
		}
	?>
	
	

	


	<?php
	
		include 'includes/footer.php';
	
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

	    if (stop > mainbottom) {
	        $('.navbar').addClass('past-main');
	    } else {
	        $('.navbar').removeClass('past-main');
	    }

	});
	
	
	
	</script>
    </body>
</html>
