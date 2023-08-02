<?php
$id = $_POST['id'];
$pw = $_POST['pw'];

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'user') or die ("Error");
$sql = "SELECT id FROM user WHERE id = '{$id}'";
$rlt = mysqli_query($conn, $sql);
$count = mysqli_num_rows($rlt);

if($count > 0){
    echo "<script>alert('이미 사용중인 ID입니다.'); </script>";
    echo "<script> window.history.back(); </script>";
    exit();
}

$query = "INSERT INTO user (id, pw) VALUES ('".$id."', '".$pw."')";
$result = mysqli_query($conn, $query);

if($result){
    echo "<script>alert('회원가입이 완료되었습니다.'); </script>";
    echo "<script>window.location.replace('main.php');</script>";
}
else{
    echo "<script>alert('회원가입에 실패했습니다.\n다시 시도해 주세요.'); </script>";
    echo "<script> window.history.back(); </script>";
}
?>

