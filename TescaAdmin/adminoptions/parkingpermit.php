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
    <style>
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
    </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="on()">
<?php include_once('includes/navbar.php'); ?>
<!-- Navigation-->

<div id="overlay" onclick="off()">
    <div id="overlaytext">Feature Coming Soon</div>
</div>
<!-- <a class="navbar-brand" href="dashboard.php">TESCA</a> -->


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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Permit ID</th>
                            <th>Permit Type</th>
                            <th>Permit Holder User</th>
                            <th>Permit Holder Name</th>
                            <th>Permit Valid From Date</th>
                            <th>Permit Valid Until Date</th>
                            <th>Permit Issued Date</th>
                            <th>Permit Issued bu UserID</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Permit ID</th>
                            <th>Permit Type</th>
                            <th>Permit Holder User</th>
                            <th>Permit Holder Name</th>
                            <th>Permit Valid From Date</th>
                            <th>Permit Valid Until Date</th>
                            <th>Permit Issued Date</th>
                            <th>Permit Issued bu UserID</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>Permit ID</td>
                            <td>Permit Type</td>
                            <td>Permit Holder User</td>
                            <td>Permit Holder Name</td>
                            <td>Permit Valid From Date</td>
                            <td>Permit Valid Until Date</td>
                            <td>Permit Issued Date</td>
                            <td>Permit Issued bu UserID</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" href="#updatemodal">Update</button>
                            </td>
                            <td><button type="submit" value="Delete" class="btn btn-primary">Delete</button>
                            </td>
                        </tr>
                        </tbody>
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
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Parking Permit Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Permit Type</label><br>
                        <label class="radio-inline"><input type="radio" value="tenant" name="parkingpermit">Tenant</label>
                        <label class="radio-inline"><input type="radio" value="visitor" name="parkingpermit">Visitor</label>
                    </div>

                    <div class="form-group">
                        <label>Permit Holder's Name</label>
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid From Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid Until Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Issued Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>


            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
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
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel1">
                    Update Parking Permit Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Permit Type</label><br>
                        <label class="radio-inline"><input type="radio" value="tenant" name="parkingpermit">Tenant</label>
                        <label class="radio-inline"><input type="radio" value="visitor" name="parkingpermit">Visitor</label>
                    </div>

                    <div class="form-group">
                        <label>Permit Holder's Name</label>
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid From Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Valid Until Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Permit Issued Date</label>
                        <input type="date" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>


            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
</body>

</html>
