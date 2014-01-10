<?
$get = escapeshellarg($_GET['input']);
echo shell_exec('bash /home/pi/security/checkStatusDoor ' .$get);
?>
