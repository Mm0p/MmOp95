<!DOCTYPE html>
<html>
<?php $nameTask = $_GET['uName'];
date_default_timezone_set('Australia/Melbourne');
?>
<head>
  <?php 

      $usName = $_GET['uName'];
      $usPass = $_GET['uPass'];

      $userFilePath = "../users/$usName.txt";
      if (file_exists($userFilePath)) {
        $passContent = file_get_contents($userFilePath);
        if ($usPass == $passContent) {
          header("Location: ../Desktop/main.php?uName=$usName");
          echo $usName;
        } else {
          header("Location: ../Login/login.php");
        }
      } else {
        $userFile = fopen("../users/$usName.txt", "w");
        fwrite($userFile, $usPass);
        header("Location: ../Desktop/main.php?uName=$usName");
      }
      
   ?>
</body>
</html>