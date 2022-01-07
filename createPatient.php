<?php
include("session.php");
include("db.php");

if($_SERVER["REQUEST_METHOD"]== "POST"){

       $sql = "INSERT INTO patients (email, name, sex,address)
        VALUES ('".$_POST["email"]."','".$_POST["name"]."','".$_POST["sex"]."','".$_POST["address"]."')";
        if($db->query($sql)=== TRUE){
                header("location: homepage.php");
        }else{

        }
}
?>
<html>
<head>
<title>Register A Patient</title>
<link rel="stylesheet" type="text/css" href="cssWebsite.php"/>
</head>
<div class = "form4">
<body>
        <form action = "" method = "post">
                <label>Email : </label><br><input type = "text" name = "email"  required/><br/><br/>
                <label>Name : </label><br><input type = "text" name = "name" required/><br/><br/>
                <label>Sex : M or F</label><br><input type = "text" name = "sex" maxlength="1" required/><br/><br/>
                <label>Address : </label><br><input type = "text" name = "address" required/><br/><br/>
                <input type = "submit" value = " Submit "/><br />
</div>

</body>
</html>
