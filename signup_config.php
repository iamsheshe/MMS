<?php
include "connect.php";
            //$msg = '';
            $fullname = $_POST['fullname'];
            $email=$_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['confirmpassword'];
            $typ="user";

            

            if (isset($_POST['signup']) && !empty($_POST['fullname']) 
               && !empty($_POST['email']) && !empty($_POST['username']) &&
                !empty($_POST['password']) &&
                 !empty($_POST['confirmpassword']) ) {
                $qry = $conn->query("INSERT INTO auth (full_name,email,username,typ,pwd)
                 VALUES ('$fullname','$email','$username','$typ','$password') " );
                 if($qry){
                    header("location:login.php");
                 }
                 else{
                     echo "Something is wrong" .$conn->error;
                 }


                 }
            else {
                header("location:signup.php");
              
            }
?>