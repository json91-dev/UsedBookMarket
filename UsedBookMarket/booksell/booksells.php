<?php
  //include "db_info.php";
  //include "/var/www/html/include/login.php";

  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }else{
    $page=1;
  }
  $onePage=5;

  if(isset($_GET['sorting']))
  {
    $sorting=$_GET['sorting'];//date like search_title search_content search_tc
  }
  else {
    $sorting="date";
  }

  if(isset($_GET['category']))
  {
    $category=$_GET['category'];
    if($category==""||$category==" ")
    {
      $category=null;
    }
  } else{$category=null;}


  if(isset($_GET['value']))
  {
    $value=$_GET['value'];
  }else{$value="";}



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
  td{border:1px solid gray;padding:30px}
  .listitem a{text-decoration: none;color:black}
  .BookItemWrapper{margin:0 0 0 15em;height:70em;padding:20px;}
  .BookItemWrapper .BookItem{border-bottom:1px solid gray;height:15em;width:44em;margin:0 auto;padding:5px;}
  .line{text-align:center;margin:0 0 0 15em;border-top:3px solid rgb(234,234,234);width:45em}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<?php include "../wrapper.php"; //초기 화면 구성
      include "../db_info.php";
?>

<div style="text-align:center;margin:40px auto;border-top:3px solid rgb(234,234,234);width:62em;height:88em;">
  <br>
  <aside class="listitem"style="width:13em;height:86em;float:left;background-color:#F6F6F6;border-right:1px solid gray;text-align:center;border-radius:8px">
    <br>
    <font style="font-size:1.2em;font-weight:bold">Book Category </font>
    <br><br>
    <a href="./booksells.php?page=1"><li>전체</li></a>
    <br>
    <a href="./booksells.php?page=1&category=소설"><li>소설</li></a>
    <br>
    <a href="./booksells.php?page=1&category=역사"><li>역사</li></a>
    <br>
    <a href="./booksells.php?page=1&category=자기계발"><li>자기계발</li></a>
    <br>
    <a href="./booksells.php?page=1&category=IT서적"><li>IT서적</li></a>
  </aside>
  <section>
    <div style="margin:5px 0 0 15em;width:45em;text-align:left;">

      정렬 :
      <select>
        <option>제목</option>
        <option>내용</option>
        <option>작성자</option>
        <option>제목+내용</option>
      </select>

      <button style="margin-left:32.5em" onclick="enroll()">상품등록</button>
      <script>
        function enroll()
        {
          var x= "<?php echo isset($_SESSION['nickname']);?>";
          if(x=="1")
          {
            location.assign('enroll.php');
          }
          else{
            alert('중고책 등록을 하기 위해서 로그인이 필요합니다');
          }
        }
      </script>
    </div>
    <br>
    <div class="line"></div>
    <div class="BookItemWrapper">
      <!-- 아이템 반복 -->
      <?php

        $limitstart=($onePage*$page)-$onePage;
        $sqlLimit='limit '.$limitstart.','.$onePage;


        if($category!=null)
        {
          $categoryWhere="where category='".$category."'";
          $categoryAnd="and category='".$category."'";
        }else{
          $categoryWhere="";
          $categoryAnd="";
        }

        if($sorting=="date")
        {
          $sql="select * from BookList ".$categoryWhere." order by no desc ".$sqlLimit;
        }
        else if($sorting=="hit")
        {
          $sql="select * from BookList ".$categoryWhere." order by hit desc ".$sqlLimit;
        }
        else if($sorting=="search_bookname")
        {
          $sql="select * from BookList  where bookname like '%".$value."%' ".$categoryAnd." order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_author")
        {
          $sql="select * from BookList where author='".$value."'  ".$categoryAnd." order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_publish")
        {
          $sql="select * from BookList where publish='".$value."' ".$categoryAnd." order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_nickname")
        {
          $sql="select * from BookList where nickname='".$value."' ".$categoryAnd." order by no desc ".$sqlLimit;
        }

        else{}

        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
          {

       ?>

      <div class="BookItem">
        <?php
            $currentDate=new DateTime();
            $currentDate->setTime(0,0);

            $bookDate=new DateTime($row['date']);
            $interval=Date_diff($currentDate,$bookDate);

            if($interval->days<=0)
            {
        ?>
        <div style="width:80px;height:18px;float:left"><image style="width:50px;height:17px;float:left" src="/image/new.jpg"/></div>
        <?php }?>
        <br>
        <a href="./bookview.php?no=<?php echo $row['no']?>"><image src="<?php echo substr($row['imagepath'],13)?>" style="image-orientation:from-image;float:left;width:130px;height:170px"></image></a>
        <button onclick="basket(<?php echo $row['no'] ?>)" style="float:right;margin-top:3.5em;width:95px">카트담기</button>
        <div style="width:24em;height:10em;margin-left:12em;text-align:left;line-height:2.3em;">
        등록자 : <?php echo $row['nickname']?> | 등록일 : <?php echo $row['date'] ?> | 조회수 : <?php echo $row['hit'] ?><br>
        제목 : <?php echo $row['bookname'] ?> | 저자 : <?php echo $row['author'] ?> | <br>
        출판사 : <?php echo $row['publish'] ?> | 가격 : <?php echo $row['price'] ?> | <?php echo $row['category'] ?><br>
        <textarea readonly style="width:23em;"><?php echo $row['content']?></textarea>
        </div>
      </div>



  <?php
        }
      //페이징 시작

      if($sorting=="date")
      {
        $sql="select count(*) as cnt from BookList ".$categoryWhere." order by no desc ";
      }
      else if($sorting=="hit")
      {
        $sql="select count(*) as cnt from BookList ".$categoryWhere." order by hit desc ";
      }
      else if($sorting=="search_bookname")
      {
        $sql="select count(*) as cnt from BookList  where bookname like '%".$value."%' ".$categoryAnd." order by no desc ";
      }
      else if($sorting=="search_author")
      {
        $sql="select count(*) as cnt from BookList where author='".$value."'  ".$categoryAnd." order by no desc";
      }
      else if($sorting=="search_publish")
      {
        $sql="select count(*) as cnt from BookList where publish='".$value."' ".$categoryAnd." order by no desc";
      }
      else if($sorting=="search_nickname")
      {
        $sql="select count(*) as cnt from BookList where nickname='".$value."' ".$categoryAnd." order by no desc";
      }
      else{}




    //전체 개시글수 가져오기
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $allPost=$row['cnt'];


    $allPage=ceil($allPost/$onePage); //전체 페이지의 수
    $oneSection=4; //한번에 보여줄 총 페이지 개수
    $currentSection=ceil($page/$oneSection); //몇번째 섹션인지?
    $allSection=ceil($allPage/$oneSection);
    $firstPage=($currentSection*$oneSection)-($oneSection-1);

    if($currentSection==$allSection){
      $lastPage=$allPage;
    }else{
      $lastPage=$currentSection*$oneSection;
    }
    $prevPage=($currentSection-1)*$oneSection;
    $nextPage=($currentSection+1)*$oneSection-($oneSection-1);

    $paging="";

    if($page!=1){
      $paging.="<a class='pnumber' href='./booksells.php?page=1&sorting=".$sorting."&value=".$value."&category=".$category."'>처음</a>";
    }
    if($currentSection!=1){
      $paging.="<a class='pnumber' href='./booksells.php?page=".$prevPage."&sorting=".$sorting."&value=".$value."&category=".$category."'>이전</a>";
    }
    for($i=$firstPage;$i<=$lastPage;$i++){
      if($i==$page){
        $paging.="<font class='pnumber' class='pnumber'>".$i."</font>";
      }else{
        $paging.="<a class='pnumber' href='./booksells.php?page=".$i."&sorting=".$sorting."&value=".$value."&category=".$category."'>".$i."</a>";
      }
    }
    if($currentSection!=$allSection){
      $paging.="<a class='pnumber'href='./booksells.php?page=".$nextPage."&sorting=".$sorting."&value=".$value."&category=".$category."'>다음</a>";
    }


    ?>

      <div id='paging' style="text-align:center;padding-left:40px;padding-top:5px">
        <br>
        <?php
          if($allPost!=0)
            echo $paging;
        ?>
      </div>

      <div style="margin:5px auto;width:30em;">
        <select id="opt">
          <option>책제목</option>
          <option>저자</option>
          <option>출판사</option>
          <option>등록자</option>
        </select>
        <input id="val" type="text" style="margin-left:10px;"/>&nbsp&nbsp&nbsp
        <button id="searchbutton">검색</button>
      </div>

    </div>
  </section>
