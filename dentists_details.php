<?php
include("session.php");
include("db.php");
include("header.php");

$sql = "SELECT
  name,
  employee.id,
  email,
  qualification,
  date
FROM
  employee
  JOIN dentist ON eId = employee.id
  JOIN visit ON dentistId = employee.id
GROUP BY
  name
 ORDER BY
 date";

$result = $db->query($sql);

echo "<h1>List of all the dentists</h1>";
echo "<table id ='tableInfo' border = 1; style = 'width: 90%'>
  <tr>
    <th>Name</th>
      <th>ID</th>
        <th>Email</th>
          <th>Qualification</th>
  </tr>";

      if ($result->num_rows > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                      $name = $row['name'];
                      $id = $row['id'];
                      $email = $row['email'];
                      $qual = $row['qualification'];
      echo (

    "<tr>".
      "<td>".$name."</td>".
        "<td>".$id."</td>".
          "<td>".$email."</td>".
            "<td>".$qual."</td>".
      "</tr>");

              }
      }
echo "</table>";

?>
<html>

<head>
<title> Dentist Information </title>

<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>

<h1>Weekly Appointments</h1>

<body>
  <div class = "form2">
  <form action = "show_appointments.php" method = "post">
        <label>Dentist ID : </label><input type = "text" name = "dID" required/><br><br>
      <label>Date 1 : </label><input type = "date" name = "date1" required/><br><br>
      <label>Date 2 : </label><input type = "date" name = "date2" required/><br><br>
      <input type = "submit" value = " Submit "/><br>
      <div>
</body>

</html>
