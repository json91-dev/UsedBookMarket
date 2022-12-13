<?php
  $conn=mysqli_connect("localhost","root","1234","teamnova2");
  if(mysqli_connect_error())
  {
    echo "Failed to connect" . mysqli_connect_error();
  }

  mysqli_query($conn,"set names utf8");

 ?>