</div>

<?php
  if(isset($_SESSION['nickname']))
  {
    $nickname=$_SESSION['nickname'];
  }else{$nickname="";}

?>

<script>
$(document).ready(function(){
  $("#searchbutton").click(function(){
    if($("#opt option:selected").val()=="책제목")
    {
      var value=$("#val").val();
      location.replace("booksells.php?page=1&sorting=search_bookname&value="+value);
    }
    else if($("#opt option:selected").val()=="저자")
    {
      var value=$("#val").val();
      location.replace("booksells.php?page=1&sorting=search_author&value="+value);
    }
    else if($("#opt option:selected").val()=="출판사")
    {
      var value=$("#val").val();
      location.replace("booksells.php?page=1&sorting=search_publish&value="+value);
    }
    else if($("#opt option:selected").val()=="등록자")
    {
      var value=$("#val").val();
      location.replace("booksells.php?page=1&sorting=search_nickname&value="+value);
    }
  });
});

  function basket(nno){

      $.post('basket_update.php',
      {
        no : nno,
        nickname : "<?php echo $nickname?>"
      },
      function(data,status)
      {

      });

      if(confirm("상품이 장바구니에 담겼습니다.\n     바로 확인하시겠습니까?")==true)
      {
        location.replace('/basket/basket.php');
      }
  }
</script>

</body>
