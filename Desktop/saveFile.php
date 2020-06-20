<!DOCTYPE html>
<html>
<body>
	<?php
		$uName = $_GET['userName'];
		$textAreaContent = $_GET['noteContent'];
		$splitText = explode(' ',trim($textAreaContent));
		$textName = $splitText[0];
		//if (!file_exists("../files/{$uName}")) {
    	//	mkdir("../files/{$uName}", 0777, true);
		//}
		$userFile = fopen("../files/{$textName}.txt", "w+"); // $userFile = fopen("../files/{$uName}/{$textName}.txt", "w+");
		fwrite($userFile, $textAreaContent);
		header("Location: ../Desktop/main.php?uName=$uName");
	 ?>
</body>
</html>