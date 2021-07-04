<!DOCTYPE html>

<head>
    <title>Loan Details</title>
    <?php
     include "navbar.php";
    include "connect.php";
    include "header.php";
    session_start();
    ?>

    <div class="row">
        <div class="col-3">
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
                        <li><a href="customerdetails.php"><em class="fa fa-user-friends">&nbsp;</em> Personal
                                Details</a></li>
                        <?php
                        } else { ?>

                        <li class=""><a href="customerdetails2.php"><em class="fa fa-user-friends">&nbsp;</em> Customer
                                Details</a>
                        </li>
                        <?php } ?>
                        <?php
                        $typ = "user";
                        if ($_SESSION['login_type'] == $typ) { ?>
                        <li><a href="loanapplication.php"><em class="fa fa-hand-holding-usd">&nbsp;</em>Apply online</a>
                        </li>
                        <?php
                        } ?>
                        <?php
                        $typ = "user";
                        if ($_SESSION['login_type'] == $typ) { ?>
                        <li><a href="loandetails.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a>
                        </li>
                        <?php
                        } else { ?>
                        <li><a href="loandetails2.php"><em class="fa fa-hand-holding-usd">&nbsp;</em> Loan Details</a>
                        </li>
                        <?php }
                        $typ = "admin";
                        if ($_SESSION['login_type'] == $typ) : ?>
                        <li class="active"><a href="loanapplications.php"><em class="fa fa-toggle-off">&nbsp;</em> Loan
                                Applications</a>
                        </li>
                        <?php endif; ?>

                        <?php
                        $typ = "user";
                        if ($_SESSION['login_type'] == $typ) { ?>
                        <li><a href="EWIdetails.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>
                        <?php
                        } else { ?>
                        <li><a href="EWIdetails1.php"><em class="fa fa-clone">&nbsp;</em> EWI Details </a></li>

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
        </div>
        <div class="col-9 ml-6">
            <?php
            if (isset($_POST['approve_loan'])) {
                $loan_id = $_POST['loanId'];
                $date = date("Y-m-d");
                $update_loan_sqr = "UPDATE loan_details SET loan_status=1, issue_date= '" . $date . "' WHERE Id = '" . $loan_id . "'";
                $result = mysqli_query($conn, $update_loan_sqr);
                if ($result) {
                    $query_loan_tenure = "SELECT loan_tenure,app_id,loan_amount FROM loan_details WHERE Id = '" . $loan_id . "'";
                    $result = mysqli_query($conn, $query_loan_tenure);
                    $queryResults = mysqli_num_rows($result);
                    $row = mysqli_fetch_assoc($result);
                    $applicant_id = $row['app_id'];
                    $total_loan =  $row['loan_amount'];
                    $loan_interest = $total_loan * 0.1;
                    $loan_tenure = $row['loan_tenure'];
                    $amount_per_installment = ($total_loan + $loan_interest) / $loan_tenure;
                    $date = date("Y-m-d");
                    for ($i = 1; $i <= $loan_tenure; $i++) {
                        $installment_week = "Week " . $i;
                        $query_insert_loan_ewi = "INSERT INTO Ewi (applicant_id, loan_id ,amount_per_installment, installment_week, date_to_return) 
                        VALUES ('$applicant_id', '$loan_id' , '$amount_per_installment' , '$installment_week' , '$date' )";
                        $result = mysqli_query($conn, $query_insert_loan_ewi);
                        if ($result) {
                        } else {
                            echo 'Something Wrong' . $conn->error;
                        }
                        $nextdate = strtotime("+1 weeks", strtotime($date));
                        $date = date("Y-m-d", $nextdate);
                    }
                }
            }

            
            $sql = "SELECT * FROM guarantor_details,loan_details WHERE guarantor_details.guarantor_id = loan_details.guarantor_id ";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Loan Details</b>
                        <span class="float:right">
                            <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)"
                                id="">
                                <i class="fa fa-plus"></i> Loan
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">S/N</th>
                                    <th class="">Customer Name</th>
                                    <th class="">Guarantor Name</th>
                                    <th class="">Loan Amount</th>
                                    <th class="">Loan Tenure</th>
                                    <th class="">Issue Date</th>
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
                                        //QUERY APPLICANT NAME
                                        $query_applicant_name = "SELECT applicant_full_name FROM applicants_details WHERE applicant_id = '" .$row['app_id']. "'";
                                        $result_applicant_name = mysqli_query($conn, $query_applicant_name);
                                        $loan_id = $row['Id'];      
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $sn ?></td>

                                            <td class="">
                                                <p> <b> <?php echo mysqli_fetch_assoc($result_applicant_name)['applicant_full_name']; ?> </b></p>
                                            </td>
                                            <td class="">
                                                <p> <b><?php echo $row['guarantor_full_name']; ?></b> </p>
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
                                                <p class="text-success">
                                                    <b><?php if ($row['loan_status'] == 0) echo "waiting..";
                                                        else echo  "Approved"; ?></b>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($row['loan_status'] == 0) { ?>
                                                    <form action="loanapplications.php" method="POST" style="display: hidden;">
                                                        <input type="text" name="loanId" value=<?php echo $loan_id ?> style="display: none;"></input>
                                                        <button type="text" class="btn btn-sm btn-outline-primary" name="approve_loan">
                                                            Approve
                                                        </button>
                                                    </form>
                                                <?php } else { ?>

                                                    <form action="EWIdetails1.php" method="POST" style="display: hidden;">
                                                        <input type="text" name="loanId" value=<?php echo $loan_id ?> style="display: none;"></input>
                                                        <button type="text" class="btn btn-sm btn-outline-primary" name="view_ewi">
                                                            VIEW EWI
                                                        </button>
                                                    </form>
                                                <?php } ?>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } 
                                else {
                                    echo "<tr><td>No user found </td></tr>";}
                                ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="approve-loans">
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

        <!--/.main-->

        <?php include "footer.php";?>

        </html>