<html>
<body>
<?php

$link = mysql_connect('mariadb','cs332t35','123','cs332t35');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$Cnum = $_POST['Cnum'];
$Snum = $_POST['Snum'];
$query = "SELECT Grade, COUNT(*) AS Student FROM ENROLLMENT WHERE Cnum = $Cnum and Snum = $Snum GROUP BY Grade";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->mysql_fetch_assoc();
    echo "Grade: ", $row["Grade"], "<br>";
    echo "Student: ", $row["Student"], "<br>";
}
$result->free_result();
$link->close();

?>
</body>
</html>