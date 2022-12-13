<?php
  $nickname=$_POST['nickname'];
  $title=$_POST['title'];
  $content=$_POST['content'];
  $board=$_POST['board'];

  setcookie($board.$nickname.'title',$title);
  setcookie($board.$nickname.'content',$content);


 ?>
