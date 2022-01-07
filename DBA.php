<?php
include("db.php");
include("session.php");
 if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myquery = mysqli_real_escape_string($db,$_POST['queryinput']);
        if($result = mysqli_query($db,$myquery)){
                echo "Query executed";
        }else{
                echo "Error: " . $myquery . "<br>" . mysqli_error($db);
        }

}
?>

<html>

   <head>
      <title>DBA</title>

   </head>

   <body bgcolor = "#FFFFFF">


               <form action = "" method = "post">
                  <label>Query  :      </label><br><input type = "text" name = "queryinput"/><br /><br />
                  <input type = "submit" value = " Submit "/><br>
               </form>



   </body>
</html>

