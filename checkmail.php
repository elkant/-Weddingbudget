<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'db.php';

$email=$_POST["emailad"];

$qry=" select id,name from account where username='".$email."' ";

$isresetmail="no";

$exc = mysqli_query($conn,$qry) or die(mysqli_error()); //mysqli_query($conn, $getpriorityitems) or die(mysqli_error());
if($exc){
    while ($row = mysqli_fetch_array($exc)) 
    {
     $isresetmail="yes";
     
     $resetcode=uniqid();
     
     //insert code to db
     //
     $update="update account set emailverificationcode='".$resetcode."' where username='".$email."' ";
     
     
if(mysqli_query($conn, $update)){
       
    //send mail
    
    require 'sendmail.php';
$msg=" Hi ".$row["name"]." ,<br/>You have initiated a password reset of your account on wedding budget.
    <br/>If this was you,kindly proceed by clicking on this link http://www.weddingbudget.co.ke/executereset.php?code=".$resetcode."&user=".urlencode($email)."  <br/> If you did not initiate such a request, please ignore this email.";
 anymail("care@weddingbudget.co.ke","Wedding Budget Care", "Wedding budget Password Reset","".$msg);

    
   }
   else {
    echo "password reset not executed";   
       
   }  
     //initiate a link to reset password
     
     
    
    }
    }
    if ($isresetmail=='yes'){
        echo "<h6 style='color:green'> A password reset link has been sent to you via the email <b>".$email."</b>. Kindly check your inbox or spam sections to access the link.</h6>";
        
    }
    else {
        
         echo "<h6 style='color:red'> Sorry, your email <b>".$email." is not regestered on our servers.</b></h6>";
        
    }