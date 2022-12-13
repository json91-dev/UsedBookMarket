

<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>
  td{height:60px;border:1px solid gray;padding:10px}

  #Wrapper{margin:10px auto;width:50em;height:40em;padding:30px;}
  #Wrapper table{border:1px solid gray;margin:10px 0 0 60px;width:46em;background-color:white;}

  #Checkfile{border:1px solid gray;display:block;float:right;margin:0px 15px 0 0;
  width:250px;height:50px;background-color:rgb(212,244,250);}

  .list{text-align:center;margin:30px auto;padding-left: 40px}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="../cookie.js"></script>
 <script>
 $(document).ready(function(){
   setInterval(
    function autoStore(){

      var a=new Date();

      $("#storetime").text(a.getFullYear()+"년-"+(a.getMonth()+1)+"월-"+a.getDate()
      +"일 "+a.getHours()+":"+a.getMinutes()+":"+a.getSeconds()+" 임시저장됨");
      setCookie("r"+$("#nic").text()+"title",$("#title").val()+"",1);
      setCookie("r"+$("#nic").text()+"content",$("#content").val()+"",1);


    },15000);
 });
 </script>

</head>
<body>
  <br>
<?php

include "../wrapper.php";
if(!isset($_SESSION['nickname'])){
  echo "<script>alert('글쓰기는 로그인한 회원만 가능합니다.');history.back();</script>";
}
else{$nickname=$_SESSION['nickname'];}
?>
  <div style="margin:30px auto;text-align:center;padding-left:40px">
  <font style="font-size:1.4em">리뷰게시판 글쓰기</font></div>
  <div id="Wrapper">
    <div style="width:45.6em;margin:10px 0 0 60px;text-align:right">
      <a href="#" onclick="return false" id="tempload">임시저장 불러오기</a>
      <font  id="storetime" style="float:left"></font>
    </div>

    <script>
    $(document).ready(function(){
      $("#tempload").click(function(){
        alert("임시저장값이 복원되었습니다.");
        var title=getCookie("r"+$("#nic").text()+"title");
        var content=getCookie("r"+$("#nic").text()+"content");

        $('#title').val(title);
        $('#content').val(content);
      });
    });
    </script>

    <table>
      <form name="myform" action="write_process.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="nickname" value="<?php echo $nickname ?>" />
      <tr>
        <td style="text-align:right;width:8em">닉네임 : </td>
        <td style="text-align:left"><p id="nic"><?php echo $nickname?></p></td>
      </tr>
        <td style="text-align:right">제목 : </td>
        <td style="text-align:left"><input name="title" type="text" size="50" id="title"/></td>
      <tr>
        <td style="text-align:right">내용 : </td>
        <td style="text-align:left"><textarea name="content" rows="8" cols="29" id="content"></textarea></td>
      </tr>

      <tr>
        <td style="text-align:right">이미지업로드 : </td>
        <td style="text-align:left">
          <input type="file" name="myfile" id="myfile" onchange="checking()"/>
          <span id="Checkfile" style=""></span>
          <br>
        </td>
      </tr>
      </form>
    </table>
      <!--파일 체크 메서드 -->
      <script>
        function checking()
        {
          var x=document.getElementById('myfile');
          var name=x.files[0].name;
          if(name.indexOf('png')==-1 && name.indexOf('jpeg')==-1 && name.indexOf('jpg')==-1 && name.indexOf('gif')==-1)
          {
            var y=document.getElementById('Checkfile');
            y.innerHTML="<font style='color:blue'>이미지 파일만 등록 가능합니다.<br>(png,jpef,jpg,gif)</font>";
          }
          else if(x.files[0].size>1048576*10){
            var y=document.getElementById('Checkfile');
            y.innerHTML="<font style='color:blue'>10메가 이상 등록 불가능<br>(png,jpef,jpg,gif)</font>";
          }
        }
      </script>



      <div class="list">
        <button onclick="mysubmit()">작성</button>
        <button>목록</button>
        <button class="mybutton" id=temp>임시저장</button>
      </div>

      <script>
      $(document).ready(function(){
        $("#temp").click(function(){

           setCookie("r"+$("#nic").text()+"title",$("#title").val()+"",1);
           setCookie("r"+$("#nic").text()+"content",$("#content").val()+"",1);

          alert('임시저장 완료');

        });
      });
      </script>

    <script>
      function mysubmit() {
        var x=document.getElementById('title');
        var y=document.getElementById('content');
        if(x.value==""){
          alert("제목을 입력해주세요");
        }
        else if(y.value=="")
        {
          alert("내용을 입력해주세요");
        }
        else{
          document.myform.submit();
        }

      }
    </script>


  </div>


</div>
