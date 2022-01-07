<?php
include("db.php");
include("session.php");
include("header.php");

$sql = "SELECT
*
FROM
  clinic
";

$result = $db->query($sql);

echo("<html>");
echo("<head>");
echo"<link rel='stylesheet' type='text/css' href='cssWebsite.php'/>";
echo("</head>");

echo("<h2 style = 'color: #660000';>Choose a clinic and get a list of appointments at your chosen date.</h2>");

echo("<center>");
echo("<body>");
echo("<div class = 'form3'>");
echo("<form action = 'c_getAppts.php' method = 'post'>");
echo("<select name='name'>");
while($row = mysqli_fetch_array($result))
      {
        echo"<option name = 'name' value = '$row[name]'>$row[name]</option>";
      }
echo("<br>");
echo("<br>");
echo("<label> 'Date : ' </label>". "<input type =  'date'  name = 'date1' required/> ");
echo("<br>");
echo("<input type = 'submit' value = ' Submit '/><br>");
echo("</body>");
echo("<div>");
echo("<br>"."<br>");
echo("</select>");
echo("</center>");
echo("</html>");


?>
