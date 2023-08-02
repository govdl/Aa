<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
$cate = $_GET['cate'];
$search = $_GET['search'];
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SEARCH</title>
    </head>
    <body>
        <h1><strong><?=$cate?>에서 '<?=$search?>' 검색결과</strong></h1>
        <h4><a href="list.php">목록으로</a></h4>
        <table style="width:1000px;" class=middle>
        <thead>
            <tr align=center>
                <th width=70>NO.</th>
                <th width=300>Title</th>
                <th width=120>I&nbsp;D</th>
                <th width=120>Date</th>
            </tr>
        </thead>
        <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else{
            $page = 1;
        }

        $sql = "SELECT * FROM board WHERE $cate LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $total_post = mysqli_num_rows($result);
        $sql_page = "SELECT * FROM board WHERE $cate LIKE '%$search%' ORDER BY number DESC";
        $res_page = mysqli_query($conn, $sql_page);

        while($row = mysqli_fetch_array($res_page)){
        ?>
        <tbody>
            <tr align=center>
                <td><?php echo $row['number']; ?></td>
                <td><a href="view.php?number=<?php echo $row['number'];?>"><?php echo $row['title'];?></a></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['reg_date']; ?></td>
            </tr>
        </tbody>
        <?php }
        if(!$res = mysqli_num_rows($result)) { ?>
        <tbody>
            <tr align=center>
                <td><strong>검&nbsp;색&nbsp;결&nbsp;과&nbsp;없&nbsp;음</strong></td>
            </tr>
        </tbody>
        <?php } ?>
        </table>
    </body>
</html>