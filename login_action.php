<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'user') or die ("Error");

$id = $_POST['id'];
$pw = $_POST['pw'];

$query = "SELECT * FROM user WHERE id = '$id' AND pw = '$pw'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if($row != NULL){
    $_SESSION['id'] = $row['id'];
    ?>
    <script>alert('로그인에 성공하였습니다.'); location.href="./main.php"; </script>";
    <?php
    exit;
}

if($row == NULL){
    ?>
    <script>alert('ID 혹은 비밀번호가 일치하지 않습니다.\n다시 시도해 주세요.'); </script>";
    <script> window.history.back(); </script>
    <?php
    exit;
}
?>


