



<?php
  include "db_info.php";
  $id=$_POST['id'];
  $password=$_POST['password'];
  $sql="select * from login where id='".$id."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  if($row!=null)
  {
    if($row['password']!=$password)
    {
      echo "<script>alert('비밀번호가 일치하지 않습니다');history.back()</script>";
    }
    else {
      session_start();
      $_SESSION['nickname']=$row['nickname'];
      echo '<script>alert("닉네임 : \''.$_SESSION['nickname'].'\' 로 \n로그인되었습니다.");location.replace("intro.php")</script>';
    }
  }
  else{
    echo "<script>alert('아이디가 존재하지 않습니다');history.back()</script>";
  }



?>
