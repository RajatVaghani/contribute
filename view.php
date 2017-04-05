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

  <title>Contribute - Organization Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/organizationprofile.css" rel="stylesheet">

  <link rel="stylesheet" href="css/font-awesome.min.css">


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>

<?php

  include 'includes/db.php';

  $org_id = $_GET['id'];

  $sql="SELECT * FROM organization WHERE org_id='$org_id'";

  $result=mysqli_query($con,$sql);
  //echo $sql;

  while($row=mysqli_fetch_assoc($result)){
    //echo $row['org_name'];


?>



<body data-spy="scroll" data-target=".navbar" data-offset="150">

  <?php

  include 'includes/nav.php';

  ?>

  <!-- Begin page content -->

<section id="main" class="sec container-fluid" style="border-bottom:none">
<h1 class="page-header">organization profile</h1>
<div class="media">
<div class="media-left">
  <img class="media-object" src="<?php echo $row['org_logo'];?>" alt="img">
</div>
<div class="media-body">
  <h4 class="media-heading"><?php echo $row['org_name']; ?></h4>
  <div><?php

  $q = "SELECT * FROM accept WHERE org_id=".$row['org_id'];
  $res = mysqli_query($con, $q);

  while($r = mysqli_fetch_assoc($res)){
    ?>

    <img class="catagories-img"  data-toggle="tooltip" title="<?php echo $r['acc_value'];?>" src="images/icon_<?php echo $r['acc_value'];?>.png" alt="">

    <?php

  }

  ?></div>

    <p>founded in the year : <?php echo $row['org_founded']; ?></p>
  </div>
</div>
</section>
<section class="container-fluid" style="background:#eee;padding:20px">
<div class="row">
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" >
      <div class="caption" style="text-align:center">
        <h3>category</h3>
        <p style="padding-bottom:30px;padding-top:10px;"><?php echo $cats[$row['org_category']]; ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" >
      <div class="caption" style="text-align:center">
        <h3>Timing</h3>
        <p style="padding-bottom:30px;padding-top:10px;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php echo $row['org_timing']; ?><br/></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" >
      <div class="caption" style="text-align:center">
        <h3>Contribution</h3>
        <?php
            $q = "SELECT * FROM wall WHERE org_id = ".$org_id;
            $re = mysqli_query($con, $q);
            $num = mysqli_num_rows($re);

         ?>
        <h3 style="padding-bottom:10px;padding-top:10px;"><?php echo $num; ?></h3>
      </div>
    </div>
  </div>
</div>

</section>
<section class="sec container-fluid">
  <h1 class="page-header">Description</h1>
  <p><?php echo $row['org_description']; ?></p>
</section>

<section class="sec container-fluid" style="background:#eee;">
  <h1 class="page-header">Vision</h1>
  <p><?php echo $row['org_vision']; ?></p>
</section>

<section class="container-fluid" style="padding:20px">
<div class="row-sm-4 row-md-4">
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" >
      <div class="caption" >
        <h3>Address</h3>
        <p><?php echo $row['org_street']; ?></p>
        <p><?php echo $row['org_city']; ?></p>
        <p><?php echo $row['org_zip']; ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" >
      <div class="caption" style="text-align:center">
        <h3>Phone</h3>
        <p style="padding-bottom:30px;padding-top:10px;"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  <?php echo $row['org_representative']; ?>
          <br/><?php echo $row['org_phone']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-4">
      <div class="thumbnail" >
        <div class="caption"style="text-align:center">
          <h3>Details</h3>
          <h5><p><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>  website </p>
            <p ><?php echo $row['org_url']; ?></p></h5>
          <h5><p ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  email</p>
          <p ><?php echo $row['org_email']; ?></p></h5>
        </div>
      </div>
    </div>
  </div>

</section>
<div id='container'>
  <h1 class="page-header" style="text-align:center">Gallery</h1>
  <hr>

<?php
}
?>


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
