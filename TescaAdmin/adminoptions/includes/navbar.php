<?php
date_default_timezone_set("America/Toronto");

$uname = $_SESSION['uname'];
$fname = $_SESSION['fname'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <a class="navbar-brand" href="dashboard.php">TESCA</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="dashboard.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Master Menu</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="user.php">Users</a>
                    </li>
                    <li>
                        <a href="apartment.php">Apartments</a>
                    </li>
                    <li>
                        <a href="apt-userlink.php">User-Apartment Linking</a>
                    </li>
                    <li>
                        <a href="department.php">Department</a>
                    </li>

                    <li>
                        <a href="assets.php">Assets</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaints">
                <a class="nav-link" href="complaints.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Complaints</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Feedback">
                <a class="nav-link" href="feedback.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Feedback</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Announcement">
                <a class="nav-link" href="announcement.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Announcement</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Records" id="exampleAccordion1">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#xyz" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Records & Reports</span>
                </a>
                <ul class="sidenav-second-level collapse" id="xyz">
                    <li>
                        <a href="apartmentownership.php">Apartment Ownership History</a>
                    </li>

                    <li>
                        <a href="feedbackrpt.php">Feedback History</a>
                    </li>
                   <!-- <li>
                        <a href="parkingpermit.php">Parking Permit</a>
                    </li> -->
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link">
                    <i class="fa fa-fw fa-user"></i>Welcome <?php echo $fname." (".$uname.")"; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
  