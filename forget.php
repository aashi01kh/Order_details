<?php
include("connection.php");

if(isset($_POST['submit'])){

    $user = $_POST['cpassword'];
    $pass = $_POST['password'];
    $phone= $_POST['phone'];
    $errors= array();
    $password = password_hash($pass,PASSWORD_DEFAULT);
    if(empty($user) OR empty($pass) OR empty($phone)){
        array_push($errors,"All fields are required");
        echo'<script>alert("Fill");</script>';
    }
    else if($user!=$pass){
        echo'<script>alert("Different password");</script>';
    }
    else{


        $sql = "UPDATE `userlogin` SET `pass`='$password' WHERE `phoneNo` = '$phone'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location:login.php");

        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="login-page.css">
  <script src="particles.js"></script>
  

</head>

<div id="particles">
  <div id="webcoderskull">
    
    <main id="main-holder">
      <h1 id="login-header"  ><p style="color :#66FCF1;"> FORGET </p></h1>
      
      <div id="login-error-msg-holder">
        <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
      </div>
      <a href="login.php" style="color: #66fcf1;">login?</a>
      <form id="login-form"  method="POST">
        <input type="text" name="phone" id="username-field" class="login-form-field" placeholder="Phone Number" style="color :#C5C6C7;">
        <input type="password" name="password" id="password-field" class="login-form-field" placeholder="Password" style="color :#C5C6C7;">
        <input type="text" name="cpassword" id="phone-field" class="login-form-field" placeholder="Confirm password" style="color :#C5C6C7;">
        <input type="submit" name="submit" value="Submit" id="login-form-submit">
      </form>
    
    </main>
    
  </div>
</div>



</body>




</html>