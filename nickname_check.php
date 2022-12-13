<?php
  include "./db_info.php";

  $nickname=$_POST['nickname'];

  $sql="select * from login where nickname='".$nickname."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);


  if($row!=NULL)
  {
    echo "<script>alert('닉네임 중복');history.back();</script>";
  }else{
    echo "<script>alert('사용 가능한 닉네임입니다');history.back();</script>";
  }
 ?>
