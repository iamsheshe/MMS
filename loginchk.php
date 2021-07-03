<?php
session_start();
include "connect.php";
            //$msg = '';
            $user=$_POST['username'];
            $psd=$_POST['password'];
           
            if ( isset($_POST['login']) && !empty($_POST['username']) 
            && !empty($_POST['password'])) {
              
                $qry = $conn->query("SELECT * FROM auth where username = '".$user."' and pwd = '".$psd."' ");
                if($qry->num_rows > 0){
                 
                $row=$qry->fetch_assoc();
                  $_SESSION['valid'] = true;
                 // $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $row['username'];
                  $_SESSION['login_type'] = $row['typ'];
                  $_SESSION['user_id'] = $row['id'];
                  header("location:dashboard.php");
                //  echo 'You have entered valid use name and password';
               }
              }
              else {
                //  $msg = 'Wrong username or password';
                echo 'Something Wrong' .$conn->error;
                // header("location:login.php");
               }
            
         ?>