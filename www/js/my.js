// Put your custom code here
$(document).ready(function() {
readProgramStatus();
checkDoorStatus('#r',15);
checkDoorStatus('#r2',0);
checkDoorStatus('#r3',1);
});

//define the values of the lights
function checkLightStatus() {
$inputs = [7,8];
for(i=0;i<$inputs.length;i++) {
$input=$inputs[i];
$.get('getCmd/lightStatus.php?input=' + $input,function($status) {
   if($status == 1) {
      $('#switch' + $input).val('on');
      $('#switch' + $input).mouseup();
   }
});
}

$('#switch8').val('on');
$('#switch8').mouseup();
$('#switch7').val('off');
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

function checkDoorStatus($this,$input) {
$.get('getCmd/checkDoorStatus.php?input='+ $input,function($status){
$($this).html($status);
});
}

function getOutput($cmd,$id) {
$.get($cmd,function($output) {
$('#'+$id).html('<plaintext>'+$output);
});
}
