<?php
session_start();

$conn = mysqli_connect('localhost', 'root', 'guss1301', 'board');
$query = "SELECT * FROM board WHERE number = '$number'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_array($result);

$number = $_GET['number'];
$filename = $_GET["file"];
$filesize = filesize($filename);

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename='$filename'");
header("Content-Transfer-encoding: binary");
header("Content-Length: $filesize");

ob_clean();
flush();
readfile(../upload/$filename);

?>
