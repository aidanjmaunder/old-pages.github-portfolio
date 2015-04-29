<?php

$hostname="db409391490.db.1and1.com";
$database="db409391490";
$username="dbo409391490";
$password="camilla11";

$link = mysql_connect($hostname, $username, $password);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
else{
     echo "Connection to MySQL server " .$hostname . " successful!<br/>
" . PHP_EOL; 
}

$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Can\'t select database: ' . mysql_error());
}
else {
    echo 'Database ' . $database . ' successfully selected! <br/>';
}

mysql_close($link);

?>

