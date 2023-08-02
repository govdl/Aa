<?php
$conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
$number = $_GET['number'];

$query = "SELECT * FROM board WHERE number = '$number'";
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
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UPDATE</title>
    </head>
    <body>
        <div class=head>글수정</div>
        <div class=middle>
            <form method="POST" action="update_action.php" enctype="multipart/form-data" autocomplete="off">
                <p><input type=textform type=text size=25 name=title value='<?php echo $rows['title']; ?>' required></p>
                <p><textarea class=textfrom clos=35 rows=15 name=content><?php echo $rows['content']; ?></textarea></p>
                <p><input class=write type="submit" value="글수정"></p>
                <input type="hidden" name=number value=<?php echo $rows['number'] ?>>
            </form>
        </div>
    </body>
</html>
