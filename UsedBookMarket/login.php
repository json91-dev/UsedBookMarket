



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
<?php include "wrapper.php"  //초기 화면 구성?>
  <br>
  <br>
  <div style="text-align:center;">
      <font style="font-size:1.3em;margin-left:30px">중고책나라 로그인</font>
  </div>
  <form action="login_process.php" method="post">

  <div id="loginbox">
    <div style="float:right;">
      <input type="submit" value="로그인" class="loginbutton"/>
    </div>
    Id <input type="text" name="id"> <br>
    Password <input type="password" name="password"/><br>
    <a href="agreement.php" onclick="window.open(this.href,'_blank','width=700,height=510,left=330');return false">
      <font style="color:blue">회원가입</a>
  </div>

  </form>

  </div>


</div><!-- include 문서의 div 닫기-->
</body>
