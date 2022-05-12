<html>
<body>
<?php

$link = mysql_connect('mariadb','cs332t35','123','cs332t35');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$Cnum = $_POST['Cnum'];
$query = "SELECT Snum, Classroom, Meeting_days, Begin_time, End_time, COUNT(Snum) AS Student FROM SECTION, ENROLLMENT WHERE SECTION.Cnum = $Cnum and SECTION.Snum = ENROLLMENT.Snum";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->mysql_fetch_assoc();
    echo "Section Number: ", $row["Snum"], "<br>";
    echo "Room: ", $row["Classroom"], "<br>";
    echo "Day: ", $row["Meeting_days"], "<br>";
    echo "Start: ", $row["Begin_time"], "<br>";
    echo "End: ", $row["End_time"], "<br>";
    echo "Student: ", $row["Student"], "<br>";
}
$result->free_result();
$link->close();

?>
</body>
</html>