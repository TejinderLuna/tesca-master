<?php
require_once 'Classes/UserDB.php';
require_once 'Classes/SessionsDB.php';
require_once 'Classes/RaisecompDB.php';
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
                <a href="#">My Profile</a>
            </li>
            <li class="breadcrumb-item active">Change Password</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Change Password</div><br>
            <div class="container">
                <form role="form" method="post" action="action.php" id="changepasswordform">
                    <input type="hidden" name="forminstance" value="changepassword">

                    <div class="form-group">
                        <label>Old Password<span class="requiredfield">*</span></label>
                        <input type="password" class="form-control"
                               name="oldpassword" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label>New Password<span class="requiredfield">*</span></label>
                        <input type="password" class="form-control"
                               name="newpassword" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password<span class="requiredfield">*</span></label>
                        <input type="password" class="form-control"
                               name="cpassword" placeholder="Password"/>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <div class="form-group">
                        <label id="message">
                            <?php
                            if(isset($_GET['result']))
                            {
                                if($_GET['result'] == "success"){
                                    echo "<span style='color: blue'>Password successfully changed!!</span>";
                                }
                                elseif($_GET['result'] == "failure") {
                                    echo "<span style='color: red'>Old Password is not found</span>";
                                }
                                elseif ($_GET['result'] == "notmatched")
                                {
                                    echo "<span style='color: red'>Password Does not match</span>";
                                }
                                else
                                {
                                    echo "<span style='color: red'>".$_GET['result']."</span>";
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

</body>

</html>
