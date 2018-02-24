
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
</head>
<style>
td{padding:10px;width:6em}
.tdleft{text-align:right}
</style>
<body>
  <?php
    include "../wrapper.php";
  ?>

  <div style="width:60em;height:200em;border:1px solid gray;margin:0 auto;padding:5em;text-align:left">

    <div style="float:left">
      <font style="font-size:1.3em">책등록</font>
      <table style="line-height:2.3em;" border="1">
        <form name="MyForm" action="enroll_process.php" method="post" enctype="multipart/form-data">
        <tr>
          <td class="tdleft">닉네임 : </td>
          <td style="width:10em"><?php echo $_SESSION['nickname']?></td>
          <td class="tdleft">등록일 :</td>
          <td style="width:10em"><?php echo Date('Y-m-d')?></td>
        </tr>
        <tr>
          <td class="tdleft">책 제목 : </td>
          <td><input id='bookname'name='bookname' type="text" size="10"/></td>
          <td class="tdleft">저자 : </td>
          <td><input id='author'name='author'type="text" size="10"/></td>
        </tr>
        <tr>
          <td class="tdleft">출판사 : </td>
          <td><input id='publish' name='publish' type="text" size="10"/></td>
          <td class="tdleft">카테고리 : </td>
          <td><select  name="category"><option value="소설">소설</option><option value="역사">역사</option>
                      <option value="자기계발">자기계발</option><option value="IT서적">IT서적</option></select></td>
        </tr>
        <tr>
          <td class="tdleft">가격: </td>
          <td><input id='price' name='price' type="number" size="10"/></td>
          <td class="tdleft"></td>
          <td></td>
        </tr>
        <tr>
          <td class="tdleft">내용 : </td>
          <td colspan="3"><textarea id='content' name='content'></textarea></td>
        </tr>
        <tr>
          <td class="tdleft">대표 이미지: </td>
          <td colspan="3"><input type="file" name="myfile" id="myfile" onchange="checking()"/>
            <span id="Checkfile" style="overflow:auto"></span>
          </td>
        </tr>
        </form>
      </table>

    </div>
    <div style="float:right;width:16.5em;height:20em;padding:10px;padding-left:2em">
      <br><br>
      <image style="width:300px;height:320px" src="../image/WiseSaying1.jpg"/>
    </div>
    <div style="margin-top:28em;"><button style="margin-left:18em;width:100px" onclick="mysubmit()">등록</button></div>

  </div>

  <script> //이미지파일 검사
    function checking()
    {

      var x=document.getElementById('myfile');

      for(var i=0;i<x.files.length;i++)
      {
        var name=x.files[i].name;

        if(name.indexOf('png')==-1 && name.indexOf('jpeg')==-1 && name.indexOf('jpg')==-1 && name.indexOf('gif')==-1)
        {
          var y=document.getElementById('Checkfile');
          y.innerHTML="<font style='color:blue'>이미지 파일만 등록 가능합니다.<br>(png,jpef,jpg,gif)</font>";
          break;
        }
        else if(x.files[i].size>1048576*10){
          var y=document.getElementById('Checkfile');
          y.innerHTML="<font style='color:blue'>10메가 이상 등록 불가능<br>(png,jpef,jpg,gif)</font>";
          break;
        }
        var y=document.getElementById('Checkfile');
        y.innerHTML="";
      }
    }

    function mysubmit() {
      var bookname=document.getElementById('bookname');
      var author=document.getElementById('author');
      var publish=document.getElementById('publish');
      var price=document.getElementById('price');
      var content=document.getElementById('content');
      var myfile=document.getElementById('myfile');


      if(bookname.value==""){
        alert("책제목을 입력해주세요");
      }
      else if(author.value=="")
      {
        alert("저자를 입력해주세요");
      }
      else if(publish.value=="")
      {
        alert("출판사을 입력해주세요");
      }
      else if(price.value=="")
      {
        alert("가격을 입력해주세요");
      }
      else if(content.value=="")
      {
        alert("내용을 입력해주세요");
      }
      else if(myfile.value=="")
      {
        alert('대표이미지를 설정해주세요');
      }
      else{
        document.MyForm.submit();
      }

    }
  </script>






</body>
