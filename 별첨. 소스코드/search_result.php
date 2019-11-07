<?php
include "db_info.php";
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="board_area">
<!-- 18.10.11 검색 추가 -->
<?php
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>

<center>
  <h1><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>' 검색 결과</h1>
  <h4 style="margin-top:30px;"><a href="http://localhost/list.php"><button>뒤로 가기</button></a></h4>
</center>

    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          $sql2 = "select * from board where $catagory like '%$search_con%'";
          while($board = $sql2->fetch_array()){

          $title=$board["title"];
            if(strlen($title)>30)
              {
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }

        ?>
      <?php  } ?>
    </table>
</div>
</body>
</html>
