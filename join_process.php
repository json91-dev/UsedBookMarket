
<?php
  include "db_info.php";

  $query_ok=true;
  $nickname=$_POST['nickname'];
  $id=$_POST['id'];
  $password=$_POST['password'];
  $password2=$_POST['password2'];
  if(isset($_POST['phone']))  $phone=$_POST['phone']; else $phone="";
  if(isset($_POST['address'])) $address=$_POST['addressoption']." ".$_POST['address']; else $address="";



  $sql="select * from login where nickname='".$nickname."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  if($row['nickname']!=null)
  {
    echo "<script>alert('닉네임 중복');history.back();</script>";
    $query_ok=false;
  }


  $sql="select * from login where nickname='".$id."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  if($row!=null)
  {
    echo "<script>alert('아이디 중복');history.back();</script>";
    $query_ok=false;
  }

  if(strlen($id)<8)
  {
    echo "<script>alert('아이디 글자수 8자이상');history.back();</script>";
    $query_ok=false;
  }

  if($password!=$password2)
  {
    echo "<script>alert('비밀번호 일치하지 않음');history.back();</script>";
    $query_ok=false;
  }

  if(strlen($password)<8)
  {
    echo "<script>alert('비밀번호 글자수 8자이상');history.back();</script>";
    $query_ok=false;
  }

  if(!strpos($password,"!")&&!strpos($password,"@")&&!strpos($password,"#")&&
  !strpos($password,"$")&&!strpos($password,"%")&&!strpos($password,"^")&&!strpos($password,"&")&&!strpos($password,"*"))
  {
    echo "<script>alert('비밀번호에 특수문자 포함x');history.back();</script>";
    $query_ok=false;
  }






  if($query_ok==true){
  $sql="insert into login values ('".$nickname."' ,'".$id."' ,'".$password."',
  '".$phone."','".$address."')";
  $result=mysqli_query($conn,$sql);

  if($result==true){
    echo "<script>alert('회원가입 성공');self.close();</script>";
  }
  else {
    echo "<script>alert('회원가입 실패');history.back();</script>";
  }
  }

?>
