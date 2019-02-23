<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="mystyle.css">

</head>
<body>
<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$file = fopen(basename($_FILES["fileToUpload"]["name"]),"r");
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// // Allow certain file formats
if($fileType != "csv" ) {
    echo "Sorry, only CSV files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} 

?>

<?php
{
    $subjects = array();
    $credits = array();
    $grades = array();
    $sum = 0;
    $credit = 0;
    $i = 0;
    while(($row = fgetcsv($file,0,","))!== FALSE) {
      
       if($i!==0){
            $subjects[] = $row[0];
            $credits[] = $row[1];
            $grades[] = $row[2];
            $sum += $row[1]*$row[2];
            $credit += $row[1];
       }
       $i++;
    }

  

  
    fclose($file);
 
}

?>
<div class="container page-wrapper ">
    <div class="jumbotron " >
         <h2>Result Semester GPA. </h1>
    </div>
    <table class="table table-bordered   table-striped is-fullwidth " id="show">
    <thead>
      <tr>
        <th>Subjects</th>
        <th>Credit</th>
        <th>Grade</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    while($i<count($subjects)){
        echo "<tr>".PHP_EOL;
        echo "<td>".$subjects[$i]."</td>".PHP_EOL;
        echo "<td>".$credits[$i]."</td>".PHP_EOL;
        echo "<td>".$grades[$i]."</td>".PHP_EOL;
        echo "</tr>".PHP_EOL;

        $i++;
    }

    ?>
  
      </tr>
    </tbody>
  </table>
 <h2> GPA: 
<?php echo number_format( ($sum / $credit), 2, '.', '') ;?>
</h2>



</div>

</body>
</html>