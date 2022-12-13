<?php
  include "./db_info.php";


  $id=$_POST['id'];

  $sql="select * from login where id='".$id."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  if($row['id']!=null)
  {

  echo "<script>alert('아이디 중복');history.back();</script>";
  }
  else if(strlen($id)<8)
  {
    echo "<script>alert('아이디 글자수 8자 미만 x');history.back();</script>";

  }
  else{
    echo "<script>alert('사용 가능한 아이디입니다');history.back();</script>";
  }
 ?>
