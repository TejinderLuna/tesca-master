<?php 

require_once 'Classes/SessionsDB.php';
require_once 'Classes/UserDB.php';
require_once 'Classes/ApartmentDB.php';

$isLoggedIn = new SessionsDB();
    
if(!$isLoggedIn->is_loggedin())
{
	$isLoggedIn->redirect();	
}
$userids = UserDB::getUserDataByCategory();
$aptids = ApartmentDB::getApartmentData();
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
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#">Master Menu</a>
      </li>
      <li class="breadcrumb-item active">User - Apartment Linking</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> User - Apartment Linking</div>
      <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal">Insert</button>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="displayaptuserdatatable" width="100%" cellspacing="0">
			
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
          User-Apartment Linking
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <form role="form" id="insertaptuserform">
            <input type="hidden" name="forminstance" value="insertaptuser">
          <div class="form-group">
            <label>Apartment ID<span class="requiredfield">*</span></label>
            <select name="aptid" required>
                <?php
                foreach ($aptids as $value) {
                    echo "<option value='" . $value['apt_id'] . "'>" . $value['apt_number'] . "</option>";
                }
                ?>
            </select>
          </div>
          <div class="form-group">
            <label>User ID<span class="requiredfield">*</span></label>
              <select name="userid">
                  <?php
                  foreach ($userids as $value) {
                      echo "<option value='" . $value['user_id'] . "'>" . $value['user_name'] . "</option>";
                  }
                  ?>
              </select>
          </div>
          <div class="form-group">
            <label>Lease Start Date<span class="requiredfield">*</span></label>
            <input type="date" class="form-control"
                   name="leasestdt" placeholder="Date of Lease Start"  required/>
          </div>
          <div class="form-group">
            <label>Lease End Date<span class="requiredfield">*</span></label>
            <input type="date" class="form-control"
                   name="leaseenddt" placeholder="Date of Lease End"  required />
          </div>
          <div class="form-group">
            <label>Is Active Tenant?<span class="requiredfield">*</span></label>
            <input type="radio" class="form-control"
                   name="isactivetenant" value="1" placeholder="" checked />Yes<br>
              <input type="radio" class="form-control"
                     name="isactivetenant" value="0" placeholder=""/>No
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
          Update User Details
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <form role="form" id="updateuserform">
            <input type="hidden" name="forminstance" value="updateaptuserbtnclicked">
            <input type="hidden" id="aptuseridupdt" name="auid"/>
			  <div class="form-group">
				<label>Apartment ID<span class="requiredfield">*</span></label>
				<input type="text" class="form-control"
					   name="aptidupdt" placeholder="Apt ID #" required />
			  </div>
			  <div class="form-group">
				<label>User ID<span class="requiredfield">*</span></label>
				<input type="text" class="form-control"
					   name="useridupdt" placeholder="User ID #" required />
			  </div>
			  <div class="form-group">
				<label>Lease Start Date<span class="requiredfield">*</span></label>
				<input type="date" class="form-control"
					   name="leasestdtupdt" placeholder="Date of Lease Start"  />
			  </div>
			  <div class="form-group">
				<label>Lease End Date<span class="requiredfield">*</span></label>
				<input type="date" class="form-control"
					   name="leaseenddtupdt" placeholder="Date of Lease End"  />
			  </div>
			  <div class="form-group">
				<label>Is Active Tenant?<span class="requiredfield">*</span></label>
				<input type="radio" class="form-control"
					   name="isactivetenantupdt" value="1" placeholder="" checked />Yes<br>
				  <input type="radio" class="form-control"
						 name="isactivetenantupdt" value="0" placeholder=""/>No
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
