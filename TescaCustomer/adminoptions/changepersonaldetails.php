<?php
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
            <li class="breadcrumb-item active">Change Personal Details</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Change Personal Details</div><br>
            <div class="container">
                <form role="form" id="updateuserform">
                    <input type="hidden" name="forminstance" value="updateuserbtnclciked">
                    <input type="hidden" id="useridupdt" name="uid"/>
                    <div class="form-group">
                        <label>First Name</label>
                        <input id ="fnameupdt"type="text" class="form-control"
                               name="fname" placeholder="Mickey" required />
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input id="mnameupdt" type="text" class="form-control"
                               name="mname" placeholder="Donald" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input id="lnameupdt" type="text" class="form-control"
                               name="lname" placeholder="Mouse" required />
                    </div>
                    <div class="form-group">
                        <label>Home Phone</label>
                        <input id="hphoneupdt"type="number" class="form-control"
                               name="hphone" placeholder="999-999-9999" />
                    </div>
                    <div class="form-group">
                        <label>Alternate Phone</label>
                        <input id="aphoneupdt" type="number" class="form-control"
                               name="aphone" placeholder="999-999-9999"/>
                    </div>
                    <div class="form-group">
                        <label>Cell Phone</label>
                        <input id="cphoneupdt"type="number" class="form-control"
                               name="cphone" placeholder="999-999-9999" required />
                    </div>
                    <div class="form-group">
                        <label>Email-ID</label>
                        <input id="emailupdt" type="email" class="form-control"
                               name="email" placeholder="xyz@abc.com" required />
                    </div>
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <input id="aline1updt" type="text" class="form-control"
                               name="aline1" placeholder="Address line 1" required />
                    </div>
                    <div class="form-group">
                        <label>Address Line 2</label>
                        <input id="aline2updt" type="text" class="form-control"
                               name="aline2" placeholder="Address line 2" required />
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select id="cityupdt" name="city">
                            <option value="TORONTO">TORONTO</option>
                            <option value="VANCOUVER">VANCOUVER</option>
                            <option value="OTTAWA">OTTAWA</option>
                            <option value="NOVA SCOTIA">NOVA SCOTIA</option>
                            <option value="MONTREAL">MONTREAL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <input id="provinceupdt" type="text" class="form-control"
                               name="province" placeholder="Enter Province in XX format" required />
                    </div>
                    <div class="form-group">
                        <label>Zipcode</label>
                        <input id="zipcodeupdt" type="text" class="form-control"
                               name="zipcode" placeholder="XXXXXX" required />
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input id="countryupdt" type="text" class="form-control"
                               name="country"  value="Canada" READONLY/>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input id="unameupdt" type="text" class="form-control"
                               name="uname" placeholder="Username" required />
                    </div>
                    <button id="updateuserbutton" type="submit" class="btn btn-default">Update</button>
                    <div class="form-group">
                        <label id="messageupdt"></label>

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
