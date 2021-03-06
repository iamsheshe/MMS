<!DOCTYPE html>
<?php
<<<<<<< HEAD
//      include "navbar.php";
//     include "connect.php";
//     include "header.php";
//     session_start();
//     ?>
// <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
//     <div class="container-fluid">
//         <div class="navbar-header"> <a class="navbar-brand" href="#"><span>MICROFINANCE COMPANY</span></a>
=======
include "navbar.php";
include "connect.php";
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/DataTables/datatables.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript" src="assets/font-awesome/js/all.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>





</head>

<body>
    <?php
    $sql = "SELECT * FROM guarantor_details,loan_details WHERE guarantor_details.guarantor_id = loan_details.guarantor_id AND loan_status = 1";
    $result = mysqli_query($conn, $sql);
    ?>


    <!-- Table Panel -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b>Received Payments Details</b>

                <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="">
                        <i class="fa fa-plus"></i> Payments
                    </a></span>
            </div>
            <!-- admin search options -->

            <div class="card-body">
                <table class="table table-condensed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="">Customer Name</th>
                            <th class="">Guarantor Name</th>
                            <th class="">Amount Paid</th>
                            <th class="">Loan Status</th>
                            <th class="">Amount Remaining</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $sn = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sn++;
                                $query_applicant_name = "SELECT applicant_full_name FROM applicants_details WHERE applicant_id = '" . $row['app_id'] . "'";
                                $result_applicant_name = mysqli_query($conn, $query_applicant_name);
                                $loan_id = $row['Id'];


                                //QUERY EWI DETAILS
                                $loan_id = $row['Id'];
                                $query_loan_ewi = "SELECT * FROM Ewi WHERE loan_id = '" . $loan_id . "'";
                                $result_loan_ewi = mysqli_query($conn, $query_loan_ewi);
                                $amount_paid = 0;
                                $amount_remain = 0;
                                while ($ewi = mysqli_fetch_assoc($result_loan_ewi)) {
                                    $amount_per_installment = $ewi['amount_per_installment'];
                                    if ($ewi['payment_status']) {
                                        $amount_paid = $amount_paid + $ewi['amount_per_installment'];
                                    } else {
                                        $amount_remain = $amount_remain + $ewi['amount_per_installment'];
                                    }
                                }
                        ?>

                                <tr>
                                    <td class="text-center"><?php echo $sn ?></td>

                                    <td class="">
                                        <p> <b><?php echo mysqli_fetch_assoc($result_applicant_name)['applicant_full_name']; ?> </b></p>
                                    </td>
                                    <td class="">
                                        <p> <b><?php echo $row['guarantor_full_name']; ?></b></p>
                                    </td>
                                    <td class="">
                                        <p> <b><?php echo $amount_paid ?></b></p>
                                    </td>
                                    <td class="">
                                        <?php if ($amount_remain == 0) { ?>
                                            <p> <b>complete</b></p>
                                        <?php } else { ?>
                                            <p> <b>Incomplete</b></p>
                                        <?php } ?>
                                    </td>
                                    <td class="">
                                        <p> <b><?php echo $amount_remain ?></b></p>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>">View</button>
                                        <button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else echo "<tr><td>No Payment Details Found </td></tr>";
                        ?>
                    </tbody>
                </table>
            </div>
>>>>>>> origin/main
        </div>
    </div>
    <!-- /.container-fluid -->

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li class=""><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="customerdetails.php"><em class="fa fa-user-friends">&nbsp;</em> Personal Details</a></li>
            <?php 
            }else{ ?>

            <li><a href="customerdetails2.php"><em class="fa fa-user-friends">&nbsp;</em> Customer
                    Details</a>
            </li>
            <?php } ?>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="loanapplication.php"><em class="fa fa-hand-holding-usd">&nbsp;</em>Apply online</a></li>
            <?php 
            } ?>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="loandetails.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
            <?php 
            }else{ ?>
            <li><a href="loandetails2.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
            <?php }
			$typ="admin";
			if($_SESSION['login_type'] == $typ ): ?>
            <li><a href="loanapplications.php"><em class="fa fa-toggle-off">&nbsp;</em> Loan Applications</a></li>
            <?php endif; ?>

            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="EWIdetails.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>
            <?php 
            }else{ ?>
            <li><a href="EWIdetails1.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>

            <?php }
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="paymentdetails.php"><em class="fa fa-clone">&nbsp;</em>Paid Payment</a></li>
            <?php 
            }else{ ?>
            <li class="active"><a href="paymentdetails1.php"><em class="fa fa-clone">&nbsp;</em> Payment Details</a>
            </li>
            <?php } ?>
            <?php
			$typ="admin";
			if($_SESSION['login_type'] == $typ ): ?>
            <li><a href="report.html"><em class="fa fa-clone">&nbsp;</em> Report</a></li>
            <?php endif; ?>

            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
</nav>


<!-- Table Panel -->
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <b>Received Payments Details</b>

            <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right"
                    href="javascript:void(0)" id="">
                    <i class="fa fa-plus"></i> Payments
                </a></span>
        </div>
        <!-- admin search options -->

        <div class="card-body">
            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">SN</th>
                        <th class="">Customer Name</th>
                        <th class="">Guarantor Name</th>
                        <th class="">Amount Paid</th>
                        <th class="">Loan Status</th>
                        <th class="">Amount Remaining</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>

                        <td class="">
                            <p> <b>HEnry Kihanga</b></p>
                        </td>
                        <td class="">
                            <p> <b>Sheshe </b></p>
                        </td>
                        <td class="">
                            <p> <b>120000</b></p>
                        </td>
                        <td class="">
                            <p> <b>Incomplete</b></p>
                        </td>
                        <td class="">
                            <p> <b>100000</b></p>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-primary view_payment" type="button"
                                data-id="<?php echo $row['id'] ?>">View</button>
                            <button class="btn btn-sm btn-outline-primary edit_tenant" type="button"
                                data-id="<?php echo $row['id'] ?>">Edit</button>
                            <button class="btn btn-sm btn-outline-danger delete_tenant" type="button"
                                data-id="<?php echo $row['id'] ?>">Delete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Table Panel -->




<<<<<<< HEAD
<style>
td {
    vertical-align: middle !important;
}

td p {
    margin: unset
}

img {
    max-width: 100px;
    max-height: 150px;
}
</style>
=======
    <style>
        td {
            vertical-align: middle !important;
        }

        td p {
            margin: unset
        }

        img {
            max-width: 100px;
            max-height: 150px;
        }
    </style>
>>>>>>> origin/main





<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

</body>
<?php include "footer.php";?>

</html>