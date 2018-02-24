<?php

  include '../db_info.php';
  //파일처리


  //입력 처리
  $title=$_POST['title'];
  $content=$_POST['content'];
  $nickname=$_POST['nickname'];
  $date=date('y-m-d H:i:s');


  $sql="insert into QAboard values(null,'".$title."','".$content."',
  '".$nickname."','".$date."',default,default)";

  $result=mysqli_query($conn,$sql);



  if($result!=null)
  {
    echo "<font style='color:blue'>게시판 글이 등록되었습니다.<br>
    3초뒤에 목록으로 이동합니다.</font>";

    echo "<script>setTimeout(function(){location.replace('./list.php?page=1&sorting=date')},3000)</script>";

  }







?>
