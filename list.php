<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIST</title>
    </head>
    <body>
        <div calss="top"><h2>게시판</h2></div>
        <button class=no onclick="window.location.href='write.php'">글쓰기</button>
        <button class=no onclick="window.location.href='main.php'">뒤로가기</button>
        <table class="middle">
            <thead>
                <tr align="center">
                    <th width="70">NO.</th>
                    <th width="300">Title</th>
                    <th width="120">I&nbsp;D</th>
                    <th width="120">Date</th>
                </tr>
            </thead>
            <?php
            $conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
            $query = "SELECT * FROM board ORDER BY number DESC";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)){
            ?>
            <tbody>
                <tr align="center">
                    <td><?php echo $row['number']; ?></td>
                    <td><a href="view.php?number=<?php echo $row['number'];?>"><?php echo $row['title'];?></a></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['reg_date']; ?></td>
            </tbody>
            <?php } ?>
            <form method="get" action="search.php">
                <select name="cate">
                    <option value="title">제목</option>
                    <option value="id">I&nbsp;D</option>
                    <option value="content">내용</option>
                </select>
                <input type="text" name="search" size="45" required="required" /><button>검색</button>
            </form>
        </table>
    </body>
</html>

