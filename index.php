<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name"> 
  lastname<input type="text" name="lastname">
  E-mail: <input type="text" name="email" >
  <input type="submit" name="submit" value="Submit">  
</form>

<?php 
  require_once('Database.php');
  require_once('createtable.php');
  require_once('insert.php');
  require_once('select.php');
?>


<?php 

    $firdtname = $lastname = $email = $gender = $emailErr= $firdtnameErr = $lastnameErr ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
  if (empty($_POST["name"])) {
    $firdtnameErr = "Name is required";
  } else {
    $firdtname = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firdtname)) {
       $firdtnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
       $lastnameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
    }
  }

  
 
}

function test_input($data) {
    $data = htmlspecialchars($data);
    return $data;
  }
 
  echo "<br>";
      echo "<h2>Your Input:</h2>";
      
      echo "<br>";
      if($firdtnameErr != "")
         echo $firdtnameErr;
         else echo $firdtname;
      echo "<br>";
      
      echo "<br>";
      if($lastnameErr != "")
         echo "false last".$lastnameErr;
         else echo $lastname;
      echo "<br>";
      
      echo "<br>";
      if($emailErr != "")
      echo $emailErr;
      else echo $email;


      if($firdtname != "" && $email != "" && $lastname != "" ){
        InsertRecord($firdtname, $lastname, $email);
      }
     
      
?> 


</body>
</html>
