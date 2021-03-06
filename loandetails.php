<!DOCTYPE html>
<?php 
include "connect.php";
include "navbar.php";
session_start();

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
   
   
   
   
   
	  

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!--nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>MICROFINANCE COMPANY</span></a>
				
			</div>
		</div><!-- /.container-fluid >
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li ><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="customerdetails.html"><em class="fa fa-user-friends">&nbsp;</em> Customer Details</a></li>
			<li class="active"><a href="loandetails.html"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
			<li><a href="loanapplication.html"><em class="fa fa-toggle-off">&nbsp;</em> Loan Application</a></li>
			<li><a href="EWIdetails.html"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>
			<li><a href="paymentdetails.html"><em class="fa fa-clone">&nbsp;</em> Payment(EWI) Details</a></li>
			<li><a href="report.html"><em class="fa fa-clone">&nbsp;</em> Report</a></li>
			
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<!-- <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Loan Details</li>
			</ol>
		</div> --><!--/.row-->
		<!-- <br>
		<div class="container-fluid">
	
			<div class="col-lg-12">
				<div class="row mb-4 mt-4">
					<div class="col-md-12">
						
					</div>
				</div>
				<div class="row"> -->
				<!-- SELECT guarantor_id FROM guarantor_details WHERE app_id = 1 AND guarantor_full_name = 'William kiluma' -->

<?php
	$sql_name = "SELECT applicant_full_name FROM applicants_details WHERE applicant_id = '".$_SESSION['user_id']."'";
	$sql = "SELECT * FROM guarantor_details,loan_details WHERE guarantor_details.guarantor_id = loan_details.guarantor_id ";
	// AND app_id = '".$_SESSION['user_id']."' 
	$result = mysqli_query($conn , $sql);
	$result_name = mysqli_query($conn , $sql_name);
	$queryResults = mysqli_num_rows($result);

?>					

<!-- FORM Panel -->
		
					<!-- Table Panel -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<b>Loan Details</b>
								<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="">
							<i class="fa fa-plus"></i> Loan
						</a></span>
							</div>
							<div class="card-body">
								<table class="table table-condensed table-bordered table-hover">
									<thead>
										<tr>
											<th class="">S/N</th>
										    <th class="">Customer Name</th>
											<th class="">Guarantor Name</th>
											<th class="">Amount</th>
											<th class="">Loan Tenure</th>
											<th class="">Issue Date</th>
											<th class="">Loan status</th>
										</tr>
									</thead>
									<?php

										if($queryResults > 0){
											
											$sn = 0;
											$applicant_name = mysqli_fetch_assoc($result_name);
											while($row = mysqli_fetch_assoc($result)){
												if($row['app_id'] == $_SESSION['user_id']){
													$sn++;
													?>
													<tbody>
										
										<tr>
											<td class="text-center"><?php echo $sn ?></td>
											
											<td class="">
												 <p> <b> <?php echo $applicant_name['applicant_full_name']; ?> </b></p>
											</td>
											<td class="">
												 <p> <b><?php echo $row['guarantor_full_name'];?></b> </p>
											</td>
											<td class="">
												<p> <b><?php echo $row['loan_amount']; ?></b></p>
										   </td>
											<td class="">
												 <p><b><?php echo $row['loan_tenure']; ?></b></p>
											</td>
											<td class="">
												 <p> <b><?php echo $row['issue_date']; ?></b></p>
											</td>
											<td class="">
												 <p><b><?php if($row['loan_status']==0) echo "waiting.."; else echo "Approved"; ?></b></p>
											</td>
											
											
											
											
										   
											<!-- <td class="text-center">
												<button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="<?php echo $row['id'] ?>" >View</button>
												<button class="btn btn-sm btn-outline-primary edit_tenant" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
												<button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
											</td> -->
										</tr>
										
									</tbody>



									<?php
												}	
											}
										}
										else echo "<tr><td>No user found </td></tr>";
									?>
									
								</table>
							</div>
						</div>
					</div>
					<!-- Table Panel -->
				</div>
			</div>	
		
		</div>
		<style>
			
			td{
				vertical-align: middle !important;
			}
			td p{
				margin: unset
			}
			img{
				max-width:100px;
				max-height: 150px;
			}
		</style>
			<!--/.main-->
	<style>
	td{
		vertical-align: middle !important;
		margin: unset
	}

	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: 150px;
	}
	</style>
	</div>	<!--/.main-->
	  

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
