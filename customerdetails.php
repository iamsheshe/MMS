<!DOCTYPE html>
<?php 
include "connect.php";
include "navbar.php";

session_start();

if(isset($_POST['add_customer_details'])){
	
	$user_id = $_SESSION['user_id'];
	$fullname = $_POST['fullname'];
	$DOB = $_POST['dob'];
	$NIDA_no = $_POST['nida_number'];
	$occupation = $_POST['occupation'];
	$gender = $_POST['gender'];
	$mstatus = $_POST['marital_status'];
	$address = $_POST['address'];
	$phone = $_POST['phone_number'];

	if (isset($_POST['add_customer_details']) && !empty($_POST['fullname']) 
               && !empty($_POST['dob']) && 
			    !empty($_POST['nida_number']) &&
                !empty($_POST['occupation']) &&
                !empty($_POST['gender'])  &&
                !empty($_POST['marital_status'])  &&
                !empty($_POST['address'])  &&
                !empty($_POST['phone_number'])) {
                $qry = $conn->query("INSERT INTO applicants_details (applicant_id,applicant_full_name,gender,date_of_birth,nida_id,applicant_address,marital_status,occupation,phone_no)
                 VALUES ('$user_id','$fullname','$gender','$DOB','$NIDA_no','$address','$mstatus','$occupation','$phone') " );
				 
                 if($qry){
                    header("location:customerdetails.php");
                 }
				 else{
					echo "Something is wrong" .$conn->error;
				}
			}

				else{
				
				  
				}

}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>customer details</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<!-- Google Fonts -->
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





	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php
						$user_id = $_SESSION['user_id'];
						$user_data = $conn->query("SELECT * FROM applicants_details WHERE applicant_id='".$user_id."' ");
						if($user_data->num_rows > 0){
							$row = $user_data->fetch_assoc();
							?>
						
							<div class="container-fluid">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title">USER INFORMATIONS</h5>
									</div>
									<!-- /.card-header -->
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-12">
												<table class="table table-bordered">
						
													<tbody>
														<tr>
															<td style="width: 30%"><b>Full Name</b></td>
															<td style="width: 70%"><?php echo $row['applicant_full_name'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Gender</b></td>
															<td style="width: 70%"><?php echo $row['gender'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Date of Birth</b></td>
															<td style="width: 70%"><?php echo $row['date_of_birth'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>NIDA Number</b></td>
															<td style="width: 70%"><?php echo $row['nida_id'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Address</b></td>
															<td style="width: 70%"><?php echo $row['applicant_address'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%; "><b>Marital Status</b></td>
															<td style="width: 70%"><?php echo $row['marital_status'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%; "><b>Occupation</b></td>
															<td style="width: 70%"><?php echo $row['occupation'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%; "><b>Mobile Number</b></td>
															<td style="width: 70%"><?php echo $row['phone_no'] ?></td>
														</tr>
													</tbody>
												</table>
										   
											</div>
											
										</div>
						
									</div>
									<!-- /.card-body -->
									<div class="card-footer">
										<!-- <button type="button" class="btn btn-outline-info mr-2">Edit</button> -->
										<button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal" 
										data-target="#editcustomerdetails">
										Edit Details
                						</button>
										
									</div>
								</div>
							
						
							</div>
                <!-- Customer Edit Modal -->
							<div class="modal fade" id="editcustomerdetails">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form action="customerdetails.php" method="POST"> 
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputName">FullName</label>
								<input type="text" name="fullname" class="form-control" id="" placeholder="FullName">
							  </div>
							  <div class="form-row">
							  <div class="form-group col-md-6">
								<label for="Dateofbirth">Date Of Birth</label>
								<input type="date" name="dob" class="form-control" id="" placeholder="Dateofbirth">
							  </div>
							</div>
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputNIDA">NIDA NUMBER</label>
								<input type="text" name="nida_number" class="form-control" id="input"
								 placeholder="XXXX-XXXX-XXXX-XXXX-XXXX">
							  </div>
							  <div class="form-group col-md-6">
								<label for="inputPassword4">Occupation</label>
								<input type="text" name="occupation" class="form-control" id="inputoccupation" placeholder="">
							  </div>
							</div>
							 
							<div class="form-group col-md-6">
								<label for="inputGender">Gender</label>
								<select id="" name="gender" class="form-control">
								  <option selected>Choose...</option>
								  <option value="Male">Male</option>
								  <option value="Female">Female</option>
								</select>
							  </div>
							  <div class="form-group col-md-6">
								<label for="inputStatus">Marital Status</label>
								<select id="" name="marital_status" class="form-control">
								  <option selected>Choose...</option>
								  <option value="Single">Single</option>
								  <option value="Married">Married</option>
								</select>
							  </div>
							  <div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputAddress">Address</label>
								<input type="text" name="address" class="form-control" id="inputAddress" 
								placeholder="125 Uhuru St, Kinondoni,Dar es salaam">
							  </div>
							  
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputPhone">Phone Number</label>
								<input type="text"name="phone_number" class="form-control" id="" placeholder="+255-XXX-XXX-XXX">
							  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
					

<?php
						}
					
						
						else{
							?>
							<form action="customerdetails.php" method="POST"> 
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputName">FullName</label>
								<input type="text" name="fullname" class="form-control" id="" placeholder="FullName">
							  </div>
							  <div class="form-row">
							  <div class="form-group col-md-6">
								<label for="Dateofbirth">Date Of Birth</label>
								<input type="date" name="dob" class="form-control" id="" placeholder="Dateofbirth">
							  </div>
							</div>
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputNIDA">NIDA NUMBER</label>
								<input type="text" name="nida_number" class="form-control" id="input"
								 placeholder="XXXX-XXXX-XXXX-XXXX-XXXX">
							  </div>
							  <div class="form-group col-md-6">
								<label for="inputPassword4">Occupation</label>
								<input type="text" name="occupation" class="form-control" id="inputoccupation" placeholder="">
							  </div>
							</div>
							 
							<div class="form-group col-md-6">
								<label for="inputGender">Gender</label>
								<select id="" name="gender" class="form-control">
								  <option selected>Choose...</option>
								  <option value="Male">Male</option>
								  <option value="Female">Female</option>
								</select>
							  </div>
							  <div class="form-group col-md-6">
								<label for="inputStatus">Marital Status</label>
								<select id="" name="marital_status" class="form-control">
								  <option selected>Choose...</option>
								  <option value="Single">Single</option>
								  <option value="Married">Married</option>
								</select>
							  </div>
							  <div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputAddress">Address</label>
								<input type="text" name="address" class="form-control" id="inputAddress" 
								placeholder="125 Uhuru St, Kinondoni,Dar es salaam">
							  </div>
							  
							<div class="form-row">
							  <div class="form-group col-md-6">
								<label for="inputPhone">Phone Number</label>
								<input type="text"name="phone_number" class="form-control" id="" placeholder="+255-XXX-XXX-XXX">
							  </div>
					
							  <div class="form-row">
							 
							</div>
						
							
							<button type="submit" name="add_customer_details"class="btn btn-primary">Save Details</button>
							
						   
						  </form>
						  <?php
						}
					?>
					
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
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</html>
