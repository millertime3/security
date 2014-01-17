<?
$host = escapeshellarg($_GET['host']);
$get = escapeshellarg($_GET['input']);
echo shell_exec('bash /home/pi/security/checkStatusRemoteDoor '.$host.' ' .$get);
?>
