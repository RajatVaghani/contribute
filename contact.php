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

    <title>Contribute - Contact Us</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/contact.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>


</head>





<body data-spy="scroll" data-target=".navbar" data-offset="150">


    <?php

    include 'includes/nav.php';

    ?>

    <!-- Begin page content -->

    <section id="main" class="sec container-fluid" style="border-bottom:none">
        <h1 class="page-header">Contact Us <small> Feel free to contact us</small></h1>

        <div class="container-fluid">

            <!-------->
            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#individual" data-toggle="tab">Individual</a></li>
                    <li><a href="#organization" data-toggle="tab">Organization</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" style="cursor:pointer">Submit Your Contributions</a></li>
                </ul>
                <?php
                    if(isset($_GET['s'])){
                    ?>
                        <div class="alert alert-success" style="margin-top:15px;">
                            <a href="#" data-dismiss="alert"class="close">&times;</a>
                            <p>Thank you for contacting us, we will get back to you as soon as possible!</p>
                        </div>
                <?php
            }else if(isset($_GET['e'])){
            ?>
            <div class="alert alert-danger" style="margin-top:15px;">
                <a href="#" data-dismiss="alert"class="close">&times;</a>
                <p>Error in sending form, please try again later!</p>
            </div>
            <?php
            }
                 ?>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="individual">
                        <form class="form" id="contactForm" style="padding-top:20px;" action="action_contact_indi.php" method="POST">
                          <div class="col-md-8">
                          <table class="table table-hover stable table-responsive">
                              <tr>
                                  <td style="width:200px;">Name:</td>
                                  <td style="vertical-align:middle;">
                                      <div>
                                          <input type="text" name="name" placeholder="Name"class="form-control"  required>
                                      </div>
                                  </td>
                              </tr>
                              <tr>
                                <td >Email:</td>
                                <td style="vertical-align:middle;">
                                    <div>
                                        <input type="text" name="email" placeholder="Email address" class="form-control" required>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Your message:</td>
                                <td style="vertical-align:top; ">
                                    <div>
                                        <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
                                    </div>
                                </td>
                            </tr>
                          <tr>
                              <td></td>
                              <td style="vertical-align:middle;text-align: right;
                              padding-right: 0px;">
                              <div>
                                  <button type="submit" id="button"class="btn fillbtn" style="
                                  width: 130px;
                                  height: auto;
                                  padding: 5px;
                                  ">Submit</button>

                                </div>
                              </table>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="organization">
                      <form class="form" id="contactForm" style="padding-top:20px;" action="action_contact_org.php" method="POST">
                        <div class="col-md-8">
                        <table class="table table-hover stable table-responsive">
                            <tr>
                                <td style="width:200px;">Name:</td>
                                <td style="vertical-align:middle;">
                                    <div>
                                        <input type="text" name="name" placeholder="Name"class="form-control"  required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td style="vertical-align:middle;">
                                    <div>
                                        <input type="text" name="phone" placeholder="Phone"class="form-control"  required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td style="vertical-align:middle;">
                                    <div>
                                        <input type="text" name="email" placeholder="Email Address"class="form-control"  required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Organization:</td>
                                <td style="vertical-align:middle;">
                                    <div>
                                        <input type="text" name="organization" placeholder="Organization Name"class="form-control"  required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Your message:</td>
                                <td style="vertical-align:top;">
                                    <div>
                                        <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="vertical-align:middle;text-align:center;font-size:17px"></td>
                                <td style="vertical-align:middle;text-align: right;
                                padding-right: 0px;">
                                <div>
                                    <button type="submit" id="button" class="btn fillbtn" style="width: 130px;height: auto;padding: 5px;">Submit</button>

                                  </div>
                                </table>
                              </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="contributions">

                    </div>
                </div>
            </div>
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

    <script>
    $(document).ready(function(){
        $(".btn fillbtn").click(function(){
            $(".collapse").collapse('show');
        });
    });
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
