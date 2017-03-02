<?php 

	if(isset($_GET['board'])){
		$find = $_GET['board'];
		
		if($find=="icse" || $find=="cbse" || $find=="ib" || $find=="state" || $find=="any"){
			$find = strtoupper($find);
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
    <link rel="icon" href="../images/favicon.ico">

    <title>Educate - Find '<?php echo $find; ?> Board' Schools</title>

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
   	
		include 'includes/nav.php';
   
   ?>

    <!-- Begin page content -->
    
	
	
		<header id="main" style="margin-top: 65px;">
		    <div class="container">
		        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
		            <div class="alert alert-info vertical-center" style="text-align:center;">
		                <p>Searching for schools that follow <strong>'<?php echo $find; ?>'</strong> Board</p>
		            </div>
					<div style="text-align:center;">
						<a tabindex="0" class="btn btn-sm btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="Select Board" data-content="<a href='icse'>ICSE</a><br/><a href='cbse'>CBSE</a><br/><a href='ib'>IB</a><br/><a href='state'>State</a><br/><a href='any'>All</a>" data-html="true">Change Option</a>
					</div>
		        </div>
		    </div>
		</header>
		
		<!-- !!!!!!!!!!!!!!!!!!!!!!  FILTERS !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		
		<div class="container" style="border-top: 1px solid #ddd;padding-top: 50px;padding-bottom:50px;">
		    <div class="hidden-xs col-sm-3">
		        <div class="fading-side-menu" data-spy="affix" data-offset-top="200">
		            <h4>Filters</h4><hr class="no-margin">
		            <ul id="filters" class="list-unstyled">
		                <li id="verified_ones">
		                   <div class="checkbox">
							  <label>
							    <input type="checkbox" value="1" class="filter_verified">
							    Show Verified Only
							  </label>
							</div>
		                </li>
		                <li id="city_ones">
		                    <div class="page-header">
								Based on City
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="Bangalore" class="filter_city">
							    Bangalore
							  </label>
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="Chennai" class="filter_city">
							    Chennai
							  </label>
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="Hyderabad" class="filter_city">
							    Hyderabad
							  </label>
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="Kolkata" class="filter_city">
							    Kolkata
							  </label>
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="Mumbai" class="filter_city">
							    Mumbai
							  </label>
							</div>
							<div class="checkbox">
							  <label>
							    <input type="checkbox" value="New Delhi" class="filter_city">
							    New Delhi
							  </label>
							</div>
		                </li>
		                <li>
		                    
		                </li>
		            </ul>
		        </div>
		    </div>
		
			<!-- !!!!!!!!!!!!!!!!!!!!!!  CONTENT !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		
		    
		    <div class="col-xs-12 col-sm-9">
			
			<?php
			
			include 'includes/db.php';
			$q = strtolower($find);
			if($q=="any"){			
				$sql="SELECT * FROM schools ORDER BY id";
			}else if($q=="state"){
				$sql="SELECT * FROM schools WHERE board<>'icse' AND board<>'cbse' AND board<>'ib' ORDER BY id";
			}else{
				$sql="SELECT * FROM schools WHERE board='$q' ORDER BY id";
			}
			$result=mysqli_query($con,$sql);
			//echo $sql;
			$c=0;
			
			while($row=mysqli_fetch_assoc($result)){
				$c++;
			?>
						
		    	    <div class="institution" data-tag-verified="<?php echo $row['verified'];?>" data-tag-city="<?php echo $row['city'];?>">
						<div class="row">
							<div class="col-xs-12 col-sm-2">
								<img class="thumb" src="" alt="img" style="width:60px;height:60px;"/>
							</div>
							<div class="col-xs-12 col-sm-9">
								<p class="instname"><?php echo $row['name'];?></p>
								<p class="place"><?php echo $row['city'];?>, <?php echo $row['state'];?></p>
								<?php 
									if($q=="any"){
								?>
									<p class="place">Board: <?php echo strtoupper($row['board']);?></p>
								<?php
									}
								?>
							</div>
						</div>
						<div class="btnmore">
							<a href="view/<?php echo $row['id'];?>" class="btn btn-default btn-sm">Read More</a>
							<?php
								if($row['verified']==1){
									
							?>
							<span class="label label-info verilabel">Verified</span>
							<?php
							
								}
							?>
						</div>
					</div>
			
					
			
			<?php
				}
				
				if($c==0){
			?>
			
				<div id="noresults" style="display:block;">
					<p style="margin-top:9px;">NO RESULTS FOUND</p>
				</div>
				
			<?php		
			
				}else{
					
				?>
				<div id="noresults" style="display:none;">
					<p style="margin-top:9px;">NO RESULTS FOUND</p>
				</div>
				<?php
				}
			?>	
					
					
			</div>
		</div>
	
	

	


	<?php
	
		include 'includes/footer.php';
	
	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<script>
	$('[data-toggle="popover"]').popover()
	</script>
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
	
	
	
	  $('.filter_verified').on('change', function(){
	   		apply_filters();
		});
	
	
	
	
	
	
	  $('.filter_city').on('change', function(){
	    	apply_filters();
		});
		
		
		function apply_filters(){
			var category_list = [];
		    $('#filters :input:checked').each(function(){
		      var category = $(this).val();
			  console.log(category);
		      category_list.push(category); //Push each check item's value into an array
		    });

		    if(category_list.length == 0){
		        $('.institution').fadeIn();
				 	$('#noresults').hide();
			}
		    else {
				var flag =0;
		      	$('.institution').each(function(){
			        var item = $(this).attr('data-tag-city');
					var item2 = $(this).attr('data-tag-verified');
					//console.log(item +" and "+item2);
					var vers = $('#verified_ones :input:checked').length;
					var citys = $('#city_ones :input:checked').length;
					//console.log(vers + " and "+ citys);
					if(vers>0 && citys>0){
						if(jQuery.inArray(item,category_list) > -1 && jQuery.inArray(item2,category_list) > -1){ //Check if data-tag's value is in array
				          $(this).fadeIn('slow');
						  flag++;
						 }
				        else
				          $(this).hide();
					}
					else if(vers>0 && citys<=0){
						if(jQuery.inArray(item2,category_list) > -1){ //Check if data-tag's value is in array
				          $(this).fadeIn('slow');
						  flag++;
						  }
				        else
				          $(this).hide();
					}else if(vers<=0 && citys>0){
						if(jQuery.inArray(item,category_list) > -1){ //Check if data-tag's value is in array
				          $(this).fadeIn('slow');
						  flag++;
						 }
				        else
				          $(this).hide();
					}else if(vers<=0 && city<=0){
						flag++;
					}
			     });
				 
				 	console.log(flag);
				 if(flag==0){
				 	$('#noresults').fadeIn('slow');
				 }else{
				 	console.log(flag);
				 	$('#noresults').hide();
				 }
				 
		    	}
			}
			
			$(function () {
			  
			})
		
	</script>
    </body>
</html>
