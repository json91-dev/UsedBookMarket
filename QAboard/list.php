
<?php
  include "../db_info.php";
  //include "/var/www/html/include/login.php";

  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }else{
    $page=1;
  }
  $onePage=10; //한 페이지에 보여줄 게시글의 수

  if(isset($_GET['sorting']))
  {
    $sorting=$_GET['sorting'];//date like search_title search_content search_tc
  }
  if(isset($_GET['value']))
  {
    $value=$_GET['value'];
  }else{$value="";}

?>

<!DOCTYPE html>
<html>
<head>
  <title>중고책 나라</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/style.css"/>
 <style>
  table{width:62.5em;border-collapse:collapse;border-top:2px solid gray}
  th{background-color: rgb(213,213,213);padding:3px}
  td{padding:3px}
  tr{border-bottom:1px solid gray}
  tr:hover{background-color: #EAEAEA}
  a{text-decoration: none}
  .sort{color:black}
  .sort:visited{color:black}
  .sort:active{color:red}
  .sort:hover{color:red}

  #paging .pnumber{border:1px solid gray; margin-left:5px; background-color:rgb(213,213,213);padding:1px 4px 1px 4px}
  #paging a:hover{background-color:gray}

  #titleClick{color:black}
  #titleClick:hover{color:blue}
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php include "../wrapper.php"  //초기 화면 구성?>
  <div style="text-align:center;margin:40px auto;border-top:3px solid rgb(234,234,234);width:60em">
    <font style="font-size:2em">QA게시판</font>
  </div>
  <div style="text-align:right;margin:30px auto;width:65em">
    <select style="float:left;margin-left:2.6em">
      <option>10개씩 보기</option>
      <option>15개씩 보기</option>
      <option>20개씩 보기</option>
    </select>
    <font style="font-size:1em;color:blue;">중고책나라를 이용하면서 불편했던 점이나 궁금했던 점에 대해 질문해주세요<br>빠르게 답변해 드리겠습니다.</font>
  </div>

  <div style="margin:10px auto;padding:40px;width:60em;height:25em">
    <table id="QAboard">
      <tr style='background-color:gray'>
        <th style="width:5em">순번</th>
        <th style="width:26.3em">제목</th>
        <th style="width:10em">닉네임</th>
        <th style="width:10em"><a class="sort" href="#" onclick="location.replace('list.php?page=1&sorting=date');return false">날짜▼</a></th>
        <th style="width:4em"><a class="sort" href="#" onclick="location.replace('list.php?page=1&sorting=hit');return false">조회수▼</a></th>
        <th style="wdith:4em"><a class="sort" href="#"  onclick="location.replace('list.php?page=1&sorting=good');return false">좋아요▼</a></th>
      </tr>
      <?php

        $limitstart=($onePage*$page)-$onePage;
        $sqlLimit='limit '.$limitstart.','.$onePage;


        if($sorting=="date")
        {
          $sql="select * from QAboard order by no desc ".$sqlLimit;
        }
        else if($sorting=="good")
        {
          $sql="select * from QAboard order by good desc ".$sqlLimit;
        }
        else if($sorting=="hit"){
          $sql="select * from QAboard order by hit desc ".$sqlLimit;
        }
        else if($sorting=="search_title")
        {
          $sql="select * from QAboard where title like '%".$value."%' order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_content")
        {
          $sql="select * from QAboard where content like '%".$value."%' order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_nickname")
        {
          $sql="select * from QAboard where nickname='".$value."' order by no desc ".$sqlLimit;
        }
        else if($sorting=="search_tc")
        {
          $sql="select * from QAboard where (title like '%".$value."%' or content like '%".$value."%') order by no desc ".$sqlLimit;
        }
        else{}

        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
      ?>

      <?php //시간조정
        $datetime=explode(' ',$row['date']);
        $date=$datetime[0];
        $time=$datetime[1];
        if($date==Date('Y-m-d'))
          $row['date']=$time;
        else {
          $row['date']=$date;
        }
      ?>
      <tr>
        <td class="no"><?php echo $row['no']?></td>
        <td class="name"><a id="titleClick" href="./view.php?no=<?php echo $row['no']?>"><?php echo $row['title']?></a></td>
        <td class="nickname"><?php echo $row['nickname']?></td>
        <td class="date"><?php echo $row['date']?></td>
        <td class="hit"><?php echo $row['hit']?></td>
        <td class="good"><?php echo $row['good']?></td>
      </tr>
      <?php
        }?>
    </table>
  </div>

