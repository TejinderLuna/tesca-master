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
</head>


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Inventories</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Inventories</div>
            <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal">Insert</button>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
                    Inventory Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Inventory Name</label>
                        <input type="text" class="form-control"
                               id="" />
                    </div>
                    <div class="form-group">
                        <label>Inventory Quantity</label>
                        <input type="number" class="form-control" id="" />
                    </div>
                    <div class="form-group">
                        <label>Inventory Purchase Date</label>
                        <input type="date" class="form-control"
                               id=""/>
                    </div>
                    <div class="form-group">
                        <label>Inventory Unit Price</label>
                        <input type="number" class="form-control"
                               id=""/>
                    </div>
                    <div class="form-group">
                        <label>Inventory Unit of Measure</label>
                        <input type="text" class="form-control"
                               id="" placeholder="Ltrs/Kg/Lbs/Piece"/>
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
                    Update Inventory Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Inventory Name</label>
                        <input type="text" class="form-control"
                               id="" value="xyz"/>
                    </div>
                    <div class="form-group">
                        <label>Inventory Quantity</label>
                        <input type="number" class="form-control"value="xyz" id="" />
                    </div>
                    <div class="form-group">
                        <label>Inventory Purchase Date</label>
                        <input type="date" class="form-control"
                               id=""/>
                    </div>
                    <div class="form-group">
                        <label>Inventory Unit Price</label>
                        <input type="number" class="form-control"
                               id=""/>
                    </div>
                    <div class="form-group">
                        <label>Inventory Unit of Measure</label>
                        <input type="text"value="xyz" class="form-control"
                               id=""/>
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
