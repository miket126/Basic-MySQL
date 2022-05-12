<html>
<body>
<?php

$link = mysql_connect('mariadb','cs332t35','123','cs332t35');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$SSN = $_POST['SSN'];
$query = "SELECT Ctitle, Classroom, Meeting_days, Begin_time, End_time FROM SECTION, COURSE WHERE SSN = $SSN and SECTION.Cnum = COURSE.Cnum";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->mysql_fetch_assoc();
    echo "Course Title: ", $row["Cnum"], "<br>";
    echo "Room: ", $row["Classroom"], "<br>";
    echo "Day: ", $row["Meeting_days"], "<br>";
    echo "Start: ", $row["Begin_time"], "<br>";
    echo "End: ", $row["End_time"], "<br>";
}
$result->free_result();
$link->close();

?>
</body>
</html>