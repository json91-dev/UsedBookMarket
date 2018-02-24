


<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
<style>
  .product {width:63em;line-height: 3em;border-spacing:: 0px}
  td{}
  .tdtop{background-color:#EAEAEA;border-right:gray 1px solid;}
  .tdleft{text-align: right}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
  <?php
    include "../wrapper.php";
    include "../db_info.php";

    //페이지 변수 설정
    if(isset($_GET['page'])){
      $page=$_GET['page'];
    }else{
      $page=1;
    }
    $onePage=4;


    //닉네임 변수 설정
    if(isset($_SESSION['nickname']))
    {
      $nickname=$_SESSION['nickname'];
    }else {
      $nickname="";
    }
  ?>
  <br>
  <div style="width:50em;height:3em;margin:0 auto;text-align:center;"><font style="font-size:1.9em">북카트</font></div>
  <br>
  <div id="paging" style="width:63em;height:70em; margin:0 auto ;padding:1em;">
    <table class='product'>
      <tr>
        <td class="tdtop" colspan="3">상품정보/상품명</td>
        <td class="tdtop" style="width:8em">가격</td>
        <td class="tdtop" style="width:7em">수량</td>
        <td class="tdtop" style="width:8em">합계</td>
        <td class="tdtop" style="width:7em">주문</td>
      </tr>
    </table>
    <?php

    $limitstart=($onePage*$page)-$onePage;
    $sqlLimit='limit '.$limitstart.','.$onePage;


    $sql="select * from BookList BookList join (select * from basket where nickname='".$nickname."') basket on BookList.no=basket.bookno order by basket.no desc ".$sqlLimit;
    $result=mysqli_query($conn,$sql);

    $count=0;
    while($row=mysqli_fetch_assoc($result))
    {

      $count++;
     ?>
    <!--반복시작 -->
    <br>
    <div style="width:62em;height:12em;margin:0 auto;border-bottom:1px solid gray;padding-bottom:1em;padding-left:1em">
      <div style="width:30.5em;height:12em;float:left;border-right:1px solid gray">
        <image src="<?php echo substr($row['imagepath'],13)?>" style="image-orientation:from-image;width:9em;height:11em;float:left;margin-top:0.5em"/>
        <div style="width:20em;height:11em;float:right;margin-top:0.5em">
          <table>
            <tr>
              <td class="tdleft">제목 : </td>
              <td><?php echo $row['bookname']?></td>
            </tr>
            <tr>
              <td class="tdleft">출판사 : </td>
              <td><?php echo $row['publish']?></td>
            </tr>
            <tr>
              <td class="tdleft">저자 : </td>
              <td><?php echo $row['author']?></td>
            </tr>
            <tr>
              <td class="tdleft">상품번호 : </td>
              <td><?php echo $row['bookno']?></td>
            </tr>
          </table>
        </div>
      </div>
      <div id="price_<?php echo $count?>" style="width:8.3em;height:12em;float:left;border-right:1px solid gray;text-align:center"><br><br><br><?php echo $row['price']."원"?></div>
      <div style="width:7.3em;height:12em;float:left;border-right:1px solid gray;text-align:center"><br><br><br><input id="number_<?php echo $count?>"  type=number size="2" style="width:80px" value="1"/></div>
      <div style="width:8.2em;height:12em;float:left;border-right:1px solid gray;text-align:center"><br><br><br><font id="total_<?php echo $count?>"><?php echo $row['price']."원"?></font></div>
      <div style="width:7.3em;height:12em;float:left;border-right:1px solid gray;text-align:center">
        <br><br><button onclick="alert('구매 완료');basketDelete2(<?php echo $row['no']?>)">구매하기</button><br>
        <button style="margin-top:5px" onclick="basketDelete(<?php echo $row['no']?>)">삭제하기</button>
      </div>
    </div>
    <!--반복 끝 -->
    <?php }
    //페이징 시작

    $sql="select count(*) as cnt from BookList BookList join (select * from basket where nickname='".$nickname."') basket on BookList.no=basket.bookno order by basket.no desc ";

    //전체 게시글 수 가져오기
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
      $paging.="<a class='pnumber' href='./basket.php?page=1'>처음</a>";
    }
    if($currentSection!=1){
      $paging.="<a class='pnumber' href='./basket.php?page=".$prevPage."'>이전</a>";
    }
    for($i=$firstPage;$i<=$lastPage;$i++){
      if($i==$page){
        $paging.="<font class='pnumber' class='pnumber'>".$i."</font>";
      }else{
        $paging.="<a class='pnumber' href='./basket.php?page=".$i."'>".$i."</a>";
      }
    }
    if($currentSection!=$allSection){
      $paging.="<a class='pnumber'href='./basket.php?page=".$nextPage."'>다음</a>";
    }


    ?>
    <br>
    <?php
      if($allPost!=0)
        echo $paging;
    ?>
  </div>

  <script>
    function basketDelete(nno){
      if(confirm("선택한 상품을 장바구니에서 삭제하시겠습니까??")==true)
      {
        $.post('basket_delete.php',
        {
          no : nno,
        },
        function(data,status)
        {
          alert('ok');
        });
        location.replace('./basket.php');
      }
    }

    function basketDelete2(nno){

        $.post('basket_delete.php',
        {
          no : nno,
        },
        function(data,status)
        {
          alert('ok');
        });
        location.replace('./basket.php');

    }

    $(document).ready(function (){
      $("#number_1").change(function(){
        var price=$("#price_1").text().substr(0,$("#price_1").text().length-1);
        price=price*$("#number_1").val();
        $("#total_1").text(price+"원");

      });
      $("#number_2").change(function(){
        var price=$("#price_2").text().substr(0,$("#price_2").text().length-1);
        price=price*$("#number_2").val();
        $("#total_2").text(price+"원");

      });
      $("#number_3").change(function(){
        var price=$("#price_3").text().substr(0,$("#price_3").text().length-1);
        price=price*$("#number_3").val();
        $("#total_3").text(price+"원");

      });
      $("#number_4").change(function(){
        var price=$("#price_4").text().substr(0,$("#price_4").text().length-1);
        price=price*$("#number_4").val();
        $("#total_4").text(price+"원");

      });
    });
  </script>

</body>
</html>
