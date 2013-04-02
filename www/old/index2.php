<?php 

$backDoor = shell_exec('bash /home/pi/checkStatusDoor 0');
//$backDoor = shell_exec('ls');
echo '<br/><br/>Back door status: ' . $backDoor;
?>
