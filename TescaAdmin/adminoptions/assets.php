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
			<li class="breadcrumb-item">
				<a href="#">Master Menu</a>
  		    </li>
			<li class="breadcrumb-item active">Assets</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Assets</div>
            <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal">Insert</button>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="displayassetsdatatable" width="100%" cellspacing="0">

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
                    Asset Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form id="insertassetform" role="form">
                    <input type="hidden" name="forminstance" value="insertasset">
                    <div class="form-group">
                        <label>Asset Type<span class="requiredfield">*</span></label>
                        <select name="atype">
                            <option>Furniture</option>
                            <option>Electronics</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Asset Name<span class="requiredfield">*</span></label>
                        <input type="text" class="form-control"
                               id="aname" name="aname" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Quantity<span class="requiredfield">*</span></label>
                        <input type="number" id="aquantity" name="aquantity" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Purchase Date<span class="requiredfield">*</span></label>
                        <input type="date" name="pdate" class="form-control"
                               id="pdate" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Vendor Name<span class="requiredfield">*</span></label>
                        <input type="text" class="form-control"
                               id="vname" name="vname" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Unit Price<span class="requiredfield">*</span></label>
                        <input type="number" class="form-control"
                               id="uprice" name="uprice" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Unit of Measure<span class="requiredfield">*</span></label>
                        <select name="unit">
                            <option>Kg</option>
                            <option>ltrs</option>
                            <option>lbs</option>
                        </select>
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
                    Update Asset Details
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <form role="form" id="updateassetform">
                    <input type="hidden" name="forminstance" value="updateassetbtnclicked">
                    <input type="hidden" name="asset_id" id="assetidupdt">
                    <div class="form-group">
                        <label>Asset Type<span class="requiredfield">*</span></label>
                        <select id="atypeupdt" name="atype">
                            <option value="Furniture">Furniture</option>
                            <option value="Electronics">Electronics</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Asset Name<span class="requiredfield">*</span></label>
                        <input type="text" class="form-control"
                               id="anameupdt" name="aname" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Quantity<span class="requiredfield">*</span></label>
                        <input type="number" id="aquantityupdt" name="aquantity" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Purchase Date<span class="requiredfield">*</span></label>
                        <input type="date" name="pdate" class="form-control"
                               id="pdateupdt" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Vendor Name<span class="requiredfield">*</span></label>
                        <input type="text" class="form-control"
                               id="vnameupdt" name="vname" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Unit Price<span class="requiredfield">*</span></label>
                        <input type="number" class="form-control"
                               id="upriceupdt" name="uprice" required />
                    </div>
                    <div class="form-group">
                        <label>Asset Unit of Measure<span class="requiredfield">*</span></label>
                        <select id="unitupdt" name="unit">
                            <option value="Kg">Kg</option>
                            <option value="ltrs">ltrs</option>
                            <option value="lbs">lbs</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <div class="form-group">
                        <label id="messageupdt"></label>
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
