



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
 <script>
 function getCookie(name){
   var nameOfCookie=name+"=";
   var x=0;

   while(x<=document.cookie.length)
   {
     var y=(x+nameOfCookie.length);
     if(document.cookie.substring(x,y)==nameOfCookie)
     {
       if((endOfCookie=document.cookie.indexOf(";",y))==-1)
       endOfCookie=document.cookie.length;
       return unescape(document.cookie.substring(y,endOfCookie));

     }
     x=document.cookie.indexOf(" ",x)+1;
     if(x==0)
     break;
   }
   return "";
  }

  function setCookie(name,value,expiredays)
  {
    var todayDate=new Date();
    todayDate.setDate(todayDate.getDate()+expiredays);
    document.cookie=name+"="+escape(value)+"; path=/; expires="+todayDate.toGMTString()+";";
  }

  if(getCookie("Notice")!="done")
  {
    noticeWindow=window.open('popup.html','notice',"left=0,top=0,width=550,height=450");
    noticeWindow.openr=self;
  }

 </script>

</head>
<body>
<?php include "wrapper.php"  //초기 화면 구성?>
  <div style="width:80%;height:80em; text-align:center;margin:40px auto">
    <div id="imagebox"><image src="/image/book.jpg"/></div>
    <div style="margin:40px auto; width:400px;text-align:left;padding:5px">
      <font style="color:blue">&nbsp&nbsp&nbsp"책은 마음의 양식이다" </font>
      라는 말이 있습니다. 각박하고 경쟁이 치열한 사회속에서 독서를 통해 잠시 쉬어가며 힐링 할 수 있으셨으면 좋겠습니다.
    </div>
    <div id="imagebox"><image src="/image/share.jpg"/></div>
    <div style="margin:40px auto; width:400px;text-align:left;padding:5px">
      &nbsp&nbsp&nbsp자신의 헌 책이나 다 읽은 책은 자유롭고 저렴하게 사고 팔고 나아가서 서로의 생각을 공유하고 나눔으로써 더욱
      <font style="color:red">마음이 풍요롭고 따뜻한 사회</font>가 되길 기원합니다.
    </div>
    <div id="imagebox"><image src="/image/unicef.jpg"/></div>
    <div style="margin:40px auto;  width:400px;text-align:left;padding:5px">
      <font style="color:green">
      &nbsp&nbsp&nbsp판매금의 10%는 유니세프로 후원되어 전 세계의 190여개의 빈민국가의 교육, 영양, 예방접종 비용 등으로 후원</font>됩니다.
      매년 590만명의 아이들이 다섯번째 생일을 맞기 전에 목숨을 잃습니다. 18세 이하 빈곤층 어린이들의 비율은 47%가 넘고 그 아이들이 기초교육을
      받지 못할 가능성은 일반 아이들에 비해 5배가 넘습니다. 우리의 작은 관심이 아이들의 생명을 살리고 교육을 도울 수 있습니다.
    </div>
  </div>


</div><!-- include 문서의 div 닫기-->
</body>
