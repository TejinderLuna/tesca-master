<?php
require_once 'Classes/SessionsDB.php';

$isLoggedIn = new SessionsDB();

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
   <!-- <style>
        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.7);
            z-index: 4;
            cursor: pointer;
        }

        #overlaytext{
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: white;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
        }
    </style>

    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script> -->

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="on()">
<?php include_once('includes/navbar.php'); ?>


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Parking Permit</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Parking Permit</div>
            <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal">Insert</button>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="displayparkingpermittable" width="100%" cellspacing="0">

                    </table>
                </div>
            </div>
            <!-- Div tag for Updated here dynamic display -->
            <?php include_once('includes/lastupdt.php'); ?>
            <!-- Div tag for updated here ends -->
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
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

<!-- insert modal -->
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
                    Request a New Parking Permit
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form role="form" id="parkingpermitform">
                    <input type="hidden" name="forminstance" value="insertparkingpermit">
                    <div class="form-group">
                        <label>Permit Type</label><br>
                        <label class="radio-inline"><input type="radio" value="tenant" name="permittype" checked>Tenant</label>
                        <label class="radio-inline"><input type="radio" value="visitor" name="permittype">Visitor</label>
                    </div>

                    <div class="form-group">
                        <label>Permit Holder's Name</label>
                        <input type="text" name="pname" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid From Date</label>
                        <input type="date" name="validfrom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid Until Date</label>
                        <input type="date" name="validuntill" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-default">Insert</button>
                    <div class="form-group">
                        <label id="message"></label>

                    </div>
                </form>


            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="closepp" class="btn btn-default"
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
                    Update Parking Permit Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form id="updatepermitform" role="form">
                    <input type="hidden" name="forminstance" value="updatepermitbtnclciked">
                    <input type="hidden" id="permitidupdt" name="permit_id"/>
                    <div class="form-group">
                        <label>Permit Type</label><br>
                        <label class="radio-inline"><input type="radio" value="tenant" name="ptype">Tenant</label>
                        <label class="radio-inline"><input type="radio" value="visitor" name="ptype">Visitor</label>
                    </div>

                    <div class="form-group">
                        <label>Permit Holder's Name</label>
                        <input type="text" id="pnameupt" name="pname" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid From Date</label>
                        <input type="date" id="validfromupt" name="validfrom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid Until Date</label>
                        <input type="date" id="validuntillupt" name="validuntill" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Issued Date</label>
                        <input type="date" id="pissueupt" name="pissue" class="form-control"/>
                    </div>
                    <button id="updateuserbutton" type="submit" class="btn btn-default">Update</button>
                    <div class="form-group">
                        <label id="messageupdt"></label>

                    </div>


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
