<?php
   include('session.php');
?>
<html>

   <head>
      <title>Welcome </title>
      <link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
   </head>

   <body>
     <div class = 'area0'>
      <div class = "headerHomepage">
     <h3 id = "w1">zvc353_4's Clinic&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       Hi <?php echo $login_session; ?>!<br><a id = 'signOut' href = "logout.php">Sign Out</a></h3>
     </div>

        <?php
  echo("<div class = 'area1'>");

  echo "<h3 id = 'dentist'>
  <a href = 'dentists_details.php'target= '_blank'>Dentists</a>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href = 'clinic_appts.php'target='_blank'> Appointments</a>
  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href = 'displayPatients.php'target='_blank'> Patients </a>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href = 'displayBills.php'target='_blank'>Bills</a>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <a href = 'missed_appointments.php'target='_blank'>Missed appointments</a></h3>";


  echo("</div>");
  echo("</div>");

        if($login_role == "recept"){
    echo("<div class = 'receptCSS'>");
                echo "<h2><a href='createPatient.php'>Add a patient</a></h2>";
                echo "<h2><a href='addAppointment2.php' target='_blank'>Schedule an appointment</a></h2>";
                echo "<h2><a href='updateOrDeleteAppointment.php'>Update or delete an appointment</a></h2>";
    echo("</div>");
        }
        if($login_role == "DBA"){
                echo "<h2><a href='DBA.php'>DBA Query</a></h2>";
        }
        ?>
   </body>

</html>
