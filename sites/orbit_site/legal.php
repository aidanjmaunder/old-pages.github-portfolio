<?php

//require_once("./inc/connect_db.php");

require_once("inc/header.php");

$dbhost = 'db409391490.db.1and1.com';
$dbuser = 'dbo409391490';
$dbpass = 'camilla11';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT id, content
        FROM legal';

mysql_select_db('db409391490');
$retval = mysql_query( $sql, $conn );
if(! $retval )

{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
  // section 1
    		
print("<div id=\"header\">
<div id=\"nav\">
<div id=\"logo\">
<a href=\"index.php\"><span id=\"title\">orbit</span></a>
</div>

<div id=\"adminLogin\">
<a href=\"./login/\">Admin Login</a>
</div>

<div id=\"menu\">
<ul>
<li><a href=\"index.php\">Home</a></li>
<li><a href=\"what.php\">What is it?</a></li>
<li><a href=\"download.php\">Download</a></li>
<li><a href=\"screens.php\">Screenshots</a></li>
<li><a href=\"contact.php\">Contact Us</a></li>
<li><a href=\"legal.php\"><span class=\"selected\">Legal Notice</span></a></li>
</ul>
</div>
</div>
</div>

<div id=\"middle\">
<div id=\"midSpace\">
</div>
<div id=\"middleImg\">
</div>
</div>

<div id=\"dlContent\">
<div id=\"wideContent\">
<span class=\"caption2\">Legal Notice</span>		
<p class=\"defPar\">&copy; 2012 Aidan Maunder. All rights reserved.</p>
<p class=\"defPar\">{$row['content']}</p>
</div>
</div>
</div>

</body>

</html>
  ");
} 
mysql_close($conn);
?>