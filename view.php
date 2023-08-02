<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VIEW</title>
    </head>
    <body>
        <?php
        $conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
        $number = $_GET['number'];
        session_start();

        $query = "SELECT * FROM board WHERE number = '$number'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_array($result);

        $id = $rows['id'];
        ?>
        <table>
            <tr>
                <td><?php echo $rows['title'] ?></td>
            </tr>
            <tr>
                <td><br>작성자</td>
                <td><br><?php echo $rows['id'] ?></td>
            </tr>
            <tr>
                <td>작성일자</td>
                <td><?php echo $rows['reg_date'] ?></td>
            </tr>
            <tr>
                <td><br><?php echo $rows['content'] ?></td>
            </tr>
            <tr>
                <td class=file><a href="../upload/<?=$rows['file'];?>"download><?=$rows['file'];?></a></td>
            </tr>
            <tr>
                <td><p><h5>댓글목록</h5></p></td>
                <?php
                $connect = mysqli_connect('localhost', 'root', 'guss1301', 'comment');
                $sql = "SELECT * FROM comment WHERE com_num = '$number' ORDER BY number DESC";
                $res = mysqli_query($connect, $sql);
                while($com = mysqli_fetch_array($res)){
                ?>
            </tr>
            <tr>
                <td><?php echo $com['id']; ?>&nbsp;&nbsp;|</a></td>
                <td>&emsp;&emsp;<?php echo $com['content']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;<a href="com_update.php?number=<?php echo $com['number'];?>">수정</a></td>
                <td><a href="com_delete.php?number=<?php echo $com['number'];?>">삭제</a></td>
            </tr>
            <?php } ?>
            <p><button a onclick="ask();">삭제하기</button>
            <button class=no onclick="window.location.href='update.php?number=<?php echo $rows['number']; ?>'">수정하기</button>
            <button onclick="location.href='./list.php'">목록으로</button></p>
            <script>
                function ask(){
                    if(confirm("게시글을 삭제하시겠습니까?")){
                        window.location = "./remove_action.php?number=<?php echo $rows['number']; ?>"
                    }
                }
            </script>
        </table>
        <br><br>
        <form action="comment.php?number=<?php echo $rows['number'] ?>" method="post">
        <textarea name="content"></textarea>
        <button id="rep_btn">댓글</button>
    </body>
</html>

