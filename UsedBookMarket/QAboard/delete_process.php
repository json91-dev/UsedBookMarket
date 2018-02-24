<?php
  include "../db_info.php";




  $sql="delete from QAboard where no=".$_POST['no'];
  $result=mysqli_query($conn,$sql);


  if($result==true){
    echo "<font style='color:blue'>게시판 글이 삭제되었습니다.<br>
    3초뒤에 목록으로 이동합니다.</font>";


    echo "<script>setTimeout(function(){location.replace('./list.php?page=1&sorting=date')},3000)</script>";

  }else {

    echo "<script>alert('잘못된 접근입니다');history.back()</script>";
  }

?>
