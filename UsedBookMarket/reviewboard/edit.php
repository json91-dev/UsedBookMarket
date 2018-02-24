<?php
  include "../db_info.php";
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
  td{height:60px;border:1px solid gray;padding:10px}

  #Wrapper{margin:10px auto;width:50em;height:40em;padding:30px;}
  #Wrapper table{border:1px solid gray;margin:10px 0 0 60px;width:46em;background-color:white;}

  #Checkfile{border:1px solid gray;display:block;float:right;margin:0px 15px 0 0; width:250px;height:50px;background-color:rgb(212,244,250);}

 </style>

</head>
<body>
  <br>
<?php include "../wrapper.php"  //초기 화면 구성?>
  <div style="margin:30px auto;text-align:center">
  <font style="font-size:1.4em">리뷰게시판 글수정</font></div>
  <div id="Wrapper">

    <?php
      $sql="select * from reviewboard where no=".$_GET['no'];
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);

    ?>

    <table>
      <form name="myform" action="edit_process.php?no=<?php echo $_GET['no']?>" method="post" enctype="multipart/form-data">
      <tr>
        <td style="text-align:right;width:8em">닉네임 : </td>
        <td style="text-align:left"><?php echo $row['nickname']?></td>
      </tr>
        <td style="text-align:right">제목 : </td>
        <td style="text-align:left"><input name="title" type="text" size="50" value="<?php echo $row['title']?>"/></td>
      <tr>
        <td style="text-align:right">내용 : </td>
        <td style="text-align:left"><textarea name="content" rows="8" cols="29"><?php echo $row['content']?></textarea></td>
      </tr>

      <tr>
        <td style="text-align:right">이미지업로드 : </td>
        <td style="text-align:left">
          <input type="file" name="myfile" id="myfile" onchange="checking()"/>
          <span id="Checkfile" style="display:block;overflow:auto">이전 파일 경로 : <?php echo $row['imagepath']?></span>
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
          else if(x.files[0].size>1048576*3){
            var y=document.getElementById('Checkfile');
            y.innerHTML="<font style='color:blue'>3메가 이상 등록 불가능<br>(png,jpef,jpg,gif)</font>";
          }
        }
      </script>



    <div style="text-align:center;margin:30px auto">
      <button type="button" onclick="document.myform.submit()">수정</button>
      <button>목록</button>
    </div>


  </div>


</div>
