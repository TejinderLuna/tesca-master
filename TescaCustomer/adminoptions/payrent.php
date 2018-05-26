<?php
require_once 'Classes/UserDB.php';
require_once 'Classes/SessionsDB.php';
require_once 'Classes/PayrentDB.php';
$isLoggedIn = new SessionsDB();
$usr=UserDB::getUserData();

if(!$isLoggedIn->is_loggedin())
{
    $isLoggedIn->redirect();
}
$values = PayrentDB::getApartmentIds();
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
                <a href="#">Rent and Records</a>
            </li>
            <li class="breadcrumb-item active">Pay Rent</li>
        </ol>
        <div class="container">
            <form role="form" id="payrentform">
                <input type="hidden" name="forminstance" value="payrentdata">
                <div class="form-group">
                    <label for="month">Rent for Month</label>
                    <select id="month" name="month" class="form-control">
                        <option selected>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rent Amount</label>
                    <input type="number" class="form-control"
                           name="amount" placeholder="$XXX"  />
                </div>
                <div class="form-group">
                    <label>Apartment id:</label>
                    <select name="aptid" name="sub-category" class="form-control">
                        <?php
                        foreach ($values as $value) {
                            echo "<option value='" . $value['apt_id'] . "'>" . $value['apt_number'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <fieldset class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rentradios" id="radios1" value="Visa" checked>
                        <label class="form-check-label" for="radios1">
                            Visa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rentradios" id="radios2" value="Mastercard">
                        <label class="form-check-label" for="radios2">
                            Mastercard
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rentradios" id="radios3" value="Interac">
                        <label class="form-check-label" for="radios3">
                            Interac
                        </label>
                    </div>
                </fieldset>
                <div class="form-group">
                    <button id="payrentsubmit" type="submit" class="btn btn-default">Pay Now</button></div>
                <div class="form-group">
                    <label id="message"></label>

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
