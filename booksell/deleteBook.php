<?php
  include "../db_info.php";

  //파일삭제





  $sql="select * from BookList where no=".$_POST['no'];
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  if(!empty($row['imagepath']))
  {
    unlink($row['imagepath']);
    echo "파일 삭제 완료<br>";
  }


  $sql="delete from BookList where no=".$_POST['no'];
  $result=mysqli_query($conn,$sql);

  ?>
