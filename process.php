<?php
require "includes/common.php";
$fid=filter_input(INPUT_GET,'ud');
$tid=filter_input(INPUT_POST,'idd');

$camount=filter_input(INPUT_POST,'creditamount');
$select_query="SELECT * FROM user where user_id='".$fid."'";
$select_query_result=mysqli_query($con,$select_query)or die(mysqli_error($con));
$select="SELECT * FROM user where user_id='".$tid."'";
$select_result=mysqli_query($con,$select)or die(mysqli_error($con));
$row= mysqli_fetch_array($select_query_result);
$am=$row['credit'];
$r= mysqli_fetch_array($select_result);
$amo=$r['credit'];
$nm=$am-$camount;
$n=$amo+$camount;
$q="Insert into transfers(from_id,to_id,no_of_credits_transfered) values('".$fid."','".$tid."','".$camount."')";
$s=mysqli_query($con,$q)or die(mysqli_error($con));
$t="update user set credit='".$nm."' where user_id='".$fid."'";
$qt=mysqli_query($con,$t)or die(mysqli_error($con));
$ti="update user set credit='".$n."' where user_id='".$tid."'";
$qti=mysqli_query($con,$ti)or die(mysqli_error($con));
header("location:dis.php?f=".$fid."&t=".$tid."" );
?>