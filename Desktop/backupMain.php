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
<link rel="stylesheet" type="text/css" href="aestheticStyle.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="howler.js"></script>
<body>
<!-- TASKBAR WINDOW START -->
	<div class="totalNav">
	<div class="taskBar" id="bottomtaskBar">
  		<div class="nameTask" onmouseover="appNav()"> <img src="../Img/logo.png"><?php 
  			echo "$nameTask";
  		 ?> </div>
  		<img class="seperator" src="../Img/seperators.png">
  		<div class="appTask" onclick="openNote()" id="notePadTask"><img src="../Img/notepad.png">Notepad</div>
  		<div class="appTask" onclick="openNote()" id="AestheticTask"><img src="../Img/aesthetic.gif">Aesthetic</div>
  		<div class="timeTask"><img src="../Img/speaker.png"><?php echo date("h:ia"); ?> </div>
	</div>
	<div class="appNav" id="appNavID" onmouseleave="appNavLeave()">
			<div class="NavText"><em>MmOp</em>95</div>
		<div class="NAV-APPS">
			<div class="appNavChoice" onclick="openNote()"><img src="../Img/notepad.png">Notepad</div>
			<div class="appNavChoice" onclick="openAes()"><img src="../Img/aesthetic.gif">Aesthetic</div>
		</div>
		</div>
	</div>
 <!-- TASKBAR WINDOW END -->
 <!-- NOTEPAD EDITOR WINDOW START -->
    <div class="saveWindow" id="saveID"> <!-- save window -->
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

  <div class="editor" id="editorID">  <!-- editor itself -->
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
 <!-- NOTEPAD EDITOR WINDOW END -->
  <!-- AESTHETIC WINDOW START -->
  <div class="AesWindow" id="AesID">
  		<div class="AescloseButton" id="AescloseB" onclick="closeAes();">x</div>
		<div class="AesTitle" id="AesWindowID"><h1>AESTHETIC</h1></div>
		<div>
			<div>
			<audio id="Borderline">
				<source src="songs/borderline.mp3" type="audio/mpeg">
			</audio>
			<audio id="Breathe Deeper">
				<source src="songs/breathedeeper.mp3" type="audio/mpeg">
			</audio>
			<audio id="Lost In Yesterday">
				<source src="songs/lostinyesterday.mp3" type="audio/mpeg">
			</audio>
			</div>
			<div class="AesLeft" id="AesPlayPause">
				<p class="playPauseSymb" onclick="startImpala()">►</p> <p class="playPauseSymb" onclick="pauseImpala()">❚❚</p>
				<p onclick="backImpala()">⇦</p> <p onclick="skipImpala()">⇨</p>
			</div>
			<div class="songTitle" id="songTitleHere">
				Press Play
			</div>
			<div class="AesVideo" id="videoID">
				<div id="videoIDGif">
				<img src="../Apps/Aesthetic/gifs/vapor2.gif" class="gif2">
				<img src="../Apps/Aesthetic/gifs/vaporShadow.png" class="gif3">
				<img src="../Apps/Aesthetic/gifs/vapor1.gif" class="gif1">
				</div>
			</div>
			</div>
		</div>
	</div>
 <!-- AESTHETIC WINDOW END -->
<script>
var Borderline = new Howl({
      src: ['songs/borderline.mp3'],
      loop: true,
      volume: 0.5
    });
var BreatheDeeper = new Howl({
      src: ['songs/breathedeeper.mp3'],
      loop: true,
      volume: 0.5
    });
var LostInYesterday = new Howl({
      src: ['songs/lostinyesterday.mp3'],
      loop: true,
      volume: 0.5
    });
var songArray = [Borderline, BreatheDeeper, LostInYesterday];
var songArrayName = ["Borderline", "Breathe Deeper", "Lost In Yesterday"]
var songNumber = 0;
function startImpala(){
	songArray[songNumber].play();
  document.getElementById("songTitleHere").innerHTML = songArrayName[songNumber];
  var opacity = 0;
  function MyFadeInFunction() {
   if (opacity<1) {
      opacity += .2;
      setTimeout(function(){MyFadeInFunction()},100);
   }
   document.getElementById('videoIDGif').style.opacity = opacity;
}
  MyFadeInFunction();
}
function skipImpala(){
  songArray[songNumber].stop();
  songNumber++;
  startImpala();
}
function backImpala(){
  songArray[songNumber].stop();
  songNumber--;
  startImpala();
}
function pauseImpala(){
  songArray[songNumber].pause();
	document.getElementById("songTitleHere").innerHTML = "Paused";
   }
function closeAes(){
	document.getElementById("AesID").style.display = "none";
	document.getElementById("AestheticTask").style.display = "none";
	pauseImpala();
}
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
function openAes(){
  document.getElementById("AesID").style.display = "inline";
  document.getElementById("appNavID").style.display = "none";
  document.getElementById("AestheticTask").style.display = "inline";
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
            $( "#editorID" ).draggable({handle: ".title"});
            $( "#saveID" ).draggable({handle: ".saveWindowHeader"});
            $( "#AesID" ).draggable({handle: "#AesWindowID"});
         });
</script>
</body>
</html>