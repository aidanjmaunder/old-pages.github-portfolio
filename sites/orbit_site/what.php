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
$sql = 'SELECT id, title, 
               content, picture
        FROM whatisit';

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
<li><a href=\"what.php\"><span class=\"selected\">What is it?</span></a></li>
<li><a href=\"download.php\">Download</a></li>
<li><a href=\"screens.php\">Screenshots</a></li>
<li><a href=\"contact.php\">Contact Us</a></li>
<li><a href=\"legal.php\">Legal Notice</a></li>
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
<span class=\"caption3\">What is orbit?</span>
<p><span class=\"caption2\">{$row['title']}</span></p>
<p class=\"defPar\">{$row['content']}</p>

<div id=\"overviewImg\">
<img style=\"border: 1px solid black; text-align: center;\" src=\"gallery/0/{$row['picture']}\" alt=\"orbit_screenshot\"/>
</div>
</div>
</div>
</div>

</body>

</html>
  ");
} 
mysql_close($conn);
?>