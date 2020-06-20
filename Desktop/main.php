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
<link rel="stylesheet" type="text/css" href="saveWindow.css">
<link rel="stylesheet" type="text/css" href="appNav.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<body>
	<div class="totalNav">
	<div class="taskBar" id="bottomtaskBar">
  		<div class="nameTask" onmouseover="appNav()"> <img src="../Img/logo.png"><?php 
  			echo "$nameTask";
  		 ?> </div>
  		<img class="seperator" src="../Img/seperators.png">
  		<div class="appTask" onclick="openNote()" id="notePadTask"><img src="../Img/notepad.png">Notepad</div>
  		<div class="timeTask"><img src="../Img/speaker.png"><?php echo date("h:ia"); ?> </div>
	</div>
	<div class="appNav" id="appNavID" onmouseleave="appNavLeave()">
			<div class="NavText"><em>MmOp</em>95</div>
			<div class="appNavChoice" onclick="openNote()"><img src="../Img/notepad.png">Notepad</div>
		</div>
	</div>

    <div class="saveWindow" id="saveID">
      <div class="saveWindowHeader"><p>Save the File?</p></div>
      <div class="saveWtext"><p>Save the file or Cancel?</p></div>
      <form action="saveFile.php" method="get" id="notepadSaveForm">
      <div class="saveWbutton">
        <input class="saveButtonItself" id="saveB" type="submit" value="Save">
        <?php
        print '<input type="hidden" name="userName" value="'. $nameTask .'"/>'
         ?>
      </div>
      </form>
      <div class="cancelWbutton" onclick="cancelSave()">
        <input class="saveButtonItself" id="cancelB" type="submit" value="Cancel">
      </div>
    </div>

  <div class="editor" id="editorID">
    <div class="title">
      Notepad
      <div class="closeButton" id="closeB" onclick="closeNote();">x</div>
    </div>
    <div id="header">
      <div class="fileClass">
          <button class="fileBtn">File</button>
          <div class="fileContent">
            <a href="#">New</a>
            <a href="#" onclick="openSave()">Save</a>
          </div> 
      </div>
      <div class="fontClass">
      Font:<input type="number" class="fontNum" min="0" max=40>
      </div>
    </div>
    <textarea class="writing" id="notepadField" name="noteContent" form="notepadSaveForm"></textarea>
  </div>
<script>
function appNavLeave(){
	document.getElementById("appNavID").style.display = "none";
}
function appNav(){
	document.getElementById("appNavID").style.display = "inline";
}
function openNote(){
  document.getElementById("editorID").style.display = "inline";
  document.getElementById("appNavID").style.display = "none";
  document.getElementById("notePadTask").style.display = "inline";
}
function closeNote(){
  document.getElementById("editorID").style.display = "none";
  document.getElementById("notePadTask").style.display = "none";
}
function openSave(){
  document.getElementById("saveID").style.display = "inline";
}
function cancelSave(){
  document.getElementById("saveID").style.display = "none";
}
function redirectSave(){

}
$(function() {
            $( "#editorID" ).draggable();
            $( "#saveID" ).draggable();
         });
</script>
</body>
</html>