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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Announcement">
                <a class="nav-link" href="announcement.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Announcement</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaints">
                <a class="nav-link" href="parkingpermit.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Parking Permits</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="RentnRecords">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Rent & Records</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                    <li>
                        <a href="payrent.php">Pay Rent</a>
                    </li>
                   <!-- <li>
                        <a href="last5rent.php">View last 5 Rent Records</a>
                    </li>-->
                    <li>
                        <a href="renthistory.php">Rent History Report</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complaints">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">Complaints</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti1">
                    <li>
                        <a href="raisecomplaint.php">Raise Complaints</a>
                    </li>
                    <li>
                        <a href="viewexistingtickets.php">View Existing Tickets</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="MyProfile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2"
                   data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-sitemap"></i>
                    <span class="nav-link-text">My Profile</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti2">
                    <li>
                        <a href="changepassword.php">Change Password</a>
                    </li>
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
  