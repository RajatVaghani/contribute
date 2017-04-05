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
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="individual">
                        <form>
                            <input name="first name" type="text" class="feedback-input" placeholder="First Name " required="required" />
                            <input name="last name" type="text" class="feedback-input" placeholder="Last Name " />
                            <input name="phone" type="text" class="feedback-input" placeholder="Phone" required="required"/>
                            <input name="email" type="text" class="feedback-input" placeholder="Email" required="required" />
                            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>

                            <input type="file" id="exampleInputFile">
                            <hr style="border-top: dotted 4px;" />
                            <input type="submit" value="SUBMIT"/>
                        </form>
                    </div>
                    <div class="tab-pane" id="organization">
                        <form>
                            <input name="name" type="text" class="feedback-input" placeholder="Name " required="required" />
                            <input name="phone" type="text" class="feedback-input" placeholder="Phone" required="required"/>
                            <input name="email" type="text" class="feedback-input" placeholder="Email" required="required" />
                            <input name="Organization" type="text" class="feedback-input" placeholder="Organization Name" required="required" />
                            <input name="Organization url" type="url" class="feedback-input" placeholder="Organization Url" required="required" />
                            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
                            <input type="file" id="exampleInputFile">
                            <hr style="border-top: dotted 4px;" />

                            <input type="submit" value="SUBMIT"/>
                        </form>
                    </div>
                    <div class="tab-pane" id="contributions">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Submit your contribution</h4>
                </div>
                <form class="form" action="submit.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" name="email" value="" class="form-control" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="code" value="" class="form-control" placeholder="Code (if any)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn fillbtn" onclick="submit()" style="
                        width: 130px;
                        height: auto;
                        padding: 5px;
                        ">Proceed</button>
                    </div>
                </form>
            </div>
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
