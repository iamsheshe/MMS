<!DOCTYPE html>

<?php 
session_start();
if (!isset($_SESSION['user_id']))
    header("Location: login.php");
  // include('./header.php'); 
   // include('./auth.php'); 
   ?>
   
<html>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" 
				data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>MICROFINANCE COMPANY</span></a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			
			
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class=""><a href="dashboard.php"><em 
			class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
			<li><a href="customerdetails.php"><em 
			class="fa fa-user-friends">&nbsp;</em> Personal Details</a></li>
            <?php 
            }else{ ?>
            
            <li><a href="customerdetails2.php"><em 
			class="fa fa-user-friends">&nbsp;</em> Customer Details</a></li>
            <?php } ?>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
            <li><a href="loanapplication.php"><em 
			class="fa fa-hand-holding-usd">&nbsp;</em>Apply online</a></li>
            <?php 
            } ?>
            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
			<li><a href="loandetails.php"><em 
			class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
            <?php 
            }else{ ?>
            <li><a href="loandetails2.php"><em 
			class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a></li>
            <?php }
			$typ="admin";
			if($_SESSION['login_type'] == $typ ): ?>
			<li><a href="loanapplications.php"><em 
			class="fa fa-toggle-off">&nbsp;</em> Loan Applications</a></li>
            <?php endif; ?>

            <?php
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
			<li><a href="EWIdetails.php"><em 
			class="fa fa-clone">&nbsp;</em> EWI Details </a></li>
            <?php 
            }else{ ?>
            <li><a href="EWIdetails1.php"><em 
			class="fa fa-clone">&nbsp;</em> EWI Details </a></li>

            <?php }
			$typ="user";
			if($_SESSION['login_type'] == $typ ){ ?>
			<li><a href="paymentdetails.php"><em 
			class="fa fa-clone">&nbsp;</em>Paid Payment</a></li>
            <?php 
            }else{ ?>
			<li><a href="paymentdetails1.php"><em 
			class="fa fa-clone">&nbsp;</em> Payment Details</a></li>
            <?php } ?>
			<?php
			$typ="admin";
			if($_SESSION['login_type'] == $typ ): ?>
			<li><a href="report.html"><em class="fa fa-clone">&nbsp;</em> Report</a></li>
			<?php endif; ?>
			
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="">Dashboard</li>
			</ol>
		</div>
		
		

		
	<!--/.main-->
	
	
</html>