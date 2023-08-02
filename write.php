<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>alert('작성하려면 로그인이 필요합니다.');";
    echo "window.location.replace('main.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WRITE</title>
    </head>
    <body>
        <div class="top"><h2>글쓰기</h2></div>
        <form method="POST" action="./write_action.php" enctype="multipart/form-data" autocomplete="off">
            <p><input type=text size=25 name=title placeholder="제목" required></p>
            <p><textarea clos=35 rows=15 name=content placeholder="내용을 입력하세요."></textarea></p>
            <p><input class=file id="input-file" type=file name=file></p>
            <p><input type="submit" value="글쓰기"></p>
        </form>
    </body>
</html>