<!-- 페이징 시작 -->
    <?php
    if($sorting=="date")
    {
      $sql="select count(*) as cnt from QAboard order by no desc ";
    }
    else if($sorting=="good")
    {
      $sql="select count(*) as cnt from QAboard order by good desc ";
    }
    else if($sorting=="hit"){
      $sql="select count(*) as cnt from QAboard order by hit desc ";
    }
    else if($sorting=="search_title")
    {
      $sql="select count(*) as cnt from QAboard where title like '%".$value."%' order by no desc ";
    }
    else if($sorting=="search_content")
    {
      $sql="select count(*) as cnt from QAboard where content like '%".$value."%' order by no desc ";
    }
    else if($sorting=="search_nickname")
    {
      $sql="select count(*) as cnt from QAboard where nickname='".$value."' order by no desc ";

    }
    else if($sorting=="search_tc")
    {
      $sql="select count(*) as cnt from QAboard where (title like '%".$value."%' or content like '%".$value."%') order by no desc ";
    }
    else{} //전체 개시글수 가져오기
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
      $paging.="<a class='pnumber' href='./list.php?page=1&sorting=".$sorting."&value=".$value."'>처음</a>";
    }

    if($currentSection!=1){
      $paging.="<a class='pnumber' href='./list.php?page=".$prevPage."&sorting=".$sorting."&value=".$value."'>이전</a>";
    }

    for($i=$firstPage;$i<=$lastPage;$i++){
      if($i==$page){
        $paging.="<font class='pnumber' class='pnumber'>".$i."</font>";
      }else{
        $paging.="<a class='pnumber' href='./list.php?page=".$i."&sorting=".$sorting."&value=".$value."'>".$i."</a>";
      }
    }

    if($currentSection!=$allSection){
      $paging.="<a class='pnumber'href='./list.php?page=".$nextPage."&sorting=".$sorting."&value=".$value."'>다음</a>";
    }
  ?>
  <div style="text-align:center;margin:20px auto;border-top:3px solid rgb(234,234,234);width:60em">
  </div>
  <div style="margin:5px auto;text-align:center;width:65em;height:60px;">

    <button style="float:right" onclick="location.assign('write.php')">글쓰기</button>
    <div id='paging' style="text-align:center;padding-left:90px;padding-top:5px">
        <?php echo $paging ?>
    </div>
  </div>
  <div style="text-align:center;margin:20px auto;border-top:3px solid rgb(234,234,234);width:60em"></div><!--밑줄 -->
  <div style="margin:5px auto;width:30em;">
    <select id='opt'>
      <option>제목</option>
      <option>내용</option>
      <option>작성자</option>
      <option>제목+내용</option>
    </select>
    <input id='val' type="text" style="margin-left:10px;"/> &nbsp&nbsp&nbsp
    <button id='searchbutton'>검색</button>
  </div>
</div>


<script>
$(document).ready(function(){
  $("#searchbutton").click(function(){
    if($("#opt option:selected").val()=="제목")
    {
      var value=$("#val").val();
      location.replace("list.php?page=1&sorting=search_title&value="+value);
    }
    else if($("#opt option:selected").val()=="내용")
    {
      var value=$("#val").val();
      location.replace("list.php?page=1&sorting=search_content&value="+value);
    }
    else if($("#opt option:selected").val()=="작성자")
    {
      var value=$("#val").val();
      location.replace("list.php?page=1&sorting=search_nickname&value="+value);
    }
    else if($("#opt option:selected").val()=="제목+내용")
    {
      var value=$("#val").val();
      location.replace("list.php?page=1&sorting=search_tc&value="+value);
    }

  });
});
</script>
