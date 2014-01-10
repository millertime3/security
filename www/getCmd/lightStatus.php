<?
echo shell_exec('gpio -g read ' . escapeshellarg($_GET['input']));
?>
