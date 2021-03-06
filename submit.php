<?php
include "includes/db.php";
if(isset($_POST['email'])){
    $email = $_POST['email'];
}else{
    $email = "";
}
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
    $q = "SELECT * FROM contributers WHERE `con_email` = '$email' AND `code`='$code'";
    $res = mysqli_query($con, $q);
    $arr = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res)>0){
        $con_name = $arr['con_name'];
        $con_phone = $arr['con_phone'];
        $photo = $arr['con_photo'];
    }else{
        $code = "na";
    }

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
            <?php
        if(isset($_GET['e'])){
        ?>
        <div class="alert alert-danger" style="margin-top:15px;">
            <a href="#" data-dismiss="alert"class="close">&times;</a>
            <p>Error in sending form, please try again later!</p>
        </div>
        <?php
    }else if(isset($_GET['s'])){

        ?>
        <div class="alert alert-danger" style="margin-top:15px;">
            <a href="#" data-dismiss="alert"class="close">&times;</a>
            <p>We have received your submission. Thank you for contributing.</p>
        </div>
        <?php
    }
             ?>

            <h3 class="page-header">
                PLEASE FILL ALL DETAILS CAREFULLY
            </h3>

            <form class="form" action="action_submit.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="code" value="<?php echo $code;?>" readonly>
                <table class="table table-hover stable table-responsive">
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Name:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="name" class="form-control" value="<?php echo $con_name; ?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Phone:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="phone" class="form-control" value="<?php echo $con_phone; ?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Email:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;font-size:17px">Photo:</td>
                        <td style="vertical-align:top;">
                            <div>
                                <?php
                                if($photo==""){
                                    ?>
                                        <div id="image-preview" >
                                    <?php
                                }else{
                                    ?>
                                        <div id="image-preview" style="background-size: cover;
    background-position: center center; background-image: url('<?php echo $photo;?>')">
                                    <?php
                                }
                                     ?>


                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image-upload" id="image-upload"/>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Organization:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <select name="organization" class="form-control" required>
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
                                <input type="text" name="date" class="form-control" id="datepicker" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:middle;font-size:17px">Document Proof:</td>
                        <td style="vertical-align:middle;">
                            <div>
                                <label class="btn fillbtn" for="my-file-selector" style="
                                margin-left: 0px;
                                padding: 10px;
                                ">
                                <input id="my-file-selector" name="proof" type="file" style="display:none;" required onchange="$('#upload-file-info').html($(this).val());">
                                Upload Document
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;font-size:17px">Testimonial:</td>
                    <td style="vertical-align:top;">
                        <div>
                            <textarea name="testimonial" class="form-control" rows="4" required></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;font-size:17px">Your Experience</td>
                    <td style="vertical-align:top;">
                        <div>
                            <div class="funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="exp" id="radio1" value="1" />
                                    <label for="radio1">Poor</label>
                                </div>
                                <div class="funkyradio-warning">
                                    <input type="radio" name="exp" id="radio2" value="2" />
                                    <label for="radio2">Disappointed</label>
                                </div>
                                <div class="funkyradio-info">
                                    <input type="radio" name="exp" id="radio3" value="3" />
                                    <label for="radio3">Okay-ish</label>
                                </div>
                                <div class="funkyradio-success">
                                    <input type="radio" name="exp" id="radio4" value="4" />
                                    <label for="radio4">Good</label>
                                </div>
                                <div class="funkyradio-success">
                                    <input type="radio" name="exp" id="radio5" value="5" checked/>
                                    <label for="radio5">Awesome</label>
                                </div>
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
