<!DOCTYPE html>
<?php
include "navbar.php";
include "connect.php";
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment(EWI) Details</title>
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
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link href="assets/DataTables/datatables.min.css" rel="stylesheet">
	<link href="assets/css/jquery.datetimepicker.min.css" rel="stylesheet">
	<link href="assets/css/select2.min.css" rel="stylesheet">


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

	$applicant_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM guarantor_details,loan_details WHERE guarantor_details.guarantor_id = loan_details.guarantor_id AND loan_details.app_id = $applicant_id";
    $result = mysqli_query($conn, $sql);
    ?>

	<!-- Table Panel -->
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>Payment(EWI) Details</b>
				<span class="float:right">
					<a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="" id="">
						<i class="fa fa-plus"></i> Payment
					</a></span>
			</div>
			<div class="card-body">
				<table class="table table-condensed table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">SN</th>
							<th class="">Loan ID</th>
							<th class="">Guarantor Name</th>
							<th class="">Amount Rented</th>
							<th class="">Amount Paid</th>
							<th class="">Amount Remaining</th>
							<th class="">Loan Status</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($result) > 0) {
							$sn = 0;
							while ($row = mysqli_fetch_assoc($result)) {
								$sn++;
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
										<p> <b><?php echo $row['Id'];?> </b></p>
									</td>
									<td class="">
										<p> <b><?php echo $row['guarantor_full_name']; ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $row['loan_amount'] ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $amount_paid ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $amount_remain ?></b></p>
									</td>
									<td class="">
										<?php if ($amount_remain == 0 && $row['loan_status'] == 1) { ?>
											<p> <b>complete</b></p>
										<?php } elseif($amount_remain != 0 && $row['loan_status'] == 1) { ?>
											<p> <b>Incomplete</b></p>
										<?php } elseif($row['loan_status'] == 0) {?>
											<p> <b>Not Allocated</b></p>
										<?php } ?>
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
		</div>
	</div>

	<!-- Table Panel -->
	</div>
	</div>

	</div>
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

	<!--div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Customer Details</h1>
			</div>
		</div></.row>
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>Column 1</th>
					<th>Column 2</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Row 1 Data 1</td>
					<td>Row 1 Data 2</td>
				</tr>
				<tr>
					<td>Row 2 Data 1</td>
					<td>Row 2 Data 2</td>
				</tr>
			</tbody>
		</table>
		
	</div-->
	<!--/.main-->
	<style>
		td {
			vertical-align: middle !important;
			margin: unset
		}

		td p {
			margin: unset
		}

		img {
			max-width: 100px;
			max-height: 150px;
		}
	</style>



	</div>
	<!--/.main-->

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