<?php
require_once 'Classes/UserDB.php';
require_once 'Classes/SessionsDB.php';
require_once 'Classes/RaisecompDB.php';
$isLoggedIn = new SessionsDB();
$usr=UserDB::getUserData();

if(!$isLoggedIn->is_loggedin())
{
    $isLoggedIn->redirect();
}
$values = RaisecompDB::getApartmentIds()
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
                <a href="#">Complaints</a>
            </li>
            <li class="breadcrumb-item active">Raise Complaint</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Raise Complaint</div><br>
           <div class="container">
               <form role="form" action="action.php" id="insertcomplaint" method="post" enctype="multipart/form-data" >
                   <input type="hidden" name="forminstance" value="insertraisecomplaint">
                   <div class="form-group">
                       <label for="aptid">Apartment number</label>
                       <select name="aptid" name="sub-category" class="form-control">
                           <?php
                            foreach ($values as $value) {
                                echo "<option value='" . $value['apt_id'] . "'>" . $value['apt_number'] . "</option>";
                            }
                            ?>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="department">Department</label>
                       <select id="department" name="department" class="form-control">
                           <option>Security</option>
                           <option>Administration</option>
                           <option>Maintenance</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="category">Complaint severity</label>
                       <select id="category" name="category" class="form-control">
                           <option value="low">Low</option>
                           <option value="medium">Medium</option>
                           <option value="high">High</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Complaint Description</label>
                       <textarea class="form-control" name="cdesc" placeholder="Complaint Description" required></textarea>
                   </div>
                   <div class="form-group">
                       <label>Complaint Image</label>
                       <input type="file" name="cimg" class="form-control"
                              id="" placeholder="" accept="image/jpeg, image/jpg, image/png "/>
                   </div>

                   <div class="form-group">
                       <button type="submit" class="btn btn-default">Submit</button></div>
                   <div class="form-group">

                       <label id="message">
                           <?php
                           if(isset($_GET['result']))
                           {
                               if($_GET['result'] == "success"){
                                   echo "<span style='color: green'>Complaint raised successfully</span>";
                               }
                               else {
                                   echo "<span style='color: red'>Error in raising complaint</span>";
                               }
                           }
                           ?>
                       </label>

                   </div>
               </form>
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
                    <input type="hidden" name="forminstance" value="insertuser">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select id="department" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory">Sub-Category</label>
                        <select id="subcategory" class="form-control">
                            <option selected>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                            <option>..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Complaint Description</label>
                        <textarea class="form-control" placeholder="Complaint Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Complaint Image</label>
                        <input type="file" class="form-control"
                               id="" placeholder="" accept="image/*"/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Submit</button></div>
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
