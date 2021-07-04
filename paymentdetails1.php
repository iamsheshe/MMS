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
<?php include "footer.php";?>

</html>