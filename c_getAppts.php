<?php

include("session.php");
include("db.php");
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$clinic_name = $_POST['name'];
$appt_date = $_POST['date1'];
#echo $clinic_name;
#echo $appt_date;
$sql = "SELECT
  employee.name as ename, visit.id,patients.name as pname,
  visit.date
FROM
  employee
  JOIN visit ON visit.dentistId = employee.id
  JOIN clinic ON clinic.id = employee.cId
  Join patients on patients.id = visit.patientId where clinic.name = '$clinic_name' and visit.date LIKE '$appt_date%'";

$result = $result = $db->query($sql);

echo("<h1>"."The appointments are: "."</h1>");
echo "<table id = 'tableInfo'> <tr><th>Visit ID</th><th>Date</th><th>Patient Name</th><th>Dentist Name</th><th>Appointment Info</th></tr>";
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        ?> <tr><td> <?php
        echo $row['id'];
        ?> </td><td> <?php
        echo $row['date'];
        ?> </td><td> <?php
        echo $row['pname'];
        ?></td><td><?php
        echo $row['ename'];
        ?></td><td> <form method="get" action="displayAppointment.php">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <input type="submit" name="display" value="Display information"></form></td>
</tr><?php
      }
    }
echo "</table>";

}

 ?>

 <html>

 <head>
 <title> Clinic Appointments </title>

 <link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
 </head>
</html>
