<?php

  include '../db_info.php';

  session_start();
  //입력 처리
  $title=$_POST['title'];
  $content=$_POST['content'];
  $nickname=$SESSION['nickname'];
  $date=date('y-m-d H:i:s');



  $sql="update QAboard set title='".$title."',content='".$content."',
  nickname='".$nickname."',date='".$date."' where no=".$_GET['no']."";
  $result=mysqli_query($conn,$sql);



  if($result!=null)
  {
    echo "<font style='color:blue'>게시판 글이 수정되었습니다.<br>
    3초뒤에 목록으로 이동합니다.</font>";

    echo "<script>setTimeout(function(){location.replace('./list.php?page=1&sorting=date')},3000)</script>";

  }


?>
