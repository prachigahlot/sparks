<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Display Page</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container" id="head">
                            <div class="navbar-header"><a href="#" class="navbar-brand">
                       Credit Management System
                        </a></div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="signup.html" target="_blank"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
                            <li><a href="login.html" target="_blank"> <span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </div>
                         
                </div>   
            </nav>
<?php
require "includes/common.php";

$id= filter_input(INPUT_POST,'idd');



$select_query="SELECT * FROM user where user_id='".$id."'";
$select_query_result=mysqli_query($con,$select_query)or die(mysqli_error($con));
$total_rows_fetched= mysqli_num_rows($select_query_result);
if($total_rows_fetched==0)
{
    echo "no user";
}
else {?><br><br><br><br><div class="jumbotron"> <h1 id="t">The User</h1>
            <?php
   $row= mysqli_fetch_array($select_query_result);
    ?>
    <h3><b> ID of the user:<?php echo $row['user_id']; ?><br>
    Name          :<?php echo $row['Name'];?><br>
    Mobile no     :<?php echo $row['mobile_no'];?><br>
    Email id      :<?php echo $row['email'];?><br>
    credits       :<?php echo $row['credit'];?><br></b></h3>
<form method="post" action="transaction.php?uid=<?php echo $id; ?>">
    <input type="submit" value="Transfer To" class="btn btn-danger">
</form></div>

<?php }
?>                                           
         <footer>
                <div class="container">
                    <center>
                        <p>Copyright © Credit Management. All Rights Reserved |</p>
                    </center>
                </div>
            </footer>        
        </div>
            
        
    </body>
</html>


