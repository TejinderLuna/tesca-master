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
	
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    
	
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
<!--
<div id="overlay" onclick="off()">
	<div id="overlaytext">Feature Coming Soon</div>
</div> -->

    <!-- <a class="navbar-brand" href="dashboard.php">TESCA</a> -->

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Complaints</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Complaints</div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="displaycomplaintsdataTable" width="100%" cellspacing="0">

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
	
	<!-- Custom scripts for this page-->
	<script type="text/javascript" src="ajax/script.js"></script>

</div>
</div>




</body>

</html>
