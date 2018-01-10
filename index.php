<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['clientID'])){
       $lol = 1;
    }
    else{
        $lol = 2 ;
    }

    include("scripts/loginCheck.php");
?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Rooster Tax</title>


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link href="css/mainCss.css" rel="stylesheet" type="text/css"/>

        <script type="text/javascript" src="js/jquery-1.12.0.js"></script>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <?php
        include 'scripts/favIcon.php';
        ?>

    </head>
    <body>


        <!-- Nav Bar -->
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="navbarContainer">

                <div class="container">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="#">Rooster Tax</a>

                    </div> <!-- nav-bar Header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse">

                        <ul class="nav navbar-nav" id="myNavbar">
                            <li><a class="active" href="#Home">Home</a>
                            <li><a href="#ServicesContainer">Services</a>
                            <li><a href="#aboutMeContainer">About Me</a>
                            <li><a href="#contact">Contact</a>
                        </ul>

                        <?php

                            if($lol === 1 ){
                                include 'scripts/loginSignUp.php';
                            }
                            else {
                                include 'scripts/loggedIn.php';
                            }
                        ?>

                     </div>
                 </div> <!-- end collapse navbar-->

            </nav> <!-- end nav bar -->

        </header>



        <div class="container-fluid text-center" id="Home">

            <div class="container col-md-6 col-md-push-3" id="homeContent">
                <h1>Rooster Tax</h1>
                <h5>Sometext Goes Here</h5>
            </div>

        </div>

        <div class="container-fluid" id="ServicesContainer">

            <div class="row center" id="servicesHeader" >
                <h1>Why should you need us</h1>
                <p>Why we are good</p>
            </div>

            <div class="row">

                <div class="col-md-4 center service">
                    <span class="glyphicon glyphicon-credit-card glyphServices"></span>
                    <h2>Service1</h2>
                    Some explanationSome explanationSome explanationSome explanationSome explanationSome explanationSome explanation
                </div>

                <div class="col-md-4 center service">
                    <span class="glyphicon glyphicon-calendar glyphServices"></span>
                    <h2>Service3</h2>
                    Some explanationSome explanationSome explanationSome explanationSome explanationSome explanationSome explanation
                </div>


                <div class="col-md-4 center service">
                    <span class="glyphicon glyphicon-briefcase glyphServices"></span>
                    <h2>Service3</h2>
                    Some explanationSome explanationSome explanationSome explanationSome explanationSome explanationSome explanation
                </div>

            </div>

        </div>

        <div class="container-fluid height" id="aboutMeContainer">

            <div class="row bg-info padThis ">

                <div class="col-lg-5 text-center marginAboutMe">
                    <img src="images/me.jpg" height="200" width="200" alt="Warren">
                </div>
                <div class="col-lg-7 text-left text-info marginAboutMe">
                    <h3>Hi I'm Warren</h3>
                    <p>About meAbout meAbout meAbout meAbout meAbout meAbout meAbout me
                    About meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout me
                    About meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout me
                    About meAbout meAbout meAbout meAbout meAbout meAbout meAbout meAbout me</p>
                </div>
            </div>


            <div class="row">
                <div class="text-center text-success">
                    <h3>What My clients Say</h3>
                </div>
            </div>

            <div id="aboutMeCarousel" class="carousel slide text-center" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#aboutMeCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#aboutMeCarousel" data-slide-to="1"></li>
                    <li data-target="#aboutMeCarousel" data-slide-to="2"></li>
                </ol>

                <!--wrapper for slides-->

                <div class="carousel-inner" role="listbox">
                        <div class="item active">
                        <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
                        </div>
                        <div class="item">
                          <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
                        </div>
                        <div class="item">
                          <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
                        </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#aboutMeCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#aboutMeCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>

            </div>

        </div>


        <div class="container-fluid" id="contact">
            <div class="container-fluid bg-grey">
                <h2 class="text-center margin">CONTACT</h2>
                <div class="row">
                  <div class="col-sm-5">
                    <p>Contact us and we'll get back to you within 24 hours.</p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
                    <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
                  </div>
                  <div class="col-sm-7">
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                              <input class="form-control" id="name" name="contactName" placeholder="Name" type="text" value="<?php echo $from; ?>" required>
                            </div>
                            <div class="col-sm-6 form-group">
                              <input class="form-control" id="email" name="contactEmail" placeholder="Email" type="email" value="<?php echo $mailFrom; ?>" required>
                            </div>
                        </div>
                            <textarea class="form-control" id="comments" name="contactComments" placeholder="Comment" rows="5" value="<?php echo $body; ?>" required></textarea><br>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" value="Contact" name="contact" class="btn btn-success pull-right">send</button>
                            </div>
                        </div>
                        <?php echo $result; ?>
                    </form>
                  </div>
                </div>
              </div>
        </div>



        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>
