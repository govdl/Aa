<!DOCTYPE html>
<?php session_start(); ?>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
    </head>
    <body>
        <h1>MAIN</h1>
        <?php
        if(!isset($_SESSION['id'])){
            echo "<p><button onclick=\"window.location.href='login.php'\">로그인</button></p>";
            echo "<p><button onclick=\"window.location.href='list.php'\">게시판</button></p>";
        }
        else{
            $id = $_SESSION['id'];
            echo "<p>$id 님 환영합니다.";
            echo "<p><button onclick=\"window.location.href='logout.php'\">로그아웃</button></p>";
            echo "<p><button onclick=\"window.location.href='list.php'\">게시판</button></p>";
        }
        ?>
    </body>
</html>

