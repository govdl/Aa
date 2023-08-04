<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<script>alert('작성하려면 로그인이 필요합니다.');";
    echo "window.location.replace('main.php');</script>";
}

$title = $_POST['title'];
$id = $_SESSION['id'];
$content = $_POST['content'];
$error = $_FILES['file']['error'];
$tmpfile = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
$folder = "http://20.196.223.94:7680/upload/".$filename;

if($error != UPLOAD_ERR_OK){
    switch($error){
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('파일이 너무 큽니다.');";
            echo "window.history.back()</script>";
            exit;
    }
}

move_uploaded_file($tmpfile, $folder);

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');

$query = "INSERT INTO board(title, id, content, reg_date, file) VALUES ('$title', '$id', '$content', now(), '$filename');";

$result = mysqli_query($conn, $query);

if($result){
    echo "<script>alert('게시글이 작성되었습니다.');";
    echo "window.location.replace('list.php');</script>";
}
else{
    echo mysqli_error($conn);
}
?>

