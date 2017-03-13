<?php

$cats = ["1"=>"Orphanage", "2"=>"Old Age Home", "3"=>"Blood Bank", "4"=>"Special Schools", "5"=>"Animal Welfare", "6"=>"NGO", "7"=>"Natural Disaster Relief"];


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

	<title>Contribute - Search Organizations</title>

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



	<header id="main" style="margin-top: 65px;">
		<div class="container">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
				<div class="alert alert-info vertical-center" style="text-align:center;">
					<p id="filter_msg">Showing all Organizations</p>
				</div>
				<!-- <div style="text-align:center;">
				<a tabindex="0" class="btn btn-sm btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="Select Board" data-content="<a href='icse'>ICSE</a><br/><a href='cbse'>CBSE</a><br/><a href='ib'>IB</a><br/><a href='state'>State</a><br/><a href='any'>All</a>" data-html="true">Change Option</a>
			</div> -->
		</div>
	</div>
</header>

<!-- !!!!!!!!!!!!!!!!!!!!!!  FILTERS !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<div class="container" style="border-top: 1px solid #ddd;padding-top: 50px;padding-bottom:50px;min-height:600px;">
	<div class="hidden-xs col-sm-3">
		<div class="fading-side-menu" data-spy="affix" data-offset-top="200">
			<h4>Filters</h4><hr class="no-margin">
			<ul id="filters" class="list-unstyled pre-scrollable">

				<li id="city_ones" class="fbox">
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
				<li id="category_ones" class="fbox">
					<div class="page-header">
						Based on Category
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="1" class="filter_category">
							Orphanage
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="2" class="filter_category">
							Old Age Home
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="3" class="filter_category">
							Blood Bank
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="4" class="filter_category">
							Special Schools
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="5" class="filter_category">
							Animal Welfare
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="6" class="filter_category">
							NGO
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="7" class="filter_category">
							Natural Disaster Relief
						</label>
					</div>
				</li>

			</ul>
		</div>
	</div>

	<!-- !!!!!!!!!!!!!!!!!!!!!!  CONTENT !!!!!!!!!!!!!!!!!!!!!!!!!!!! -->


	<div class="col-xs-12 col-sm-9">

		<?php

		include 'includes/db.php';

		$sql = "SELECT * FROM `organization`";
		$result=mysqli_query($con,$sql);
		//echo $sql;
		$c=0;

		while($row=mysqli_fetch_array($result)){
			$c++;
			?>

			<div class="organization" data-tag-category="<?php echo $row['org_category'];?>" data-tag-city="<?php echo $row['org_city'];?>">
				<div class="row">
					<div class="col-xs-3 col-sm-1">
						<img class="thumb" src="<?php echo $row['org_logo'];?>" alt="img" style="width:60px; height:60px; border-radius: 4px;"/>
					</div>
					<div class="col-xs-9 col-sm-9">
						<p class="orgname"><?php echo $row['org_name'];?></p>
						<p class="place"><?php echo $row['org_city'];?></p>
					</div>
				</div>
				<div class="row" style="margin-top:12px;">
					<div class="col-cs-12 col-sm-12">
						<table class="table" style="margin: 5px 0px">
							<tr>
								<td style="width:1%;vertical-align:middle"><span class="glyphicon glyphicon-th" aria-hidden="true"></span></td>
								<td style="width:8%;vertical-align:middle">Category</td>
								<td style="width:1%;vertical-align:middle">:</td>
								<td style="width:90%;vertical-align:middle"><?php echo $cats[$row['org_category']];?></td>
							</tr>
							<tr>
								<td style="width:1%;vertical-align:middle"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></td>
								<td style="width:8%;vertical-align:middle">Accepts</td>
								<td style="width:1%;vertical-align:middle">:</td>
								<td style="width:90%;vertical-align:middle"><?php

								$q = "SELECT * FROM accept WHERE org_id=".$row['org_id'];
								$res = mysqli_query($con, $q);

								while($r = mysqli_fetch_assoc($res)){
									?>

									<img class="tag_icon"  data-toggle="tooltip" title="<?php echo $r['acc_value'];?>" src="images/icon_<?php echo $r['acc_value'];?>.png" alt="">

									<?php

								}

								?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="btnmore" style="margin-top:10px">
					<a href="view.php?id=<?php echo $row['org_id'];?>" class="btn btn-sm strokebtn" style="width:auto;padding:5px">Read More</a>
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('[data-toggle="popover"]').popover()
</script>
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


$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});


$('.filter_category').on('change', function(){
	apply_filters();
});






$('.filter_city').on('change', function(){
	apply_filters();
});


function apply_filters(){
	var category_list = [];
	var cats = ["Orphanage", "Old Age Home", "Blood Bank", "Special Schools", "Animal Welfare", "NGO","Natural Disaster Relief"]
	var text = ""
	$('#filters :input:checked').each(function(){
		var category = $(this).val();
		console.log(category);
		if($.isNumeric(category))
			text+=cats[category-1] + ", ";
		else
			text+= category + ", "
		category_list.push(category); //Push each check item's value into an array
	});

	text = text.substring(0,text.length-2)
	console.log(text);

	if(text=="")
		$('#filter_msg').html("Showing All Organizations")
	else
		$('#filter_msg').html("Filtering using <b>'"+text+"'</b>")

	if(category_list.length == 0){
		$('.organization').fadeIn();
		$('#noresults').hide();
	}
	else {
		var flag =0;
		$('.organization').each(function(){
			var item = $(this).attr('data-tag-city');
			var item2 = $(this).attr('data-tag-category');
			//console.log(item +" and "+item2);
			var vers = $('#category_ones :input:checked').length;
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


</script>
</body>
</html>
