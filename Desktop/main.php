<!DOCTYPE html>
<html>
<?php $nameTask = $_GET['uName'];
date_default_timezone_set('Australia/Melbourne');
?>
<head>
	<title id="wait">Welcome <?php echo $nameTask ?> </title>
</head>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="textEdit.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<body>
	<div class="taskBar" id="bottomtaskBar">
  		<div class="nameTask"> <img src="../Img/logo.png"><?php 
  			echo "$nameTask";
  		 ?> </div>
  		<img class="seperator" src="../Img/seperators.png">
  		<div class="appTask" onclick="notePadApp()"><img src="../Img/notepad.png">Notepad</div>
  		<img class="seperator" src="../Img/seperators.png">
  		<div class="timeTask"><img src="../Img/speaker.png"><?php echo date("h:ia"); ?> </div>
	</div>

  <div class="editor" id="editorID">
    <div class="title">
      Notepad
    	<div class="closeButton" id="closeB" onclick="closeNote()">x</div>
    </div>
    <div id="header">
      <div class="fileClass">
          <button class="fileBtn">File</button>
          <div class="fileContent">
            <a href="#">New</a>
            <a href="#">Save</a>
            <a href="#">Save As</a>
          </div> 
      </div>
      <div class="fontClass">
      Font:<input type="number" class="fontNum" min="0" max=40>
      </div>
    </div>
    <textarea class="writing"></textarea>
  </div>
<script>
function notePadApp(){
  document.getElementById("editorID").style.display = "inline";
}
function closeNote(){
  document.getElementById("editorID").style.display = "none";
}

$(function() {
            $( "#editorID" ).draggable();
         });
</script>

</body>
</html>