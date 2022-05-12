<html>
<body>
<?php

$link = mysql_connect('mariadb','cs332t35','123','cs332t35');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$CWID = $_POST['CWID'];
$query = "SELECT Cnum, Grade FROM ENROLLMENT WHERE CWID = $CWID";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->mysql_fetch_assoc();
    echo "Course Number: ", $row["Cnum"], "<br>";
    echo "Grade: ", $row["Grade"], "<br>";
}
$result->free_result();
$link->close();

?>
</body>
</html>