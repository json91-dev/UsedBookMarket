<?php
include "../db_info.php";
$no=$_POST['no'];

$sql="delete from basket where no=".$no;
mysqli_query($conn,$sql);
?>
