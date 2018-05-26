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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tesca Admin</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="ajax/jquery.min.js"></script>
    <script type="text/javascript" src="ajax/script.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php include_once('includes/navbar.php'); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../../TescaAdmin/adminoptions/dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Complaints</a>
            </li>
            <li class="breadcrumb-item active">View Existing Tickets</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> View Existing Tickets</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="displayexistingdatatable" width="100%" cellspacing="0">

                    </table>
                </div>
            </div>
            <!-- Div tag for Updated here dynamic display -->
            <?php include_once('includes/lastupdt.php'); ?>
            <!-- Div tag for updated here ends -->
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

    <?php include_once('includes/footer.php'); ?>

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
                    Update User Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form role="form" id="updateexistingticketform">
                    <input type="hidden" name="forminstance" value="updateexistingticketdata">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select id="departmentupdt" name="department" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="categoryupdt" name="category" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub-Category</label>
                        <select id="subcategoryupdt" name="sub-category" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Complaint Description</label>
                        <textarea class="form-control" id="cdescupdt" name="cdesc" placeholder="Complaint Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Complaint Image</label>
                        <input type="file" name="cimg" class="form-control"
                               id="cimgupdt" placeholder="" accept="image/*"/>
                    </div>

                    <div class="form-group">
                        <button id="updateexistingtickets" type="submit" class="btn btn-default">Submit</button></div>
                    <div class="form-group">
                        <label id="message"></label>

                    </div>
                </form>



            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="closeupdate" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
