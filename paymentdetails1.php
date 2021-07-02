<!DOCTYPE html>
<?php 
include "navbar.php";
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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







    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>


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





    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>