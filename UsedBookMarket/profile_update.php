<?php
  include "db_info.php";
  $nickname=$_POST['nickname'];
  $address=$_POST['address'];
  $phonenumber=$_POST['phonenumber'];


  $sql="update login set address='".$address."',phonenumber='".$phonenumber."' where nickname='".$nickname."'";
  $result=mysqli_query($conn,$sql);



?>
