<?php
include("connection.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    .container {
      background-color: #ffffff;
      padding: 20px;
      margin-top: 20px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .input_field {
      margin-bottom: 15px;
    }

    .input_field label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input_field input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      text-decoration: none;
      color: #333333;
    }

    a:hover {
      text-decoration: underline;
    }

    .logout-btn {
      margin-top: 20px;
      text-align: center;
    }
  </style>
  <title>Document</title>
</head>
<body>
  <h2>Welcome <?php echo $_SESSION['username']; ?></h2><br>
  <form action="display.php" method="post">
    <input type="submit" value="Table" class="btn">
  </form>
  <div class="container">
    <h2>Form</h2>
    <form action="#" method="POST">
      <div class="input_field">
        <label for="input1">ORDER DATE</label>
        <input type="text" id="input1" name="input1" class="input">
      </div>

      <div class="input_field">
        <label for="input2">COMPANY</label>
        <input type="text" id="input2" name="input2" class="input" value="<?php echo $_SESSION['company']; ?>">
      </div>

      <div class="input_field">
        <label for="input3">ORDER OWNER</label>
        <input type="text" id="input3" name="input3" class="input" value="<?php echo $_SESSION['ownername']; ?>">
      </div>

      <div class="input_field">
        <label for="input4">Item</label>
        <input type="text" id="input4" name="input4" class="input">
      </div>

      <div class="input_field">
        <label for="input5">EA/COUNT</label>
        <input type="text" id="input5" name="input5" class="input">
      </div>

      <div class="input_field">
        <label for="input6">Weight</label>
        <input type="text" id="input6" name="input6" class="input">
      </div>

      <div class="input_field">
        <label for="input7">Requests</label>
        <input type="text" id="input7" name="input7" class="input">
      </div>

      <div class="input_field">
        <input type="submit" value="Submit" class="btn" name="register">
      </div>
    </form>
  </div>
  <div class="logout-btn">
    <a href="logout.php" class="btn">Logout</a>
  </div>
</body>
</html>

<?php
if ($_POST['register']) {
  $f1 = $_POST['input1'];
  $f2 = $_SESSION['company'];
  $f3 = $_POST['input3'];
  $f4 = $_POST['input4'];
  $f5 = $_POST['input5'];
  $f6 = $_POST['input6'];
  $f7 = $_POST['input7'];
  $f0 = $_SESSION['username'];

  if ($f1 != "" && $f4 != "" && $f5 != "" && $f6 != "" && $f7 != "") {
    $query = "INSERT INTO orderINFO VALUES('$f0','$f1','$f2','$f3','$f4','$f5','$f6','$f7')";
    $data = mysqli_query($conn, $query);

    if ($data) {
      echo "Data stored.";
    } else {
      echo "Failed to store data.";
    }
  } else {
    echo "Please fill the form.";
  }
}
?>
