<?php 

header('content-type:text/html;charset=utf-8'); 

$q = isset($_GET["q"]) ? strval($_GET["q"]) : '1';

if(empty($q)) {
    echo 'please select a website';
    exit;
}
 
$con = mysqli_connect('localhost','root','root');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"CCNOA");

mysqli_set_charset($con, "utf8");


$sql="SELECT RECOMMEND_KEYWORDS,RECOMMEND_ITEM FROM RECOMMEND WHERE MARKDOWN_ID = '".$q."'";
 
$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>KEYWORDS</th>
<th>ITEM</th>
</tr>";
 
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['RECOMMEND_KEYWORDS'] . "</td>";
    echo "<td>" . $row['RECOMMEND_ITEM'] . "</td>";
    echo "</tr>";

}
echo "</table>";
 
mysqli_close($con);
?>
