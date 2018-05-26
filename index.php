<?php
	if(isset($_COOKIE['unameremme'])) 
	{
		$cookieval = $_COOKIE['unameremme'];
	}
	else
	{
		$cookieval = null;
	}
?>
<!DOCTYPE html> 
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tesca</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

<!--	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">TESCA</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" href="#loginmodal">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->

    <header class="masthead">
            <div id="carouselhead" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
              <li data-target="#carouselhead" data-slide-to="0" class="active"></li>
              <li data-target="#carouselhead" data-slide-to="1"></li>
              <li data-target="#carouselhead" data-slide-to="2"></li>
                <li data-target="#carouselhead" data-slide-to="3"></li>
            </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('img/head/head1.jpg')"></div>
                <div class="carousel-item" style="background-image: url('img/head/head2.jpg')"></div>
                <div class="carousel-item" style="background-image: url('img/head/head3.jpeg')"></div>
                <div class="carousel-item" style="background-image: url('img/head/head4.jpeg')"></div>
              </div>


              <a class="carousel-control-prev" href="#carouselhead" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselhead" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <div class="main-text">
                <div class="intro-text">
                  <div class="intro-lead-in"><span style="background-color:rgba(253,197,3,0.85);color:#ffffff">
                    Welcome to TESCA Apartment Management System</span></div>
                  <div class="intro-heading"><span style="background-color:rgba(253,197,3,0.85);color: #ffffff">
                    It's Nice To Meet You</span></div>
                  <a class="btn btn-xl js-scroll-trigger" href="#services">Tell Me More</a>
                </div>
              </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Services</h2>
            <h3 class="section-subheading text-muted">TESCA is a web-based Residential Management solution for
              residential and commercial complexes. Launched in 2009, Tesca has placed its firm steps in the
              society management industry and won hearts of a lot of happy customers. When the Billing & Accounts are
              combined with professional management make the life simpler for our clients. With our consistent
              performances and smilingly connecting with peoples, makes us there first choice.
              Our Aim is to Deliver Absolutely reliable services with the only goal that is Customers Satisfaction.</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-server fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Residential Data Management</h4>
            <p class="text-muted">Store and access your common society documents, Member / Tenant / Parking /
              Nominee Registers, MOM / AGM Report with easy steps. SocietyRun also helps in quick complaint resolution.</p>
          </div>
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Helpdesk</h4>
            <p class="text-muted">Members can raise Requests, file Complaints, give Suggestions to the managing committee
              or estate management office.Complaints can be logged by a central Helpdesk on behalf of the members</p>
          </div>
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-money fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Billings & Accounting</h4>
            <p class="text-muted">TESCA offers a comprehensive billing and accounting package that is specifically
              designed for Residentials. When using TESCA Software for society accounting, Residentials do not need
              other accounting software such as Tally to maintain their accounts</p>
          </div>
          <div class="col-md-6">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-comments-o fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Society Share</h4>
            <p class="text-muted">TESCA provides a simple yet intuitive platform where society member can SHARE
              their thoughts, Give opinion via Poll, get Notices, Events update, Broadcast Email/SMS and many more.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading" style="color: #000000;font-weight: bold;">
              <span style="background-color:rgba(253,197,3,0.85);color: #ffffff">Portfolio</span></h1>
            <h3 class="section-heading" style="color: #000000;font-weight: bold;">
              <span style="background-color:rgba(253,197,3,0.85);color: #ffffff">Residentials managed by TESCA</span></h3><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r1.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>King St.</h4>

            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r2.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Adelaide St.</h4>

            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r3.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Queens Quay</h4>

            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r4.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Spadina Ave.</h4>

            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r5.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Wellington St.</h4>

            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/r6.jpeg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Yonge St.</h4>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">About</h2>
            <h3 class="section-subheading text-muted">Since 1996 TESCA Apartment Complex Management System has provided
              quality apartments and management systems in Canada. Family owned and operated, our objective is to offer
              comfortable and clean apartments at competitive prices. Our professional property management team is
              experienced and knowledgeable. Our buildings are equipped with custom-built automation systems which
              allow us to maximize energy efficiency while ensuring tenant comfort, allowing us to quickly respond to
              changing conditions.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/ph2.jpeg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>2009-2011</h4>
                    <h4 class="subheading">Our Humble Beginnings</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">TESCA was founded in 2009 by Five Humber graduates. The idea was developed
                    when the founders of the TESCA faced issues during their time living in rental apartments. </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/Toronto.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>March 2011</h4>
                    <h4 class="subheading">An Agency is Born</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Establishment of our first office with 50 employees near Woodbine Beach, Toronto.
                    </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>December 2012</h4>
                    <h4 class="subheading">Transition to Full Service</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">TESCA signed six residential clients for the service in Toronto with more than
                    600 residential units under management</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/Vancouver.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>July 2014</h4>
                    <h4 class="subheading">Phase Two Expansion</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Office opened in Vancouver with two new residential clients which compromise
                    of nearly 100 new residential units</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                    <br>Of Our
                    <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 style="color: #000000" class="section-heading">Our Amazing Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/sachin.jpg" alt="">
              <h4 style="color: #000000">Sachin Dudhara</h4>
              <p style="color: #000000;font-weight: bold;">CEO</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/?lang=en">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://ca.linkedin.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/chirag.jpg" alt="">
              <h4 style="color: #000000">Chirag Bendale</h4>
              <p style="color: #000000;font-weight: bold;">COO</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/?lang=en">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://ca.linkedin.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/emre.jpg" alt="">
              <h4 style="color: #000000">Emre Ozel</h4>
              <p style="color: #000000;font-weight: bold;">CFO</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/?lang=en">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://ca.linkedin.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/vish.jpg" alt="">
              <h4 style="color: #000000">Tejinder</h4>
              <p style="color: #000000;font-weight: bold;">Lead Developer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/?lang=en">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://ca.linkedin.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/face.png" alt="">
              <h4 style="color: #000000">Avneesh</h4>
              <p style="color: #000000;font-weight: bold;">Sales Director</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a target="_blank" href="https://twitter.com/?lang=en">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://ca.linkedin.com/">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Clients
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>-->

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contact Us</h2>
            <h2 class="section-subheading text-muted">We love to assist you in every way we can!</h2>
            <h5 class="section-subheading text-muted">You can reach us by submitting your query using the form on
              this page. We promise to respond within 10 business hours.</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="contact" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input id="sendMessageButton" class="btn btn-xl" type="submit" value="Send Message">
				  <input type="hidden" value="contactform" name="forminstance">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>



    <!-- Login -->
    <div class="portfolio-modal modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="card card-login mx-auto mt-5">
          <div class="card-header">
            <div class="login-logo">
              <a href="index.html"><b>TESCA</b>Management</a>
            </div>
          </div>
            <!-- /.login-logo -->
            <div class="card-body">
              <p>Sign in to start your session</p>
			  <ul class="nav nav-tabs" id="myTab" role="tablist">
			  
                    <li class="nav-item">
                        <a class="nav-link active" href="#login" data-toggle="tab"role="tab"
                           aria-controls="login" id="adminlog" aria-selected="true">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#custlogin" data-toggle="tab"
                           role="tab" aria-controls="custlogin" aria-selected="false">Customer Login</a>
                    </li>
                </ul>
				  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login" role="tabpanel" aria-labelledby="login-tab"><br>
                        <h7>Admin Login</h7>
						<form action="" method="post" id="adminsigninform"> 
							<div class="form-group has-feedback">
							  <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $cookieval; ?>" required>

							</div>
							<div class="form-group has-feedback">
							  <input type="password" name="password" class="form-control" placeholder="Password" required>

							</div>
						   
							  <div class="col-xs-8">
								<div class="checkbox icheck">
								  <label>
									<input type="checkbox" name="remmechkbx" checked> Remember my username
								  </label>
								</div>
							  </div>
							  <!-- /.col -->
							  <div class="col-xs-4">
								<!-- TEMPORARY CODE   <a href="Tesca/adminoptions/dashboard.php" class="btn btn-primary btn-block btn-flat">Sign In</a> -->
								  <input type="hidden" name="forminstance" value="loginform">
							   <!-- AFTER PHP VALIDATION --><input type="submit" id="adminsigninbtn" class="btn btn-primary btn-block btn-flat" value="Sign in">
							  </div>
							  <!-- /.col -->
						</form>
                        <div class="endtags">
                            <a data-toggle="modal" href="#fpmodal" data-dismiss="modal">I forgot my password</a><br>
                            <!-- <a data-toggle="modal" href="#registermodal" data-dismiss="modal" class="text-center">Register a new membership</a> -->
                        </div>
						</div>
					<div class="tab-pane fade" id="custlogin" role="tabpanel" aria-labelledby="custlogin-tab"><br>
                        <h7>Customer Login</h7>
						<form action="" method="post" id="custsigninform"> 
							<div class="form-group has-feedback">
							  <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $cookieval; ?>" required>

							</div>
							<div class="form-group has-feedback">
							  <input type="password" name="password" class="form-control" placeholder="Password" required>

							</div>
						   
							  <div class="col-xs-8">
								<div class="checkbox icheck">
								  <label>
									<input type="checkbox" name="remmechkbx" checked> Remember my username
								  </label>
								</div>
							  </div>
							  <!-- /.col -->
							  <div class="col-xs-4">
								<!-- TEMPORARY CODE   <a href="Tesca/adminoptions/dashboard.php" class="btn btn-primary btn-block btn-flat">Sign In</a> -->
								  <input type="hidden" name="forminstance" value="loginform">
							   <!-- AFTER PHP VALIDATION --><input type="submit" id="custsigninbtn" class="btn btn-primary btn-block btn-flat" value="Sign in">
							  </div>
							  <!-- /.col -->
						</form>
                        <div class="endtags">
                            <a data-toggle="modal" href="#fpcustmodal" data-dismiss="modal">I forgot my password</a><br>
                            <!-- <a data-toggle="modal" href="#registermodal" data-dismiss="modal" class="text-center">Register a new membership</a> -->
                        </div>
						</div>
						</div>

             

                </div>
            <!-- /.login-box-body -->
          </div>
        </div>
        </div>
      </div>



    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; TESCA 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a target="_blank" href="https://twitter.com/?lang=en">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="https://ca.linkedin.com/">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a style="color: #000000;font-weight: bold;" data-toggle="modal" href="#privacymodal" data-dismiss="modal">Privacy Policy</a>	&nbsp; |
              </li>
              <li class="list-inline-item">
                <a style="color: #000000;font-weight: bold;" data-toggle="modal" href="#tncmodal" data-dismiss="modal">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- Register-->
    <div class="portfolio-modal modal fade" id="registermodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="card card-login mx-auto mt-5">
          <div class="card-header">
            <div class="register-logo">
              <a href="index.html"><b>TESCA</b>Management</a>
            </div>
          </div>

            <div class="card-body">
              <p class="login-box-msg">Register a new membership</p>

              <form action="" method="post">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="Full name">
                </div>
                <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Retype password">
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label id="termsandcond">
                        <input type="checkbox"> I agree to the <a data-toggle="modal" href="#tncmodal" style="color: blue;font-weight: bold;">terms</a>
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="https://www.facebook.com/" class="btn btn-block btn-social btn-facebook btn-flat">
                  <i class="fa fa-facebook"></i> Sign up using
                  Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                  Sign up using
                  Google+</a>
              </div>
                   <div class="endtags">
              <a data-toggle="modal" href="#loginmodal" data-dismiss="modal" class="text-center">
                I already have a membership</a>
                   </div>
            </div>
            <!-- /.form-box -->
          </div>
        </div>
        </div>
      </div>
    </div>

    <!-- forgot password -->
    <div class="portfolio-modal modal fade" id="fpmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you Regenerated 6 Digit password.</p>
        </div>
        <form role="form" id="fpadminform">
          <div class="form-group">
            <input class="form-control" id="fpemail" name="fpemail" type="email" aria-describedby="emailHelp" placeholder="Enter your registered email address" required/>
          </div>
          <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" >Get Password</button>
		  <input type="hidden" name="forminstance" value="fpadminform">
        </form>
        <div class="text-center">
          <div class="endtags">
          <!-- <a data-toggle="modal" href="#registermodal" data-dismiss="modal">Register an Account</a><br> -->
          <a data-toggle="modal" href="#loginmodal" data-dismiss="modal">Login Page</a>
        </div>
        </div>
        <div class="form-group">
          <label id="messageadminemail">

          </label>
        </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="fpcustmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="card card-login mx-auto mt-5">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        <div class="text-center mt-4 mb-5">
                            <h4>Forgot your password?</h4>
                            <p>Enter your email address and we will send you Regenerated 6 Digit password.</p>
                        </div>
                        <form role="form" id="fpcustform">
                            <div class="form-group">
                                <input class="form-control" id="fpemail" name="fpemail" type="email" aria-describedby="emailHelp" placeholder="Enter your registered email address" required/>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" data-toggle="modal" >Get Password</button>
                            <input type="hidden" name="forminstance" value="fpcustform">
                        </form>
                        <div class="text-center">
                            <div class="endtags">
                                <!-- <a data-toggle="modal" href="#registermodal" data-dismiss="modal">Register an Account</a><br> -->
                                <a data-toggle="modal" href="#loginmodal" data-dismiss="modal">Login Page</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="messagecustemail"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions -->
    <div class="portfolio-modal modal fade" id="tncmodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
            </div>
          <div class="container">
            <div class="row">
              <h4>Copyright Notice:</h4>
              <p>A copyright notice is principally intended to assist with assertions of copyright infringement.
                Historically, a copyright notice could be a prerequisite of copyright protection. This is no longer
                the case (at least in the most significant jurisdictions). Nonetheless, a notice will help in
                educating potential copyright infringers, and may make it harder to rely upon an innocent
                infringement defense.</p>
              <h4>Cookies Policy:</h4>
              <p>Almost all modern websites use cookies. They have many applications, such as: tracking users as
                they navigate around a website; remembering user preferences and shopping cart contents; auto-logins
                for visitors coming back to a site; and website security. In some legal systems website operators are
                subject to a legal obligation to provide information to users about the use of cookies. The purpose of
                a cookies policy is to assist with these obligations.</p>
              <h4>Legal Disclaimer:</h4>
              <p>This is a legal disclaimer template. It may be appropriate for use upon a site providing legal
                information. It states that only information is provided – not legal advice. It also specifies that
                the accuracy of the legal information is not guaranteed. Website users are advised to seek professional
                help if they are concerned about a specific legal issue.</p>
              <h4>Website Disclaimer</h4>
              <p>The primary purpose of a website disclaimer is to limit or attempt to limit the liabilities that
                a website owner or publisher may suffer arising out of the website. Examples of the kinds of liability
                that we publishers must contend with include libel/defamation, copyright infringement and breach of
                privacy. Most legal systems strictly control the effects of limitations and exclusions of liability.
                For this reason you should take local legal advice if you believe you may have to rely upon the limits
                of liability in our free website disclaimer document.</p>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Privacy Policy -->
    <div class="portfolio-modal modal fade" id="privacymodal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <h4>Privacy Policy:</h4>
              <p>Most websites collect personal information. Personal information may for example be collected
                by website forms, as a result of the use of website services, or through the use of tracking
                technologies such as cookies. EU data protection law and US data privacy law (and similar laws
                in other jurisdictions) protect individuals from the misuse of their personal information. These
                laws regulate not just the collection of personal data, but also the storage, use, cross-border
                transfer, retention and disposal of that data.</p>

              <p>The key purposes of a website privacy statement are: (i) to help website owners to comply
                with the disclosure requirements of data protection and data privacy laws; and (ii) to reassure
                users that their information is being lawfully and properly collected, stored and used. In addition,
                a privacy statement will usually communicate to users some of the legal rights that they can have in
                relation to their personal information.</p>

              <p>The types of personal information collected, and the uses to which it is typically put, depend in
                part upon the type of website and business that is collecting the information. An ecommerce store,
                for example, will collect or generate customer name and address information, payment information and
                order information. The classes of personal information will be put to different uses. For example,
                address information will be used for delivering products, and may also be used in marketing; whereas
                payment information will be used to collect payments and for accounting purposes. Some kinds of
                website – notably social networking websites and websites with social networking features – may collect
                and process huge amounts of personal information</p>

              <p>This template should be used in conjunction with website terms and conditions or a website disclaimer.
                In using this template, you will need to take account both of the particular requirements of the
                website, and the specific rules of national law that will apply to the website.</p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>King St.</h2>
                  <p class="item-intro text-muted">The residential is located at 103 King St.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r1.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: September 2017</li>
                    <li>Client: TESCA</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Adelaide St.</h2>
                  <p class="item-intro text-muted">This residential is located at 10 Adelaide St.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r2.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Remax</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Queens Quay</h2>
                  <p class="item-intro text-muted">This residential is located at 20 Queens Quay</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r3.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: TESCA</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Spadina Ave.</h2>
                  <p class="item-intro text-muted">This residential is located at 15 Spadina Ave.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r4.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: Feburary 2017</li>
                    <li>Client: TESCA</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Wellington St.</h2>
                  <p class="item-intro text-muted">This residential is located at 25 Wellington St.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r5.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest Rentals</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Yonge St.</h2>
                  <p class="item-intro text-muted">This residential is located at 10 Yonge St.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/r6.jpeg" alt="">
                  <p>Most of the houses in the subdivision were built from 2000 to 2002 although there were a few
                    later sales, mainly along the southeastern edge of the subdivision near the corner of King and York.
                    The subdivision has a total of 150 housing units.</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Remax</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript 
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script> -->

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	<script type="text/javascript" src="TescaAdmin/adminoptions/ajax/script.js"></script>
	<script type="text/javascript" src="TescaCustomer/adminoptions/ajax/script.js"></script>




  </body>

</html>
