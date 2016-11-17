<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'db.php';

$email=$_POST["email"];
$pwd=$_POST["pwd"];
$code=$_POST["code"];

$update="update account set password='".MD5($pwd)."' where username='".$email."' and emailverificationcode='".$code."' ";
     
     
if(mysqli_query($conn, $update)){
       
    //send mail
//    
//    require 'sendmail.php';
//$msg=" Hi ".$row["name"]." ,<br/>You have initiated a password reset of your account on wedding budget.
//    <br/>If this was you,kindly proceed by clicking on this link http://www.weddingbudget.co.ke/executereset.php?code=".$resetcode."&user=".$email."  <br/> If you did not initiate such a request, please ignore this email.";
// anymail("care@weddingbudget.co.ke","Wedding Budget Care", "Wedding budget Password Reset","".$msg);
 echo "<font color='green'>password reset successfully. <br/> Go to <a href='index.php#/register'>Login Page </a></font>";
    
   }
   else {
    echo "<font color='red'> Password reset not successful</font>";   
       
   } 
