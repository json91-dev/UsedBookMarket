



<?php
  //include "db_info.php";
  //include "/var/www/html/include/login.php";


//책은 가장 조용하고 변함없는 벗이다. 책은 가장 쉽게 다가갈 수 있고 가장
//현명한 상담자이자 가장 인내심 있는 교사이다. -찰스 W.엘리엇
?>

<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>

 </style>

</head>
<body>
  <br>
<?php include "wrapper.php"  //초기 화면 구성?>

<br>

<?php
 //상품 정보를 가져오는 변수 설정
   $no=$_GET['no'];
   $name[$no]=$_POST['name'];
   $author[$no]=$_POST['author'];
   $publish[$no]=$_POST['publish'];
   $cost[$no]=$_POST['cost'];
   $path[$no]=$_POST['path'];
 ?>
<article id="BookArticle" style="height:540px; width:800px margin:60px 100px;">

  <div id="BookArticle_left" style="margin:50px 30px 50px 100px;width:310px; height:440px;float:left; padding:10px">
    <image src=<?php echo $path[$no]?>></image>
  </div>
  <div id="BookArticle_right" style="border:1px solid gray;margin:50px 90px 50px 30px;width:410px; height:440px;float:right;padding:10px">
    <div style="margin-top:30px;margin-left:20px; width:80% ; height:10%;text-align:left">
      <table style="width:90%;height:10%">
        <tr>
          <td style="width:100px;text-align:right">상품코드 :&nbsp&nbsp</td>
          <td><?php echo $no?></td>
        </tr>
      </table>
    </div>
    <br>
    <div style="margin-left:20px; width:80% ; height:10%;text-align:left">
      <table style="width:90%;height:10%">
        <tr>
          <td style="width:100px;text-align:right">책제목 :&nbsp&nbsp</td>
          <td><?php echo $name[$no]?></td>
        </tr>
      </table>
    </div>
    <div style="margin-top:30px;margin-left:20px; width:80% ; height:10%;text-align:left">
      <table style="width:90%;height:10%">
        <tr>
          <td style="width:100px;text-align:right">저자 :&nbsp&nbsp</td>
          <td><?php echo $author[$no]?></td>
        </tr>
      </table>
    </div>
    <div style="margin-top:30px;margin-left:20px; width:80% ; height:10%;text-align:left">
      <table style="width:90%;height:10%">
        <tr>
          <td style="width:100px;text-align:right">출판사 :&nbsp&nbsp</td>
          <td><?php echo $publish[$no]?></td>
        </tr>
      </table>

    </div>
    <div style="margin-top:30px;margin-left:20px; width:80% ; height:10%;text-align:left">
      <table style="width:90%;height:10%">
        <tr>
          <td style="width:100px;text-align:right">가격 :&nbsp&nbsp</td>
          <td><?php echo $cost[$no]?></td>
        </tr>
      </table>

    </div>
</article>




</div><!-- include 문서의 div 닫기-->
</body>
