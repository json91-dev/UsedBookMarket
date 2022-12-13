



<?php
  include "db_info.php";
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
  .redcheck{font-size:0.8em;margin-left:10px;color:red}
  .bluecheck{style="font-size:0.8em;margin-left:10px;color:blue}
 </style>

</head>
<body>
  <div id="joinWrapper">
    <div style="margin:5px;text-align:center">
      <font style="font-size:2em">중고책나라 회원가입</font>
    </div>
    <br>
    <div class="joinContent">
      <form method="post" action="join_process.php">

      <p>*닉네임:<br>
        <input type="text" name="nickname" placeholder="닉네임 입력">
        <button onclick="submitfunc(0);">중복확인</button>
      <p>*아이디:&nbsp&nbsp&nbsp <br><input type="text" name="id" placeholder="아이디 입력(8자이상)">
        <button onclick="submitfunc(1);">중복확인</button>
      <p>*패스워드:<br>
        <input type="password" name="password" placeholder="8자이상,특수문자 사용"><br>

      <p>*패스워드 확인:<br>
        <input type="password" name="password2" placeholder="패스워드 확인"><br>
      <font style="color:blue">*는 필수 입력 정보입니다</font><br>

      <p>휴대폰번호:<br>
        <input type="tel" name="phone"placeholder="-없이 입력"><br>

      <p>주소:&nbsp&nbsp&nbsp&nbsp&nbsp
        <select name="addressoption">
          <option value="서울특별시">서울특별시</option>
          <option value="인천광역시">인천광역시</option>
        </select><br>
      <input type="text" name="address" placeholder="나머지 주소"><br>

      <p>성별: <input type="radio" name="gender" value="male" checked> 남자
              <input type="radio" name="gender" value="female"> 여자
      <br>
      <br>
      <div style="text-align:center">
        <input class="button"type="button"  value="취소" onclick="window.history.back();"/>&nbsp&nbsp&nbsp&nbsp&nbsp
        <input class="button"type="button"  value="입력" onclick="submitfunc(2);"/>
      </div>
      </form>

      <script>
        function submitfunc(index){

          if(index==0){
            document.forms[0].action="nickname_check.php"
          }

          if(index==1){
            document.forms[0].action="id_check.php";
          }

          if(index==2)
          {
            document.forms[0].action="join_process.php";
          }
          document.forms[0].submit();
        }
      </script>
      </span>
    </div>
  </div>


</div><!-- include 문서의 div 닫기-->
</body>
