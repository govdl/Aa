<?php

session_start();
if(!isset($_SESSION['id'])){
    echo "<script>alert('작성하려면 로그인이 필요합니다.');";
    echo "window.location.replace('main.php');</script>";
}

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'comment');

$id = $_SESSION['id'];
$content = $_POST['content'];
$number = $_GET['number'];

$query = "INSERT INTO comment(id, content, com_num) VALUES ('$id', '$content', '$number');";

$result = mysqli_query($conn, $query);

if($result){
    ?>
    <script>alert('댓글이 작성되었습니다.')</script>
    <script>window.history.back(); </script>
    <?php
}
else{
    ?>
    <script>alert('댓글 작성에 실패하였습니다.');</script>
    <script>window.history.back(); </script>
    <?php
}
?>
