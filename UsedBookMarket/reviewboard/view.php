

<?php
  include "../db_info.php";


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
  .Content{width:60em;height:4em;border:1px solid gray;border-radius:6px;margin:0 auto;padding:5px;text-align:left;background-color:#EAEAEA}
 </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../cookie.js"></script>

</head>
<body>
<?php
  include "../wrapper.php";

  $no=$_GET['no'];

  $sql="select * from reviewboard where no=".$_GET['no'];
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  if(isset($_SESSION['nickname']))
  {
    $nickname=$_SESSION['nickname'];
  }else{
    $nickname="";
  }

  if($nickname!=$row['nickname'])
  {
    $hitsql="update reviewboard set hit=hit+1 where no=".$_GET['no'];
    $result=mysqli_query($conn,$hitsql);
  }





?>
<div style="text-align:center;margin:40px auto;border-top:3px solid rgb(234,234,234);width:60em">
</div>

<div class="Content">
<font style="font-size:2.4em;margin-left:25px"><?php echo $row['title']?></font>
</div>
<br>
<div class="Content" style="height:4em">
  <font style="font-size:1.3em;margin-left:25px">작성자 : <?php echo $row['nickname']?><br></font>
  <font style="font-size:1.3em;margin-left:25px">작성일 : <?php echo $row['date']?></font>
</div>
<div style="text-align:center;margin:20px auto;border-top:3px solid rgb(234,234,234);width:60em">
</div>
<div class="Content" style="background-color:#EAEAEA;height:25em;overflow:auto">
  <br>
  <font style="margin:20px;font-size:1.1em"><?php echo $row['content']?></font>
  <br>
  <br>
  <?php if(!empty($row['imagepath']))
  { ?>
  <image style="width:230px;height:330px;margin:20px;image-orientation:from-image;" src="<?php echo substr($row['imagepath'],13)?>"/>
  <?php } ?>

</div>
<br>
<?php if($row['nickname']==$nickname){?>
<div class="Content" style="background-color:white;height:2.3em;text-align:right">
  <button onclick="alert('자신의 글은 `좋아요`를 누를 수 없습니다.')" class='like'>좋아요♠</button>
  <button onclick="location.assign('./list.php?page=1&sorting=date')">목록</button>
  <button onclick="location.assign('./edit.php?no=<?php echo $_GET['no']?>')">수정</button>
  <form id="del" action="delete_process.php" method="post" style="margin:0 0 1px 3px;float:right">
    <input type="hidden" value=<?php echo $_GET['no']?> name="no" id="del">
  </form>
  <button onclick="delete1()">삭제</button>

</div>
<?php }else{ ?>
<div class="Content" style="background-color:white;height:2.3em;text-align:right">
  <button class='like' id="likebutton">좋아요♠</button>
  <button onclick="location.assign('./list.php?page=1&sorting=date')">목록</button>
  <button onclick="alert('작성자만 수정할 수 있습니다.')">수정</button>
  <button onclick="alert('작성자만 삭제할 수 있습니다.')">삭제</button>
</div>

<?php } ?>




<script>
setCookie("","",1);

$(document).ready(function(){
  $("#likebutton").click(function(){
    if(getCookie("r"+"<?php echo $nickname.$no ?>"+"_like")!="ok")
    {
      $.post("like_process.php",
      {
        no : "<?php echo $no?>"
      },
      function()
      {
      }
      );
      alert('이 게시물을 좋아합니다');
      setCookie("r"+"<?php echo $nickname.$no ?>"+"_like","ok",1);
    }
    else {
      alert('이미 좋아요를 누르셨습니다');
    }
  });
});



function delete1(){
  if(confirm("정말 삭제하시겠습니까?")==true)
  {
      document.getElementById('del').submit();
  }
}
</script>


</body>
</html>
