<html>
<body>
<?php

$link = mysqli_connect('mariadb','cs332t25','x4JP4QH2','cs332t25');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$CWID = $_POST['CWID'];
$query = "SELECT Cnum, Grade FROM ENROLLMENT WHERE CWID = '$CWID'";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->fetch_assoc();
    echo "Course Number: ", $row["Cnum"], "<br>";
    echo "Grade: ", $row["Grade"], "<br>";
    echo "<br>";
}
$result->free_result();
$link->close();

?>
<a href="index.html">Return Home</a>
</body>
</html>