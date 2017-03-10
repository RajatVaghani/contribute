
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

    <title>Contribute - Be The Change | Welcome!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">




	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="100">

   <?php

		include 'includes/nav.php';

   ?>

    <!-- Begin page content -->

	<section id="main" class="sec container-fluid" style="text-align:center;min-height:100vh;background:url('images/bg.png');background-size:cover;">
		<div class="page-header" style="text-align:left;">
			<br/><br/><br/>
			<h2 style="color:#fff;text-align:center;">KINDNESS IS POWERFUL</h2>
		</div>
		<p class="introtext">
			Help us in our support for humanitarian causes.<br/>
			Create Change. Motivate Change. <b>Be The Change!</b>
		</p>
		<div class="btn-group" role="group" style="padding-top:100px;">
		  <a href="search.php" class="btn btn-default mainop">I'm in!</a>
		</div>
	</section>



	<section class="sec container-fluid" style="background:#eee;">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
	                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
					<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
					  <!-- Carousel indicators -->
	                  <ol class="carousel-indicators">
					    <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
					    <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
					    <li data-target="#fade-quote-carousel" data-slide-to="2"></li>
					  </ol>
					  <!-- Carousel items -->
					  <div class="carousel-inner">
					    <div class="active item">
					    	<blockquote>
					    		<p>"The best way to find yourself is to lose yourself in the service of others." -<br/><b>Gandhi</b></p>
					    	</blockquote>
					    	<div class="profile-circle" style="background-image: url('images/quote1.png');background-size: cover;"></div>
					    </div>
					    <div class="item">
					    	<blockquote>
					    		<p>"I slept and dreamt that life was joy. I awoke and saw that life was service. I acted and behold, service was joy." - <b>Rabindranath Tagore</b></p>
					    	</blockquote>
					    	<div class="profile-circle" style="background-image: url('images/quote2.png');background-size: cover;"></div>
					    </div>
					    <div class="item">
					    	<blockquote>
					    		<p>"The most worth-while thing is to try to put happiness into the lives of others." - <b>Robert Baden-Powell</b></p>
					    	</blockquote>
					    	<div class="profile-circle" style="background-image: url('images/quote3.png');background-size: cover;"></div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<section class="sec container-fluid threecols">
		<div class="col-xs-12 col-md-4 colfirst">
			<div class="colbox">
				<div class="colheader"><i class="fa fa-star-o"></i>&nbsp;&nbsp;FAVORITE OF THE MONTH</div>
				<div class="colbody">Sample organization</div>
			</div>
		</div>


		<div class="col-xs-12 col-md-4 colsecond">
			<div class="colbox">
				<div class="colheader"><i class="fa fa-flag-o"></i>&nbsp;&nbsp;OUR PURPOSE</div>
				<div class="colbody" style="text-align:justify">
				<img src="images/home-promo.png" class="img-responsive" style="border-radius:5px;"/>
				<br/>
				We are an extensive directory for all information you could require about the cause you are interested in supporting. We don’t have any processing fees, registrations fees or anything to do with how any of them operate. We are here to help you only!</div>
			</div>
		</div>


		<div class="col-xs-12 col-md-4 colthird">
			<div class="colbox">
				<div class="colheader"><i class="fa fa-hand-peace-o"></i>&nbsp;&nbsp;100% GENUINE</div>
				<div class="colbody" style="text-align:justify">
				<img src="images/buildings.png" class="img-responsive" style="border-radius:5px;"/>
				<br/>
				All causes, organizations, institutions, facilities and alike have been personally reviewed by our team and have been listed after critical verification only.</div>
			</div>
		</div>
	</section>



	<section class="sec container-fluid" style="background:url('images/bg_giving.png');background-size:cover;">
		<div class="container">
			<br/><br/>
			<h2 style="text-align:center;color:#fff">Give in any way possible!</h2>
			<br/><br/><br/>
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_blood.png" style="width:130px;height:130px;" onmouseover="change(1)" onmouseout="resetall()" id="give_1" data-toggle="popover" data-content="Give Blood" data-placement="top"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_clothes.png" style="width:130px;height:130px;" onmouseover="change(2)" onmouseout="resetall()" id="give_2" data-toggle="popover" data-content="Give Clothes" data-placement="top"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_education.png" style="width:130px;height:130px;" onmouseover="change(3)" onmouseout="resetall()" id="give_3" data-toggle="popover" data-content="Give Education" data-placement="top"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_food.png" style="width:130px;height:130px;" onmouseover="change(4)" onmouseout="resetall()" id="give_4" data-toggle="popover" data-content="Give Food" data-placement="top"/>
				</div>
			</div>
			<br/><br/>
			<div class="row">
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_gift.png" style="width:130px;height:130px;" onmouseover="change(5)" onmouseout="resetall()" id="give_5" data-toggle="popover" data-content="Give Gifts" data-placement="bottom"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_money.png" style="width:130px;height:130px;" onmouseover="change(6)" onmouseout="resetall()" id="give_6" data-toggle="popover" data-content="Give Money" data-placement="bottom"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_old.png" style="width:130px;height:130px;" onmouseover="change(7)" onmouseout="resetall()" id="give_7" data-toggle="popover" data-content="Give Old Belongings" data-placement="bottom"/>
				</div>
				<div class="col-sm-3 col-xs-12" style="text-align:center;">
					<img src="images/gives/give_time.png" style="width:130px;height:130px;" onmouseover="change(8)" onmouseout="resetall()" id="give_8" data-toggle="popover" data-content="Give Time" data-placement="bottom"/>
				</div>
			</div>
			<br/><br/>
			<br/><br/><br/>

		</div>
	</section>

	<section class="sec_button container-fluid">
		<a href="search.php" class="fillbtn btn btn-lg">I WANT TO CONTRIBUTE</a>
		<a href="" class="strokebtn btn btn-lg">CONTACT US</a>
	</section>


	<?php

		include 'includes/footer.php';

	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$('[data-toggle="popover"]').popover()
	</script>
	<script src="js/jquery.scrollTo.min.js"></script>

	<script>

	// get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
	var mainbottom = $('#main').offset().top - 50;

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


	function change(a){
		if(a==1){
			$('#give_1').popover('show')
			document.getElementById("give_1").setAttribute('src', 'images/gives/give_blood_hover.png');
		}else if(a==2){
			document.getElementById("give_2").setAttribute('src', 'images/gives/give_clothes_hover.png');
			$('#give_2').popover('show')
		}else if(a==3){
			document.getElementById("give_3").setAttribute('src', 'images/gives/give_education_hover.png');
			$('#give_3').popover('show')
		}else if(a==4){
			document.getElementById("give_4").setAttribute('src', 'images/gives/give_food_hover.png');
			$('#give_4').popover('show')
		}else if(a==5){
			document.getElementById("give_5").setAttribute('src', 'images/gives/give_gift_hover.png');
			$('#give_5').popover('show')
		}else if(a==6){
			document.getElementById("give_6").setAttribute('src', 'images/gives/give_money_hover.png');
			$('#give_6').popover('show')
		}else if(a==7){
			document.getElementById("give_7").setAttribute('src', 'images/gives/give_old_hover.png');
			$('#give_7').popover('show')
		}else if(a==8){
			document.getElementById("give_8").setAttribute('src', 'images/gives/give_time_hover.png');
			$('#give_8').popover('show')
		}
	}

	function resetall(){
		document.getElementById("give_1").setAttribute('src', 'images/gives/give_blood.png');
		document.getElementById("give_2").setAttribute('src', 'images/gives/give_clothes.png');
		document.getElementById("give_3").setAttribute('src', 'images/gives/give_education.png');
		document.getElementById("give_4").setAttribute('src', 'images/gives/give_food.png');
		document.getElementById("give_5").setAttribute('src', 'images/gives/give_gift.png');
		document.getElementById("give_6").setAttribute('src', 'images/gives/give_money.png');
		document.getElementById("give_7").setAttribute('src', 'images/gives/give_old.png');
		document.getElementById("give_8").setAttribute('src', 'images/gives/give_time.png');
			$('#give_1').popover('hide')
			$('#give_2').popover('hide')
			$('#give_3').popover('hide')
			$('#give_4').popover('hide')
			$('#give_5').popover('hide')
			$('#give_6').popover('hide')
			$('#give_7').popover('hide')
			$('#give_8').popover('hide')
	}

	</script>
    </body>
</html>
