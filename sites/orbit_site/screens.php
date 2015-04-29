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
        FROM screens';

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
<li><a href=\"screens.php\"><span class=\"selected\">Screenshots</span></a></li>
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
<p><span class=\"caption3\">Screenshots</span></p>
<div id=\"gallery\">
<a href=\"images/settings.png\" rel=\"lightbox[screens]\"><img style=\"border: 1px solid black\" src=\"./images/thumb_settings.png\" alt=\"orbit_settings\"/></a>
<a href=\"images/highlight.png\" rel=\"lightbox[screens]\"><img style=\"border: 1px solid black\" src=\"./images/thumb_highlight.png\" class=\"galThumbs\" alt=\"orbit_highlight\"/></a>
<a href=\"images/text.png\" rel=\"lightbox[screens]\"><img style=\"border: 1px solid black\" src=\"./images/thumb_text.png\" class=\"galThumbs\" alt=\"orbit_text\"/></a>
</div>

<div id=\"gallery\">
<p class=\"defPar\">{$row['content']}</p>
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