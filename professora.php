<html>
<body>
<?php

$link = mysqli_connect('mariadb','cs332t25','x4JP4QH2','cs332t25');
if (!$link) {
    die('Could not connect:'.mysql_error());
}
echo 'Connected successfully<p>';

$SSN = $_POST['SSN'];
$query = "SELECT Ctitle, Classroom, Meeting_days, Begin_time, End_time FROM SECTION, COURSE WHERE PSSN = '$SSN' and SECTION.Cnum = COURSE.Cnum";
$result = $link->query($query);
$nor=$result->num_rows;

for($i=0; $i<$nor; $i++)
{
    $row = $result->fetch_assoc();
    echo "Course Title: ", $row["Cnum"], "<br>";
    echo "Room: ", $row["Classroom"], "<br>";
    echo "Day: ", $row["Meeting_days"], "<br>";
    echo "Start: ", $row["Begin_time"], "<br>";
    echo "End: ", $row["End_time"], "<br>";
    echo "<br>";
}
$result->free_result();
$link->close();

?>
<a href="index.html">Return Home</a>
</body>
</html>