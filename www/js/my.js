// Put your custom code here
$(document).ready(function() {
readProgramStatus();
});

//define the values of the lights
function checkLightStatus() {
$inputs = [7,8];
for(i=0;i<$inputs.length;i++) {
getStatus($inputs[i]);
}
}
function getStatus($input) {
$.get('getCmd/lightStatus.php?input=' + $input,function($status) {
        $l = $('#switch' + $input);
	if($status.trim() == '1') {
		$l.val('on');
	} else {
		$l.val('off');
	}
	$l.mouseup()
});
}

//turn lights on and off
function onLightChange($this,$input) {
$val=$($this).val(); 
if($val == 'on') {
$get='getCmd/turnInputOn.php?input=' + $input;
} else {
$get='getCmd/turnInputOff.php?input=' + $input;
}
$.get($get);
}

function killSecurity() {
$.get('getCmd/killSecurity.php',function(){
readProgramStatus();
});
}

function startSecurity() {
$.get('getCmd/startSecurity.php',function(){
readProgramStatus();
});
}

function readProgramStatus() {
$.get('getCmd/checkSecurityStatus.php',function($status){
if($status.trim() == 'down') {
$('#kill').parent().hide();
$('#start').parent().show();
} else {
$('#kill').parent().show();
$('#start').parent().hide();
}
});
}
var $registeredDoors = [];
var $registeredDoorsRemote=[];
function checkDoorStatus($id,$input,$remote) {
	if(!($input in $registeredDoors)){
		$registeredDoors.push($input+'');
		$registeredDoorsRemote.push($remote+'');
	}
if($remote == 'false') {
	$.get('getCmd/checkDoorStatus.php?input='+ $input,function($status){
	$('#'+$id).html($status);
	});
} else {
 $.get('getCmd/checkDoorRemoteStatus.php?host='+$remote+'&input='+ $input,function($status){
	$('#'+$id).html($status);
	});
}
}

function getOutput($cmd,$id) {
$.get($cmd,function($output) {
$('#'+$id).html('<plaintext>'+$output);
});
}

function toggleGarage() {
$.get('getCmd/toggleGarage.php',function(){
});
}

function changeManualOverride($bool) {
$bool = $($bool).val();
$.get('getCmd/replaceConf.php?input=manualOverride ' + $bool,function(){
});
}
var $doorRealTime=false;
function toggleRealTimeDoorCheck() {
	$doorRealTime=!($doorRealTime);
	$status = "off";
	if($doorRealTime){
		$status="on";
	}
	$('#doorReal').parent().find('span').html("Real Time "+ $status);
}
var t =	setInterval(function(){
		if($doorRealTime) {
		for(var i=0;i<$registeredDoors.length;i++) {
			$input = $registeredDoors[i];
			$remote = $registeredDoorsRemote[i];
			checkDoorStatus('door'+$input,$input,$remote);
		}
		}
	},1000);

