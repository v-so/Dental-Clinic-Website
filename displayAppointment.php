<?php
include("db.php");
include("session.php");
include("header.php");


    if(isset($_REQUEST['display'])){
         $id = $_REQUEST["id"];

$sql = "SELECT
  employee.name as ename, visit.id,patients.name as pname,
  visit.date
FROM
  employee
  JOIN visit ON visit.dentistId = employee.id
  JOIN clinic ON clinic.id = employee.cId
  Join patients on patients.id = visit.patientId where patients.id ='$id'";

$result = $result = $db->query($sql);
echo "<h1>Patient appointments</h1>";
#echo("The appointments are: ");
echo "<table id = 'tableInfo' border = 1> <tr><th>Visit id</th><th>Date</th><th>Patient name</th><th>Dentist name</th><th>Appointment Info</th></tr>";
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
<title></title>
  <link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>
</html>
