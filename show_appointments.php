<?php

include("session.php");
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$sql = "SELECT
  employee.id,name,
  date
FROM
  employee
  JOIN dentist ON eId = employee.id
  JOIN visit ON dentistId = employee.id
  WHERE (employee.id = '".$_POST["dID"]."') and date >= '".$_POST["date1"]."' and date < '".$_POST["date2"]."' ";

$result = $result = $db->query($sql);

echo("<h2 style = 'color: white';>"."Available appointments between your chosen dates ". $_POST["date1"]. ' and '.$_POST["date2"]. ' are: '."</h2>");
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo("<table id = 'tableInfo'>"."<th>"."$row[date]")."<br>"."</th>"."</table>";
      }
    }
}

?>
<html>

<head>
<title> Dentist Information </title>
<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>


</html>
