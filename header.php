<?php 
session_start();
if (!isset($_SESSION['user_id']))
    header("Location: login.php");
 
?>

<title>MMS - Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Custom Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
<style>
.main-fooer {
    position: fixed;
    clear: both;
    height: 150px;
    margin-top: -150px;

}
</style>
</head>

<body>