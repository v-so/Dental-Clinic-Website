<?php
include("db.php");
include("session.php");

if(isset($_REQUEST['delete']))
  {
    $id = $_REQUEST['id'];
    $sql_1 =" DELETE FROM visit WHERE id ='$id'";
    $db->query($sql_1);
    header("Refresh:0");
  }


?>
<html>
<head>
<title>Udpate or Delete Appointment</title>
<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>
<body>
<?php
        $query = "Select visit.id,visit.date, employee.name as name1 ,patients.name as name2 from visit join employee on employee.id = visit.dentistId join patients on patients.id = visit.patientId";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
        // output data of each row
        echo "<table id = 'tableInfo'>";
        echo "<tr>";
        echo "<th>Dentist name</th><th>Patient name</th><th>Visit date</th><th></th><th></th>";
        echo "</tr>";
         while($row = mysqli_fetch_assoc($result)) {
                echo"<tr><td>".$row['name1']."</td><td>".$row['name2']."</td><td>". $row['date']."</td>";?><td><form method="get" action="updateAppointment.php">
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <input type="submit" name="update" value="Update">
</form></td><td><form method="post"> <input type="submit" name="delete" value="Delete">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">
 </form>
        </td></tr>
        <?php
        }
        echo "</table>";
        } else {
                echo "Oops! Nothing found.";
        }

?>
</body>

</html>
