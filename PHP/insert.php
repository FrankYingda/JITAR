<?php 

 header('Content-type:text/html;charset=utf-8'); 

$MKID = $_POST['MKID'];
$MKITEM = $_POST['MKITEM'];
$MKKEYWORDS = $_POST['MKKEYWORDS'];
$MKTIME = $_POST['MKTIME'];


$con = mysqli_connect('localhost','root','root');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"CCNOA");

mysqli_set_charset($con, "utf8");

$sql= "INSERT INTO MARKDOWN (`MARKDOWN_ID`, `MARKDOWN_ITEM`, `MARKDOWN_KEYWORDS`,`MARKDOWN_TIME`) 
SELECT '{$MKID}','{$MKITEM}','{$MKKEYWORDS}','{$MKTIME}'
FROM DUAL WHERE NOT EXISTS(
SELECT '{$MKID}' FROM MARKDOWN WHERE MARKDOWN_ID = '{$MKID}')";


$result = mysqli_query($con,$sql);
 
 mysqli_close($con);

 ?>

