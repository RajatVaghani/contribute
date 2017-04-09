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

    <title>Contribute - Admin - Gallery</title>

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
            <li role="presentation" class="dropdown">
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
            <li role="presentation" class="active"><a href="add_gallery.php">Add Gallery</a></li>
        </ul>
    </section>

    <section class="sec container" style="padding-bottom: 60px;padding-top: 0px;">
        <div class="col-dm-3 col-xs-12"></div>
        <div class="col-md-6 col-xs-12">
            <form enctype="multipart/form-data" action="" method="post" id="multiform">
                <select class="form-control" name="org" style="margin:20px 20px 0px 20px">
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
                <div id="fileDiv">
                    <label class="amazingLabel" for="file">
                        <input name="file[]" type="file" id="file" style="display:none;" required>
                        Upload Document
                    </label>
                </div>
                <input type="button" id="add_more" class="fillbtn" value="Add More Files" style="padding:10px;width:180px;"/>
                <input type="submit" value="Upload File" name="submit" id="upload" class="strokebtn" style="padding:10px;width:180px;"/>
            </form>
            <?php include "../admin/upload_multiple.php"; ?>
        </div>
        <div class="col-dm-3 col-xs-12"></div>
    </section>



    <?php

    include '../includes/admin_footer.php';

    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/multi_upload.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>

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
