<?php
  include "../db_info.php";
  $nickname=$_POST['nickname'];
  $no=$_POST['no'];

  $sql="insert into basket value (null,'".$nickname."','".$no."')";
  mysqli_query($conn,$sql);

?>
