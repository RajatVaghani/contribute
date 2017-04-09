<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
}

include '../includes/db.php';

$aq = "SELECT count(*) AS count FROM wall WHERE verified=0";
$rq = mysqli_query($con, $aq);
$rr = mysqli_fetch_assoc($rq);
$cq = $rr['count'];
if($cq==0)
$cq = "";

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

    <title>Contribute - Admin - Add Organization</title>

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
        <h3 style="text-align:center;color:#f7f7f7;">Welcome, <?php echo $_SESSION['name'];?>!</h3>
    </section>


    <section id="adminnav" class="sec container" style="min-height:110px;border-bottom:none;">
        <ul class="nav nav-tabs nav-justified">
            <li role="presentation"><a href="dashboard.php">Dashboard</a></li>
            <li role="presentation" class="active" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Manage Organizations <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="add_org.php">Add</a></li>
                    <li><a href="edit_org.php">Edit</a></li>
                </ul>
            </li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Manage Contributions <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="manage_contributions.php?view=approved">View Approved</a></li>
                    <li><a href="manage_contributions.php?view=pending">View Pending <span class="badge"><?php echo $cq;?></span></a></li>
                </ul>
            </li>
            <li role="presentation"><a href="add_gallery.php">Add Gallery</a></li>
        </ul>
    </section>

    <section class="sec container" style="padding-bottom: 60px;padding-top: 0px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">

            <?php

                if(isset($_GET['s'])){
                ?>
                    <div class="alert alert-success">
                        Organization Edited!
                    </div>
                <?php
                }

             ?>

            <?php

                if(isset($_GET['e'])){

                    $iq = "SELECT * FROM organization WHERE org_id=".$_GET['e'];
                    $rq = mysqli_query($con, $iq);
                    $details = mysqli_fetch_assoc($rq);
            ?>



            <h3 class="page-header">
                PLEASE FILL ALL DETAILS CAREFULLY
            </h3>

            <form class="form" action="action_edit_org.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="org_id" value="<?php echo $_GET['e'];?>">
                <table class="table table-hover stable table-responsive">
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Name:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="name" class="form-control" value="<?php echo $details['org_name'];?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Category:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <select name="category" class="form-control" required>

                                    <?php


                                    $cats = ["1"=>"Orphanage", "2"=>"Old Age Home", "3"=>"Blood Bank", "4"=>"Special Schools", "5"=>"Animal Welfare", "6"=>"NGO", "7"=>"Natural Disaster Relief"];
                                    ?>
                                        <option value="<?php echo $details['org_category'];?>"><?php echo $cats[$details['org_category']];?></option>
                                    <?php
                                    for($i=1;$i<8;$i++){
                                            if($i!=$details['org_category']){

                                        ?>

                                        <option value="<?php echo $i;?>"><?php echo $cats[$i];?></option>
                                        <?php
                                    }
                                    }

                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Timing:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="timing" class="form-control" value="<?php echo $details['org_timing'];?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;font-size:17px">Description:</td>
                        <td style="vertical-align:top;">
                            <div>
                                <textarea name="description" class="form-control" rows="4" required><?php echo $details['org_description'];?></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;font-size:17px">Vision:</td>
                        <td style="vertical-align:top;">
                            <div>
                                <textarea name="vision" class="form-control" rows="4" required><?php echo $details['org_vision'];?></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Founded:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="founded" value="<?php echo $details['org_founded'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Zip:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="zip" name="zip" value="<?php echo $details['org_zip'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Street:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="street" name="street" value="<?php echo $details['org_street'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">City:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="city" name="city" value="<?php echo $details['org_city'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">URL:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="url" name="url" value="<?php echo $details['org_url'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Email:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="email" name="email" value="<?php echo $details['org_email'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Phone:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="phone" value="<?php echo $details['org_phone'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Representative:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="rep" value="<?php echo $details['org_representative'];?>" class="form-control" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;font-size:17px">Accepts</td>
                        <td style="vertical-align:top;">
                                <div class="funkyradio">

                                    <?php

                                        $qq = "SELECT acc_value FROM accept WHERE org_id=".$_GET['e'];
                                        $rqq = mysqli_query($con, $qq);
                                        $arr = array();
                                        while($rowa = mysqli_fetch_assoc($rqq)){
                                            $arr[] = $rowa['acc_value'];
                                        }

                                     ?>

                                    <div class="funkyradio-success">

                                        <input type="checkbox" name="accepts[]" id="radio1" <?php if(in_array('Food', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Food" />
                                        <label for="radio1">Food</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio2" <?php if(in_array('Money', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?>  value="Money" />
                                        <label for="radio2">Money</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio3" <?php if(in_array('Time', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Time" />
                                        <label for="radio3">Time</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio4" <?php if(in_array('Clothes', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Clothes" />
                                        <label for="radio4">Clothes</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio5" <?php if(in_array('Blood', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?>  value="Blood"/>
                                        <label for="radio5">Blood</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio6" <?php if(in_array('Education', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Education"/>
                                        <label for="radio6">Education</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio7" <?php if(in_array('Gifts', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Gifts"/>
                                        <label for="radio7">Gifts</label>
                                    </div>
                                    <div class="funkyradio-success">
                                        <input type="checkbox" name="accepts[]" id="radio8" <?php if(in_array('Old', $arr)) { ?>
                                            checked="checked"
                                        <?php } ?> value="Old"/>
                                        <label for="radio8">Old Belongings</label>
                                    </div>
                                </div>
                        </td>
                    </tr>
                <tr>
                    <td style="vertical-align:middle;font-size:17px"></td>
                    <td style="vertical-align:middle;text-align: right;
                    padding-right: 0px;">
                    <div>
                        <button type="submit" id="button"class="btn fillbtn" style="
                        width: 130px;
                        height: auto;
                        padding: 5px;
                        ">Submit</button>
                    </div>
                </td>
            </tr>

        </table>
    </form>
    <?php
}else{
?>


            <h3 class="page-header">
                SELECT ORGANIZATION TO EDIT
            </h3>

            <form class="form" action="" method="GET">
                <select name="e" class="form-control" required>
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
                <div>
                    <button type="submit" id="button"class="btn fillbtn" style="
                    width: 130px;
                    height: auto;
                    padding: 5px;
                    ">Submit</button>
                </div>
            </form>

<?php
}

     ?>
</div>
<div class="col-md-2"></div>
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
<script src="../js/jquery.uploadPreview.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<!-- CHARTS -->


<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);



function drawChart() {

    var table = [];
    $.ajax({
        url: 'fetch_chart.php',
        success: function (response) {//response is value returned from php (for your example it's "bye bye"
        table = JSON.parse(response);
        console.log(table);
        for(i=1;i<table.length;i++){
            table[i][0] = (table[i][0]);
            table[i][1] = parseInt(table[i][1]);
        }

        console.log(table);
        if(table.length==-11){
            alert('No data');
        }else{
            var data = google.visualization.arrayToDataTable(table);

            var options = {
                title: 'Monthly Contributions',
                curveType: 'function',
                legend: { position: 'right' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    }
});


}
</script>


<script>



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
