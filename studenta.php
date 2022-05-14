<html>
<body>
<?php

$link = mysqli_connect('mariadb','cs332t25','x4JP4QH2','cs332t25');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$Cnum = $_POST['Cnum'];
$query = "SELECT SECTION.Snum, Classroom, Meeting_days, Begin_time, End_time, COUNT(SECTION.Snum) AS Student FROM SECTION, ENROLLMENT WHERE SECTION.Cnum = '$Cnum' and SECTION.Cnum = ENROLLMENT.Cnum and SECTION.Snum = ENROLLMENT.Snum GROUP BY SECTION.Snum";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->fetch_assoc();
    echo "Section Number: ", $row["Snum"], "<br>";
    echo "Room: ", $row["Classroom"], "<br>";
    echo "Day: ", $row["Meeting_days"], "<br>";
    echo "Start: ", $row["Begin_time"], "<br>";
    echo "End: ", $row["End_time"], "<br>";
    echo "Student: ", $row["Student"], "<br>";
    echo "<br>";
}
$result->free_result();
$link->close();

?>
<a href="index.html">Return Home</a>
</body>
</html>