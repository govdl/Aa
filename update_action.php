<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
$number = $_POST['number'];
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "UPDATE board SET title = '$title', content = '$content' WHERE number = '$number';";
$result = mysqli_query($conn, $sql);

if($result){
    echo "<script>alert('게시글이 수정되었습니다.');";
    echo "window.location.replace('view.php?number=$number');</script>";
}
else{
    echo "<script>alert('다시 시도해주세요.');</script>";
}
?>

