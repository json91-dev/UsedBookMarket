<?php
  include "../db_info.php";
  $sql="update QAboard set good=good+1 where no=".$_POST['no'];
  $result=mysqli_query($conn,$sql);

?>
