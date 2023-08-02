<?php
$conn = mysqli_connect('localhost', 'root', 'guss1301', 'comment');
$number = $_GET['number'];

$query = "SELECT id FROM comment WHERE number = '$number'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_array($result);

$id = $rows['id'];

session_start();

if ($_SESSION['id'] != $id) {
    ?>
    <script>alert('권한이 없습니다.'); </script>
    <script> window.history.back(); </script>
    <?php
    exit;
} 
else if ($_SESSION['id'] == $id) {
    $query1 = "DELETE FROM comment WHERE number = '$number'";
    $result1 = mysqli_query($conn, $query1);
    ?>
    <script>alert('댓글이 삭제되었습니다.');</script>
    <script>window.history.back();</script>
    <?php
    exit;
}
?>

