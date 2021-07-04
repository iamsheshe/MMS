<!DOCTYPE html>
<?php
include "navbar.php";
include "connect.php";
include "header.php";
session_start();
?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header"> <a class="navbar-brand" href="#"><span>MICROFINANCE COMPANY</span></a>
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
			$typ = "user";
			if ($_SESSION['login_type'] == $typ) { ?>
				<li><a href="customerdetails.php"><em class="fa fa-user-friends">&nbsp;</em> Personal Details</a></li>
			<?php
			} else { ?>

				<li><a href="customerdetails2.php"><em class="fa fa-user-friends">&nbsp;</em> Customer
						Details</a>
				</li>
			<?php } ?>
			<?php
			$typ = "user";
			if ($_SESSION['login_type'] == $typ) { ?>
				<li><a href="loanapplication.php"><em class="fa fa-hand-holding-usd">&nbsp;</em>Apply online</a></li>
			<?php
			} ?>
			<?php
			$typ = "user";
			if ($_SESSION['login_type'] == $typ) { ?>
				<li><a href="loandetails.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
			<?php
			} else { ?>
				<li><a href="loandetails2.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
			<?php }
			$typ = "admin";
			if ($_SESSION['login_type'] == $typ) : ?>
				<li><a href="loanapplications.php"><em class="fa fa-toggle-off">&nbsp;</em> Loan Applications</a></li>
			<?php endif; ?>

			<?php
			$typ = "user";
			if ($_SESSION['login_type'] == $typ) { ?>
				<li><a href="EWIdetails.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>
			<?php
			} else { ?>
				<li class="active"><a href="EWIdetails1.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>

			<?php }
			$typ = "user";
			if ($_SESSION['login_type'] == $typ) { ?>
				<li><a href="paymentdetails.php"><em class="fa fa-clone">&nbsp;</em>Paid Payment</a></li>
			<?php
			} else { ?>
				<li><a href="paymentdetails1.php"><em class="fa fa-clone">&nbsp;</em> Payment Details</a></li>
			<?php } ?>
			<?php
			$typ = "admin";
			if ($_SESSION['login_type'] == $typ) : ?>
				<li><a href="report.html"><em class="fa fa-clone">&nbsp;</em> Report</a></li>
			<?php endif; ?>

			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
</nav>
<?php
session_start();
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EWI Details</title>
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
	if (isset($_POST['view_ewi'])) {
		$_SESSION['loan_id'] = $_POST['loanId']; //Tunza loam id for refreshing the page after payment has been made
		$loan_id = $_POST['loanId'];
		$query_loan_ewi = "SELECT * FROM Ewi WHERE loan_id = '" . $loan_id . "'";
		$result = mysqli_query($conn, $query_loan_ewi);

		//PULL THE APLLICANT NAME
		$query_loan_applicant_id = "SELECT applicant_id FROM Ewi WHERE loan_id = '" . $loan_id . "'";
		$result3 = mysqli_query($conn, $query_loan_applicant_id);
		$applicant_id = mysqli_fetch_assoc($result3)['applicant_id'];
		$query_applicant_name = "SELECT applicant_full_name FROM applicants_details WHERE applicant_id = '" . $applicant_id . "'";
		$result1 = mysqli_query($conn, $query_applicant_name);
		$row1 = mysqli_fetch_assoc($result1);
	}



	if (isset($_POST['add_payment'])) {
		$Ewi_id = $_POST['Ewi_id'];
		$date = date("Y-m-d");
		$update_ewi = "UPDATE Ewi SET payment_status=1, payment_issued_at = '" . $date . "' WHERE id = '" . $Ewi_id . "'";
		$result = mysqli_query($conn, $update_ewi);


		//FUTA DATA FROM DATABASE FOR AUTOMATIC UPDATE 
		$loan_id = $_SESSION['loan_id'];
		$query_loan_ewi = "SELECT * FROM Ewi WHERE loan_id = '" . $loan_id . "'";
		$result = mysqli_query($conn, $query_loan_ewi);

		//PULL THE APLLICANT NAME
		$query_loan_applicant_id = "SELECT applicant_id FROM Ewi WHERE loan_id = '" . $loan_id . "'";
		$result3 = mysqli_query($conn, $query_loan_applicant_id);
		$applicant_id = mysqli_fetch_assoc($result3)['applicant_id'];
		$query_applicant_name = "SELECT applicant_full_name FROM applicants_details WHERE applicant_id = '" . $applicant_id . "'";
		$result1 = mysqli_query($conn, $query_applicant_name);
		$row1 = mysqli_fetch_assoc($result1);
	}
	?>


	<!-- Table Panel -->
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<b>EWI Details for </b><?php echo $row1['applicant_full_name'] ?>
				<span class="float:right">
					<a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="" id="">
						<i class="fa fa-plus"></i> EWI
					</a></span>
			</div>

			<div class="card-body">
				<table class="table table-condensed table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">SN</th>
							<th class="">Amount</th>
							<th class="">Week</th>
							<th class="">Date to Return</th>
							<th class="">Payment Date</th>
							<th class="">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (mysqli_num_rows($result) > 0) {
							$sn = 0;


							// echo date("Y-m-d", $date);
							while ($row = mysqli_fetch_assoc($result)) {
								$sn++;
						?>
								<tr>
									<td class="text-center"><?php echo $sn; ?></td>
									<td class="">
										<p> <b><?php echo $row['amount_per_installment'] ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $row['installment_week']; ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $row['date_to_return']; ?></b></p>
									</td>
									<td class="">
										<p> <b><?php echo $row['payment_issued_at']; ?></b></p>
									</td>
									<td class="">
										<?php if ($row['payment_status'] == 0) { ?>
											<p> <b><?php echo "Not Paid" ?></b></p>
										<?php } else { ?>
											<p> <b><?php echo "Paid" ?></b></p>
										<?php } ?>

									</td>
									<td class="text-center">
										<form action="EWIdetails1.php" method="POST" style="display: hidden;">
											<input type="text" name="Ewi_id" value=<?php echo $row['id']; ?> style="display: none;"></input>
											<button type="text" class="btn btn-sm btn-outline-primary" name="add_payment">
												ADD PAYMENT
											</button>
										</form>
								</tr>
						<?php

							}
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
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

	</div-->
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


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>
<?php include "footer.php"; ?>

</html>