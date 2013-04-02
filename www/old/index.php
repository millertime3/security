<html>
<head>
<meta content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" name="viewport" />
</head>
<?php
$setAlarm = $_GET["set"];
$cmd = "bash /home/pi/security/replaceConf manualOverride " . $setAlarm;

if($setAlarm != '') {
shell_exec($cmd);
}
//start or kill program
if($_GET["startProgram"] != null) {
shell_exec('bash /home/pi/security/startProgram');
}
if($_GET["killProgram"] != null) {
shell_exec('killall securityProgram');
}
$turnon = $_GET["turnon"];
if($turnon != null) {
shell_exec('bash /home/pi/security/turnInputOn ' . $turnon);
}
$turnoff = $_GET["turnoff"];
if($turnoff != null) {
shell_exec('bash /home/pi/security/turnInputOff ' . $turnoff);
}


//Check the status of securityProgram
$programStatus = shell_exec('bash /home/pi/security/checkProgramStatus securityProgram');
?>

<?php
$alarm = shell_exec('bash /home/pi/security/manualAlarmCheck');

if(trim($alarm) == 'false') {?>
<p style="color:green">Alarm is disabled</p>
<p>click below to Activate</p>
<a href='/?set=true'>
<img src="enable.png"/>
</a>
<?
}

if(trim($alarm) == 'true') {?>

<p style="color:red">Alarm is Active</p>
<p>click below to disable</p>
<a href="/?set=false">
<img src="disable.png"/>
</a>

<?}
if(trim($alarm) == 'auto') {?>

<p style="color:red">Alarm is
<?if(trim(shell_exec('bash /home/pi/security/checkHostStatus')) == 'true') {
echo "disabled";
} else {
echo "active";
}?>

 automatically</p>
<p>click below to Activate manually</p>
<a href='/?set=true'>
<img src="enable.png"/>

</a>
<?} else {?>
<p>click below to Activate automatically</p>
<a href='/?set=auto'>
<img src="auto.png"/>

<?}?>

<?php
$backDoor = shell_exec('bash /home/pi/security/checkStatusDoor 0');
$garageDoor = shell_exec('bash /home/pi/security/checkStatusDoor 1');
$frontDoor = shell_exec('bash /home/pi/security/checkStatusDoor 15');
?>
<ul>
<li>Front Door Status: <b><?php echo $frontDoor;?></b></li>
<li>Garage Door Status: <b><?php echo $garageDoor;?></b></li>
<li>Back Door Status: <b><?php echo $backDoor;?></b></li>
</ul>
<p>

alarm status: <?php echo $programStatus;?>
</p>
<p>
<?
if(trim($programStatus) == 'up') {
echo "<a href='?killProgram=1'>Kill Security</a>";
} else {
echo "<a href='?startProgram=1'>Start Security</a>";
}
?>
</p>
<?
function buildLight($input,$name) {
$state=shell_exec('bash /home/pi/security/readInput ' . $input);
if($state == 1) { 
   $light="<p><a href='?turnon=".$input."' >Turn on ". $name . "</a></p>";
} else {
   $light="<p><a href='?turnoff=".$input."' >Turn off ". $name . "</a></p>";
}
return $light;
}
echo buildLight(7,"Basement hall");
echo buildLight(8,"Basement");
?>

</html>
