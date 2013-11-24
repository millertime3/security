<?
$input=escapeshellarg($_GET['input']);
shell_exec('bash /home/pi/security/turnInputOn ' . $input);
?>
