<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'comment');
$number = $_POST['number'];
$content = $_POST['content'];

$sql = "UPDATE comment SET content = '$content' WHERE number = '$number';";
$result = mysqli_query($conn, $sql);

if($result){
    ?>
    <script>alert('댓글이 수정되었습니다.');</script>
    <script>window.history.go(-2);</script>
    <?php
}
else{
    ?>
    <script>alert('다시 시도해주세요.');</script>
    <?php
}
?>

