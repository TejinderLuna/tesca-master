<?php
require_once 'Classes/UserDB.php';
require_once 'Classes/ApartmentDB.php';
require_once 'Classes/SessionsDB.php';

$usrs=UserDB::getUserData();
$apts=ApartmentDB::getApartmentData();

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
      <li class="breadcrumb-item active">Documents</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Documents</div>
      <button type="button" class="btn btn-primary" data-toggle="modal" href="#insertmodal" id="userinsert">Insert</button>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
          Documents
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

          <form id="insertdocumentform" role="form">
              <input type="hidden" name="forminstance" value="insertdocument">
              <div class="form-group">
                  <label>Document Name</label>
                  <input type="text" class="form-control"
                         id="docname" name="docname" placeholder=""/>
              </div>
              <div class="form-group">
                  <label>Document Type</label>
                  <select name="dtype" id="dtype">
                      <option>DOC</option>
                      <option>IMAGE</option>
                  </select>
              </div>
              <div class="form-group">
                  <form enctype="multipart/form-data">
                      Select image to upload:
                      <input type="file" name="fileToUpload" id="fileToUpload">
                     <!-- <input type="submit" value="Upload Image" name="submit"><br> -->
                      <label id="upstatus"></label>
                  </form>
              </div>

              <div class="form-group">
                  <label>User ID</label>
                  <select name="uid" id="dtype">
                      <?php foreach ($usrs as $u) :?>
                          <option value="<?php echo $u['user_id']; ?>"><?php echo $u['user_id']; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>APARTMENT ID</label>
                  <select name="aid" id="dtype">
                      <?php foreach ($apts as $a) :?>
                          <option value="<?php echo $a['apt_id']; ?>"><?php echo $a['apt_id']; ?></option>
                      <?php endforeach; ?>
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
          Update Documents
        </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">

        <form action="" method="post" role="form">
          <div class="form-group">
            <label>Document Name</label>
            <input type="text" class="form-control"
                   id="docname" name="docname" placeholder=""/>
          </div>
          <div class="form-group">
            <label>Document Type</label>
            <select name="dtype" id="dtype">
                <option>DOC</option>
                <option>IMAGE</option>
            </select>
          </div>
          <div class="form-group">
            <label>Document Image</label>
            <input type="file" class="form-control"
                   id="dimage" placeholder="" accept="image/*"/>
          </div>
            <div class="form-group">
                <label>User ID</label>
                <select name="uid" id="dtype">
                    <option>b</option>
                </select>
            </div>
            <div class="form-group">
                <label>APARTMENT ID</label>
                <select name="aid" id="dtype">
                    <option>a</option>
                </select>
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
