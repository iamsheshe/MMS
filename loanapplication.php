<!DOCTYPE html>
<?php 
include "connect.php";
include "navbar.php";
session_start();

if(isset($_POST['add_loan_details'])){
	
	$user_id = $_SESSION['user_id'];
	$gfullname = $_POST['G_fullname'];
	$gender = $_POST['gender'];
	$goccupation = $_POST['G_occupation'];
	$gnumber = $_POST['G_Phone'];
	$gaddress = $_POST['G_address'];
	$grelation = $_POST['G_Relationship'];
	$lamount = $_POST['L_amount'];
    $ltenure = $_POST['L_tenure'];

	if (isset($_POST['add_loan_details']) && !empty($_POST['G_fullname']) 
               && !empty($_POST['G_occupation']) && 
			    !empty($_POST['G_Phone']) &&
                !empty($_POST['G_address']) &&
                !empty($_POST['gender'])  &&
                !empty($_POST['G_Relationship'])  &&
                !empty($_POST['L_amount'])  &&
                !empty($_POST['L_tenure'])) {
                $insert_guarantor = $conn->query("INSERT INTO guarantor_details (app_id,guarantor_full_name,occupation,gender,phone_no,guarantor_address,relashionship)
                 VALUES ('$user_id','$gfullname','$goccupation','$gender','$gnumber','$gaddress','$grelation') " );
				 if($insert_guarantor){

					// $guarantor_id = $conn->query("SELECT * FROM guarantor_details");
					// if($guarantor_id->num_rows>0){
					// 	$row=$guarantor_id->fetch_assoc();
						
					// 	echo "XXXXXXXXXXXXXXXXXXX".$row;
					// 	echo $conn->error;
					// }
					$sql_guarantor_info ="SELECT * FROM guarantor_details WHERE app_id = '".$_SESSION['user_id']."' AND guarantor_full_name = '".$gfullname."'";
					$result = mysqli_query($conn , $sql_guarantor_info);
					$queryResults = mysqli_num_rows($result);
					if($queryResults>0){
						$guarantor= mysqli_fetch_assoc($result);
						$g_id = $guarantor['guarantor_id'];

						$qry2 =$conn->query("INSERT INTO loan_details (app_id,guarantor_id,loan_amount,loan_tenure)
					VALUES ('$user_id','$g_id','$lamount','$ltenure')");
					}

					
				 }

				 

				
				 
                //  if($qry1 && $qry2){
				// 	 header("location:loanapplication.php");
                //  }
				//  else{
				// 	echo "Something is wrong" .$conn->error;
				// }
			}

				else{
				
				  
				}

}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loan Application</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
</head>
<body>
				<!-- <div class="container-fluid">
						<div class="card">
							<div class="card-header">
							<h5 class="card-title">GUARANTOR DETAILS</h5>
								</div>
									<!-- /.card-header -->
									 <!-- <div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-12">
												<table class="table table-bordered">
						
													<tbody>
														<tr>
															<td style="width: 30%"><b>FullName</b></td>
															<td style="width: 70%"><?php echo $row['Fullname'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Occupation</b></td>
															<td style="width: 70%"><?php echo $row['Occupation'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Phone Number</b></td>
															<td style="width: 70%"><?php echo $row['Phone_No'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Address</b></td>
															<td style="width: 70%"><?php echo $row['G_Address'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%"><b>Address</b></td>
															<td style="width: 70%"><?php echo $row['Adress'] ?></td>
														</tr>
														<tr>
															<td style="width: 30%; "><b>Relationship</b></td>
															<td style="width: 70%"><?php echo $row['Relationship'] ?></td>
														</tr>
														
													</tbody>
			</table> -->
 
						 
	
					
							<!-- <div class="container-fluid">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title">LOAN DETAILS</h5>
									</div>
									 /.card-header -->
									<!-- <div class="card-body">
										<div class="row">
						<div class="col-lg-6 col-12">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 30%"><b>Amount Applied</b></td>
                                    <td style="width: 70%"><?php echo $row['loan_amount'] ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Loan Tenure</b></td>
                                    <td style="width: 70%"><?php echo $row['loan_tenure'] ?></td>
                                </tr>
                                
                            </tbody>
                        </table> --> 
										   
											
											
										
						
								
									<!-- /.card-body -->
									<!-- <div class="card-footer">
										<button type="button" class="btn btn-outline-info mr-2">Edit</button>
									</div>
								</div>
							
						
							</div>
					 -->

    
	<div class="panel-heading"><b> LOAN APPLICATION FORM</b></div>
	<form action="loanapplication.php" method="POST">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputGname">Guarantor FullName</label>
      <input type="text" name="G_fullname" class="form-control" id="" placeholder="FullName">
    </div>
	
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="G.occupation">Guarantor Occupation</label>
      <input type="text" name="G_occupation" class="form-control" id="" placeholder="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPhone">Guarantor Phone Number</label>
      <input type="text" name="G_Phone" class="form-control" id="" placeholder="+255-XXX-XXX-XXX">
    </div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Guarantor Address</label>
      <input type="text" name="G_address" class="form-control" id="" 
	  placeholder="125 Uhuru St, Kinondoni,Dar es salaam">
    </div>
	<div class="form-group col-md-6">
		<label for="inputGender">Gender</label>
		<select id="" name="gender" class="form-control">
		 <option selected>Choose...</option>
		<option value="Male">Male</option>
		 <option value="Female">Female</option>
		</select>
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputRelation">Relationship</label>
      <input type="text" name="G_Relationship" class="form-control" id="" placeholder="">
    </div>
	<!-- <div class="panel-heading"><b>LOAN INFORMATION</b></div> -->
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAmount">Loan Amount</label>
      <input type="text" name="L_amount" class="form-control" id="" placeholder="In Tsh">
    </div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputtenure">Loan Tenure</label>
      <input type="text" name="L_tenure" class="form-control" id="" placeholder="In Weeks">
    </div>
  </div>
  
  
  <button type="submit" name="add_loan_details" class="btn btn-primary">Apply</button>
  <button type="reset" class="btn btn-danger">Reset</button>
 
</form>
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