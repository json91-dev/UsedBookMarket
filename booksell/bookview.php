
<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>
  table{line-height: 2.5em;}
  .tdleft{text-align:right;width:100px;padding-right:7px}
  td{}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<?php include "../wrapper.php"; //초기 화면 구성
      include "../db_info.php";


      if(isset($_GET['no']))
      {
        $no=$_GET['no'];
      }




      //조회수
      if(isset($_SESSION['nickname']))
      {
        $nickname=$_SESSION['nickname'];
      }else{
        $nickname="";
      }

      $sql="select * from BookList where no='".$no."'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);

      if($nickname!=$row['nickname'])
      {
        $hitsql="update BookList set hit=hit+1 where no=".$_GET['no'];
        mysqli_query($conn,$hitsql);
      }

      $sql="select * from BookList where no='".$no."'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);










?>

<div style="width:45em;height:26em;margin:1em auto;padding:3em;line-height:2.3em;text-align:right">
  <div>
    <font style="padding-right:12px">조회수 : <?php echo $row['hit']?> </font>
    <font style="float:left;font-size:1.3em">중고책 등록정보</font>
  </div>
  <div style="width:44em;height:25em;border-top:1px solid #EAEAEA;padding:1em;border-bottom:1px solid #EAEAEA">
    <div style="width:20em;height:25em;border-right:1px solid gray ;float:left;text-align:center">
      <image width="200px" height="300px" style="image-orientation:from-image;" src="<?php echo substr($row['imagepath'],13)?>"></image><br><br>
      카트에 담기 ▶&nbsp&nbsp&nbsp&nbsp  <a id="basket" href="#" onclick="return false;"><image align="middle" style="width:50px;height:50px;"  src="/image/basket.png"/></a>
    </div>
    <div style="width:22em;height:21em;border:1px solid #A5DE9f ;float:right;text-align:center;padding-top:1em;background-color:#EAEAEA;border-radius:10px;margin-top:1em">
      <table>
        <tr>
          <td class="tdleft">책제목 : </td>
          <td width="230px"><?php echo $row['bookname']?></td>

        </tr>
        <tr>
          <td class="tdleft">저자 : </td>
          <td><?php echo $row['author']?></td>
        </tr>
        <tr>
          <td class="tdleft">출판사 : </td>
          <td><?php echo $row['publish']?></td>
        </tr>
        <tr>
          <td class="tdleft">가격 : </td>
          <td><?php echo $row['price']."원"?></td>
        </tr>
        <tr>
          <td class="tdleft">등록자닉네임 : </td>
          <td id='nickname'><?php echo $row['nickname']?></td>
        </tr>
        <tr>
          <td class="tdleft">등록시간 : </td>
          <td><?php echo $row['date']?></td>
        </tr>
        <tr>
          <td class="tdleft">카테고리 : </td>
          <td><?php echo $row['category']?></td>
        </tr>
      </table>
    </div>
</div>
<div style="width:45em;height:23em;border-top:1px solid #EAEAEA;border-bottom:1px solid #EAEAEA;maring 0 auto;text-align:left;">
  <font style="margin-left:13px">설명 :</font>
  <div style="width:42em;height:10em;margin: 0 auto;padding:1.2em;border-radius:10px;background-color:#EAEAEA;border:1px solid #A5DE9f ;">
    <?php echo $row['content']?>
  </div>
  <br>
  <div style="text-align:right;border-top:1px solid #EAEAEA"><br><font color="blue">*등록된 중고책은 등록자만 삭제할 수 있습니다.&nbsp&nbsp&nbsp</font>
    <button id="deleteBook">중고책 등록 삭제</button></div>
</div>

<script>
$(document).ready(function(){
  $("#deleteBook").click(function (){

    var nickname=$("#nickname").text();
    if(nickname=="<?php echo $nickname ?>")
    {
      if(confirm("정말 삭제하시겠습니까?")==true)
      {
          $.post('deleteBook.php',
          {
            no : "<?php echo $no?>"
          },
          function(data,status)
          {
            alert('등록된 중고책 삭제가 완료되었습니다.');
            location.replace('./booksells.php')
          });
      }
    }else{
      alert('등록자만 글을 삭제할 수 있습니다.');
    }

  });
});

$(document).ready(function(){
  $("#basket").click(function (){


      $.post('basket_update.php',
      {
        no : "<?php echo $no?>",
        nickname : "<?php echo $nickname?>"
      },
      function(data,status)
      {});

      if(confirm("상품이 장바구니에 담겼습니다.\n     바로 확인하시겠습니까?")==true)
      {
        location.replace('/basket/basket.php');
      }

  });
});
</script>



</body>
</html>
