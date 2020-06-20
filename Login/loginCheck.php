<!DOCTYPE html>
<html>
<?php $nameTask = $_GET['uName'];
date_default_timezone_set('Australia/Melbourne');
?>
<head>
  <?php 

      $usName = $_GET['uName'];
      $usPass = $_GET['uPass'];
      $method = 'aes128';
      $key = openssl_random_pseudo_bytes(32);
      $encryptPass = openssl_encrypt($usName, $method, $usPass);
      $decryptPass = openssl_decrypt($encryptPass, $method, $usPass);

      $userFilePath = "../users/$usName.txt";
      if (file_exists($userFilePath)) {
        $passContent = file_get_contents($userFilePath);
        if ($encryptPass == $passContent) {
          header("Location: ../Desktop/main.php?uName=$usName");
          echo $usName;
        } else {
          header("Location: ../Login/login.php");
        }
      } else {
        $userFile = fopen("../users/$usName.txt", "w");
        fwrite($userFile, $encryptPass);
        header("Location: ../Desktop/main.php?uName=$usName");
      }
   ?>
</body>
</html>