<!DOCTYPE html>
<html>


<?php 
include "navbar.php";
include "header.php";
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
            <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="customerdetails.php"><em class="fa fa-user-friends">&nbsp;</em> Personal Details</a></li>
            <?php 
            }else{ ?>

            <li><a href="customerdetails2.php"><em class="fa fa-user-friends">&nbsp;</em> Customer Details</a></li>
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

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
</div>
<!--/.row-->

<div class="panel panel-container">
    <div class="row">
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-teal panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                    <div class="large">0.00</div>
                    <div class="text-muted">Payment Today</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-blue panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                    <div class="large">52</div>
                    <div class="text-muted">Comments</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-orange panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-user color-teal"></em>
                    <div class="large">1</div>
                    <div class="text-muted">Active Loan</div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
            <div class="panel panel-red panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                    <div class="large">108,000.00</div>
                    <div class="text-muted">Total Receiver</div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>



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
<script>
window.onload = function() {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
        responsive: true,
        scaleLineColor: "rgba(0,0,0,.2)",
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleFontColor: "#c5c7cc"
    });
};
</script>
<?php include "footer.php";?>

</html>