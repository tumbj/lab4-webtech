<!DOCTYPE html>
<html lang="en">

<head>
  <title>Calculate GPA.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<style>
  .error {color: #FF0000;}
</style>

<body>

  <?php
// define variables and set to empty values
$first_nameErr = $last_nameErr  = $idErr = "";
$first_name = $last_name   = $id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"]) ) {
    $first_nameErr = "First Name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$first_name)) {
      $first_nameErr = "Only letters  allowed"; 
    }
  }
  
  if (empty($_POST["last_name"]) ) {
    $last_nameErr = "Last Name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $last_nameErr = "Only letters and white space allowed"; 
    }
  }


  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else {
    $id = test_input($_POST["id"]);
    if (!preg_match("/^[0-9]*$/",$id)) {
      $idErr = "Only numeric allowed"; 
    }
  }


}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


  <div class="container page-wrapper">
    <div class="jumbotron ">
      <h1>Calculate Semester GPA. </h1>
    </div>
    <p><span class="error">* required field</span></p>
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
      <!-- <form class="form-horizontal" enctype="multipart/form-data" method='POST' action='upload.php'>   -->

      <div class="form-group">
        <label class="control-label col-sm-2">First Name: </label>
        <div class="col-xs-5 ">
          <input class="form-control" placeholder="Enter First Name" type="text" name="first_name" value="<?php echo $first_name;?>">
          <span class="error">*
            <?php echo $first_nameErr;?></span>
          <br><br>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">Last Name: </label>
        <div class="col-xs-5 ">
          <input class="form-control" placeholder="Enter Last Name" type="text" name="last_name" value="<?php echo $last_name;?>">
          <span class="error">*
            <?php echo $last_nameErr;?></span>
          <br><br>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2">ID:</label>
        <div class="col-xs-5">
          <input class="form-control" placeholder="Enter student ID" type="text" name="id" value="<?php echo $id;?>">
          <span class="error">*
            <?php echo $idErr;?></span>
          <br><br>
        </div>
      </div>

      <div class="col-sm-offset-2 ">
        <button class="btn" type="submit" value="check">Validate</button>
      </div>
    </form>






    <form class="form-group" enctype="multipart/form-data" action="upload.php" method="post">
      <table>

        <tr>

          <div class="form-group">
            <label class="control-label col-sm-2">Please select file: </label>
            <td class="col-xs-5"><input type="file" name="fileToUpload" accept=".csv"></td>
          </div>
        </tr>
        <tr>
          <td><br></td>
        </tr>
        <tr>
          <div class="col-sm-offset-2 ">

            <td><button class="btn" type="submit" value="UPLOAD">Upload</button></td>
          </div>
        </tr>
      </table>

    </form>
    <a href="#demo" class="btn btn-info " data-toggle="collapse">Template Calculate-GPA</a>
    <div id="demo" class="collapse">
      <a download="" href="Template-calculate-GPA.csv" class="glyphicon glyphicon-download "> download</a>
    </div>

  </div>
</body>

</html>