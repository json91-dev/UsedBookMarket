



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
  <div id="agreementWrapper"style="">
    <div style="text-align:center">
      <font style="font-size:2em">중고책나라</font>
    </div>
    <br>
    <br>
    중고책나라 이용약관 동의<font style="color:green">(필수)</font><input id="checkbox1" type="checkbox" style="float:right;"/>
    <div class="agreementContent">
      <font style="font-weight:lighter;font-size:15px">
      <font style="font-weight:normal;">제 1조 (목적)<br></font>
       이 약관은 중고책나라가 제공하는 중고책나라 서비스의 이용과 관련하여 회사와 회원과의 권리, 의무 및
      책임사항, 기타 필요한 사항을 규정함을 목적으로 합니다.<br>
      <font style="font-weight:normal;">제 2조 (정의)<br></font>
       이 약관에서 사용하는 용어의 정의는 다음과 같습니다.</br>
       1) 서비스라 함은 단말기와 상관없이 회원이 이용할 수 있는 중고책나라 및 중고책나라 제반 서비스를 의미합니다.<br>
       2) 회원이라 함은 회사의 "서비스"에 접속하여 이 약관에 따라 "회사" 와 이용계약을 체결하고 "회사"가 제공하는 "서비스"
       를 이용하는 고객을 말합니다 .......
      </font>
    </div>
    <br>

    개인정보 수집 및 이용에 대한 안내<font style="color:green">(필수)</font><input id="checkbox2"type="checkbox" style="float:right;"/>
    <div class="agreementContent">
      <font style="font-weight:lighter;font-size:15px">
      정보통신망 규정에 따라 중고책나라에 회원가입을 신청하시는 분께 수집하는 개인정보의 항목, 개인정보와 수집 및 이용목적,
      개인정보의 보유 및 이용기간을 안내 드리오니 자세히 읽은 후 동의하여 주시기 바랍니다.<br>
      <font style="font-weight:normal;">1. 수집하는 개인정보<br></font>
      이용자는 회원가입을 하지 않아도 정보 검색, 등의 대부분의 중고책나라 서비스를 회원과 동일하게 이용할 수 있습니다.
      이용자가 회원제 서비스를 이용하기 위해 회원가입을 할 경우, 중고책나라는 서비스 이용을 위해 필요한 최소한의 개인정보를
      수집합니다.<br>
      <font style="font-weight:normal;">회원가입 시점에 중고책나라가 이용자로부터 수집하는 개인정보는 아래와 같습니다.<br></font>
      - 회원 가입 시에 '아이디, 비밀번호, 이름, 생년월일, 성별, 휴대폰번호'를 필수항목으로 수집합니다. 망약 이용자가 입력하는
      생년월일이 만 14세 미만 아동일 경우에는 법정대리인 정보를 추가로 수집합니다. 그리고 선택학목으로
      이메일 주소를 수집합니다.<br>
      <font style="font-weight:normal;">서비스 이용 과정에서 IP 주소, 쿠키, 방문일시 불량 이용 기록 등의 서비스를 이용기록,
      기기정보가 생성되어 수집 될 수 있습니다. <br></font>
      구체적으로 1)서비스 이용과정에서 이용자에 관한 정보를 정보통신서비스 제공자가 자동화된 방법으로 생성하여 이를 수집하거나
      2) 이용자 기기의 고유한 정보를 원래의 값을 확인하지 못하도록 안전하게 변환한 후에 수집하는 경우를 의미합니다.<br>
      </font>
    </div>
    <br>
    이벤트 등 프로모션 알림 메일 수신<font style="color:gray">(선택)</font><input type="checkbox" style="float:right;"/>
    <br>
    <br>
    <br>
    <div style="text-align:center">
      <button style="width:90px" onclick="window.self.close()">취소</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <button style="width:90px" onclick="checking()">확인</button>
    </div>
    <script type="text/javascript">

      function checking(){
        var checkbox1=document.getElementById('checkbox1').checked;
        var checkbox2=document.getElementById('checkbox2').checked;

        if((checkbox1==true)&&(checkbox2==true))
        {
          location.assign('join.php')
        }
        else {
          window.alert("중고책나라 이용약관과 개인정보 수집 및 이용에 대한 안내에 모두 동의해주세요");
        }
      }

    </script>

</div><!-- include 문서의 div 닫기-->
</body>
