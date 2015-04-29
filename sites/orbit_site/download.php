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
$sql = 'SELECT id, version, 
               content1,
               content2,
               content3,
               content4
        FROM download';

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
<li><a href=\"download.php\"><span class=\"selected\">Download</span></a></li>
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
<div id=\"dlContentLeft\">                    
<span class=\"caption3\">Downloads</span>
<p><span class=\"caption2\">{$row['version']}</span></p>
<p>Changelog</p>
<ul id=\"bList\">
<li class=\"bTitle\">{$row['content1']}</li>
<li class=\"bTitle\">{$row['content2']}</li>
<li class=\"bTitle\">{$row['content3']}</li>
<li class=\"bTitle\">{$row['content4']}</li>
</ul>
</div>

<div id=\"dlContentRight\">
<p><span class=\"caption2\">File Type</span></p>
<p><a href=\"downloads/Orbit-WIN.zip\">Windows (.exe)</a></p>
<p><a href=\"downloads/Orbit-MAC.zip\">Macintosh (.dmg)</a></p>
<p><a href=\"downloads/Orbit-AIR.zip\">No Images - Adobe Air (.air)</a></p>
</div>
</div>
</div>

</body>

</html>
  ");
} 
mysql_close($conn);
?>