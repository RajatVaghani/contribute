<?php
include "includes/db.php";
$email = $_POST['email'];
$code = "na";
$phone = "";
$photo="";
$arr = array();
$con_id="";
$con_phone="";
$con_name="";
$con_email = "";
if(isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
}

if($code!="na"){
    $q = "SELECT * FROM contributers WHERE con_email = '$email' AND code=".$code;
    $res = mysqli_query($con, $q);
    $arr = mysqli_fetch_assoc($res);

    $con_name = $arr['name'];
    $con_phone = $arr['phone'];

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

    <title>Contribute - Submit Contribution</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/upload.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

	<section id="main" class="sec container-fluid" style="text-align:center;min-height:100vh;background:url('images/bg_submit.png');background-size:cover;">

	</section>

    <section class="sec container-fluid">
        <div class="container">
            <h3 class="page-header">
                PLEASE FILL ALL DETAILS CAREFULLY
            </h3>

            <form class="form" action="action_submit.php" method="post">
                <table class="table table-hover stable">
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Name:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="name" class="form-control" value="<?php echo $con_name; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Phone:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="phone" class="form-control" value="<?php echo $con_phone; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Email:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Photo:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <div id="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Organization:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <select name="organization" class="form-control">
                                    <?php

                                        $q = "SELECT * from organization";
                                        $res = mysqli_query($con, $q);
                                        while($rows = mysqli_fetch_assoc($res)){
                                    ?>
                                    <option value="<?php echo $rows['org_id'];?>"><?php echo $rows['org_name'];?></option>
                                    <?php
                                        }

                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Date:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="date" class="form-control" id="datepicker">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Document Proof:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;font-size:17px">Testimonial:</td>
                        <td style="vertical-align:top;">
                            <div>
                                <textarea name="testimonial" class="form-control" rows="4"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Your Experience</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px"></td>
                        <td style="vertical-align:middle;text-align: right;
    padding-right: 0px;">
                            <div>
                                <button type="button" class="btn fillbtn" onclick="submit()" style="
                                width: 130px;
                                height: auto;
                                padding: 5px;
                                ">Submit</button>
                            </div>
                        </td>
                    </tr>

                </table>
            </form>

        </div>
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
	<script src="js/jquery.uploadPreview.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script>

    $( function() {
      $( "#datepicker" ).datepicker();
    } );



    $(document).ready(function() {
      $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false                 // Default: false
      });
    });



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
