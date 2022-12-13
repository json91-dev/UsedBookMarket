<?php

include "../db_info.php";
session_start();
//파일처리
if($_FILES['myfile']['name']!=null){ //선택한 이미지가 존재할 때 처리
  $target_dir="/var/www/html/booksell/upload/";
  $mydir="/var/www/html/booksell/upload/".$_SESSION['nickname'];

  if(!is_dir($mydir)) {mkdir($mydir, 0777); chmod($mydir, 0777);}

  $target_file=$mydir.'/'.basename($_FILES["myfile"]["name"]);
  $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
  $imagepath=$target_file;


  if(file_exists($target_file)){
    echo "<script>window.alert('파일이 이미 존재합니다');history.back()</script>";
  }

  if($_FILES["myfile"]["size"]>1048576*10){//5메가 이상
    echo "<script>window.alert('10메가이상 등록 불가');history.back()</script>";
  }

  if($imagefiletype!="jpg"&&$imagefiletype!="png"&&$imagefiletype!="jpeg"&&$imagefiletype!="gif")
  {
    echo "<script>window.alert('사진파일만 등록가능');history.back()</script>";
  }

  if(move_uploaded_file($_FILES['myfile']['tmp_name'],$target_file))
  {
    echo("파일 업로드 완료<br>");
  }else{
    echo("업로드 실패<br>");
  }
}else{

  $imagepath=null;

}











$nickname=$_SESSION['nickname'];
$bookname=$_POST['bookname'];
$author=$_POST['author'];
$publish=$_POST['publish'];
$price=$_POST['price'];
$content=$_POST['content'];
$category=$_POST['category'];

$date=date('Y-m-d H:i:s');

$sql="insert into BookList values (null,'".$nickname."','".$bookname."','".$author."',
'".$publish."',".$price.",'".$content."','".$category."','".$imagepath."','".$date."',default)";

$result=mysqli_query($conn,$sql);


if($result!=false)
{

  echo "<font style='color:blue'>중고책이 등록되었습니다.<br>
  3초뒤에 목록으로 이동합니다.</font>";
  echo "<script>setTimeout(function(){location.replace('./booksells.php')},3000)</script>";

}
else {
  echo mysqli_error($conn);
  echo "<font style='color:blue'>중고책 등록실패<br></font>";
  echo "<script>setTimeout(function(){history.back()},3000)</script>";


}


?>
