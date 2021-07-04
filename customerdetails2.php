<!DOCTYPE html>

<?php 
include "navbar.php";
include "connect.php";
include "header.php";
session_start();
?>
<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
Google Fonts
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<link rel="stylesheet" href="assets/font-awesome/css/all.min.css"> -->

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
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="customerdetails.php"><em class="fa fa-user-friends">&nbsp;</em> Personal Details</a></li>
            <?php 
            }else{ ?>

            <li class="active"><a href="customerdetails2.php"><em class="fa fa-user-friends">&nbsp;</em> Customer
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
            <li><a href="paymentdetails1.php"><em class="fa fa-clone">&nbsp;</em> Payment Details</a></li>
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
<?php						
$users = "SELECT * FROM applicants_details";
$result = mysqli_query($conn , $users);
$queryResults = mysqli_num_rows($result);					
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <b>Customer Details</b>
            <span class="float:right">
                <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="">
                    <i class="fa fa-plus"></i> Customer
                </a>
            </span>
        </div>
        <div class="card-body">
            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="">Full Name</th>
                        <th class="">Gender</th>
                        <th class="">Date of Birth</th>
                        <th class="">NIDA Number</th>
                        <th class="">Address</th>
                        <th class="">Marital Status</th>
                        <th class="">Occupation</th>
                        <th class="">Mobile Number</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
										if($queryResults > 0){
											$sn = 0;

											while($row = mysqli_fetch_assoc($result)){
												$sn ++;
										?>
                    <tr>
                        <td class="text-center"><?php echo $sn ?></td>

                        <td class="">
                            <p> <b><?php echo $row['applicant_full_name'] ?></b></p>
                        </td>
                        <td class="">
                            <p> <b><?php echo $row['gender'] ?></b></p>
                        </td>
                        <td class="text-right">
                            <p> <b><?php echo $row['date_of_birth'] ?></b></p>
                        </td>
                        <td class="">
                            <p><b><?php echo $row['nida_id'] ?></b></p>
                        </td>
                        <td class="">
                            <p><b><?php echo $row['applicant_address'] ?></b></p>
                        </td>
                        <td class="">
                            <p><b><?php echo $row['marital_status'] ?></b></p>
                        </td>
                        <td class="">
                            <p><b><?php echo $row['occupation']?></b></p>
                        </td>
                        <td class="">
                            <p><b><?php echo $row['phone_no'] ?></b></p>
                        </td>

                        <td class="text-center">
                            <!-- <button class="btn btn-sm btn-outline-primary view_payment" type="button" data-id="" >View</button> -->
                            <!-- <button class="btn btn-sm btn-outline-primary edit_tenant" 
												type="button" data-id="" >Edit</button>
												<button class="btn btn-sm btn-outline-danger delete_tenant" type="button" data-id="">Delete</button> -->
                            <button type="button" class="btn btn-outline btn-success btn-sm" data-toggle="modal"
                                data-target="#editcustomerdetails">
                                Edit Details
                            </button>
                            <button class="btn btn-outline btn-danger btn-sm" type="button" data-id="">Delete</button>
                        </td>
                    </tr>
                    <?php

											}
										
										}
										else{
											echo "<tr><td> No user</td></tr>";
										}	
										?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="editcustomerdetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>

</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
</script>
<?php include "footer.php";?>

</html>