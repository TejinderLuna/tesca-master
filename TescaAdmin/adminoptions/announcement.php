<?php
require_once 'Classes/UserDB.php';
require_once 'Classes/SessionsDB.php';

$isLoggedIn = new SessionsDB();
$usr=UserDB::getUserData();
    
if(!$isLoggedIn->is_loggedin())
{
	$isLoggedIn->redirect();	
}


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tesca Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax/script.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php include_once('includes/navbar.php'); ?>

<div class="content-wrapper">
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Announcement</li>
            </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Announcement</div>
            <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal" id="announcementinsert">Insert</button>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="displayanncdatatable" width="100%" cellspacing="0">

                    </table>
                </div>
            </div>
		 <!-- Div tag for Updated here dynamic display -->
			<?php include_once('includes/lastupdt.php'); ?>
		 <!-- Div tag for updated here ends -->
        </div>
    </div>
    <?php include_once('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
        </div>
</div>



<!-- INSERT MODAL -->

<div class="modal fade" id="insertmodal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" id="mod">
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Announcement
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form role="form" id="insertannouncementform">
                    <input type="hidden" name="forminstance" value="insertannouncement">
                    <div class="form-group">
                        <label>Announcement Type<span class="requiredfield">*</span></label><br>
                        <label class="radio-inline"><input type="radio" value="normal" name="atype" CHECKED>Normal</label>
                        <label class="radio-inline"><input type="radio" value="highimp"  name="atype">High Imp.</label>
                        <label class="radio-inline"><input type="radio" value="critical" name="atype">Critical</label>
                    </div>
                    <div class="form-group">
                        <label>Announcement Description<span class="requiredfield">*</span></label>
                        <textarea class="form-control" id= "adesc" name="adesc" placeholder="Announcement Description" required ></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <div class="form-group">
                        <label id="message"></label>
                    </div>
                </form>


            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="closeinsert" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- update modal-->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" id="mod1">
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1">
                    Update Announcement Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form role="form" id="updateanncouncementform">
                    <input type="hidden" name="forminstance" value="updateannouncementbtnclicked">
                    <input type="hidden" name="announcement_id" id="anncidupdt" >
                    <div class="form-group">
                        <label>Announcement Type<span class="requiredfield">*</span></label><br>
                        <label class="radio-inline"><input type="radio" id="atypenormal" value="normal" name="atype" CHECKED>Normal</label>
                        <label class="radio-inline"><input type="radio" id="atypehighimp" value="highimp"  name="atype">High Imp.</label>
                        <label class="radio-inline"><input type="radio" id="atypecritical" value="critical" name="atype">Critical</label>
                    </div>
                    <div class="form-group">
                        <label>Announcement Description<span class="requiredfield">*</span></label>
                        <textarea class="form-control" id= "adescupdt" name="adesc" placeholder="Announcement Description" required></textarea>
                    </div>
                    <input type="hidden" name="uid" id="uidupdt"/>
                    <button type="submit" class="btn btn-default">Update</button>
                    <div class="form-group">
                        <label id="messageupdt"></label>
                    </div>
                </form>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id= "closeupdate" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



</body>

</html>
