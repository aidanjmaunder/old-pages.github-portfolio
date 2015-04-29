<?

require_once 'access.class.php';
$user = new flexibleAccess();
if ( $_GET['logout'] == 1 ) 
	$user->logout('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
	//for ORBIT  $user->is_loaded()
if ( !$user->is_loaded() )
{
	//Login stuff:
	if ( isset($_POST['uname']) && isset($_POST['pwd'])){
	  if ( !$user->login($_POST['uname'],$_POST['pwd'],$_POST['remember'] )){//Mention that we don't have to use addslashes as the class do the job
		require_once("./inc/header.php");
		echo '<div id="loginIncorrect">Wrong username and/or password</div>';
		
	  }else{
	    //user is now loaded
	    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
	  }
	}
	require_once("./inc/header.php");
	echo '<div id="login"><h1>Orbit Admin Login</h1>
	<p><form method="post" action="'.$_SERVER['PHP_SELF'].'" />
	 username: <input type="text" name="uname" /><br /><br />
	 password: <input type="password" name="pwd" /><br /><br />
	 <input type="submit" value="login" />
	</form>
	</p>
	</div>';
	//Remember me? <input type="checkbox" name="remember" value="1" /><br /><br />
}else{
	//User is loaded
	require_once("./inc/header.php");  
	echo '<div id="loginInfo">';
	echo 'Welcome ' . $user->get_property('username');
	echo '<br/>';
	echo '<a href="'.$_SERVER['PHP_SELF'].'?logout=1">logout</a></div>';
	echo '<div id=\"adminNav\">
	      <ul>
	      <li><a href=index.php>Home</a></li>
	      <li><a href=what.php><span class="selected">What is it?</span></a></li>
	      <li><a href=download.php>Download</a></li>
	      <li><a href=screens.php>Screenshots</a></li>
	      <li><a href=contact.php>Contact Us</a></li>
	      <li><a href=legal.php>Legal Notice</a></li>
	      </ul>
		</div>';
	
	// section 1 of pulling and updating
	
	//require_once("./inc/connect_db.php");
	//require_once 'access.class.php';
	
	$con = mysql_connect("db409391490.db.1and1.com","dbo409391490","camilla11");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("db409391490", $con);
	
		if ($_FILES[userfile][size]>0) {

	// get the file info
	$picture = $_FILES[userfile][name];
	$temp_name = $_FILES[userfile][tmp_name];
	$size = $_FILES[userfile][size];
	$type = $_FILES[userfile][type];
	
	
	// make sure fuile name is safe
	$picture = preg_replace("[^a-zA-Z0-9\.\-]","_",$picture);
	$picture = preg_replace("[\\\/]","_",$picture);
	$picture = urlencode($picture);
		
	//if ($submit == "Upload") {

		
mysql_query("UPDATE whatisit
			SET picture = '$picture' ");
	//print("$query<br />");
	$mysql_result = mysql_query($query, $mysql_link);


	// get the folder ID to be used
	$folder_id = mysql_insert_id($mysql_link);
	$parent_folder = floor($id * .001)*1000;
	
	
	// creates a folder for 1000 folders
	$user_folder_path = "../gallery/$parent_folder";
	//print("$temp_name:: $user_folder_path<br />");
	@mkdir($user_folder_path,0777);
	
	// creates a folder for the one image
	$user_folder_path = "../gallery/$parent_folder/$id";
	//print("$temp_name:: $user_folder_path<br />");
	@mkdir($user_folder_path,0777);
	
	// path for the one image
	$the_file_path = "../gallery/$parent_folder/$id/$picture";
	
	// move the image
	$my_error = move_uploaded_file($temp_name, $the_file_path);
	                
                //print("<img src=\"$the_file_path\" width=\"100\"><br/>");
	
}
	
	
	// section 2
	if ($submit == "update") {
		
		$id = addslashes($id);
		$title = addslashes($title);
		$content = addslashes($content);
		$picture = addslashes($picture);
		
		mysql_query("UPDATE whatisit
			SET title = '$title',
			content = '$content'
			WHERE id= '1' ");
	}
	
	// section 3
	
	$result = mysql_query("SELECT * FROM whatisit");
	
	while($row = mysql_fetch_array($result))
	{
		$title = $row[1];
		$content = $row[2];
		$picture = $row[3];
	}
		
	
	echo("<form method=\"post\" action=\"what.php\" enctype=\"multipart/form-data\">
		  <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2097152\">
		&nbsp;Title:<br /><input type=\"text\" value=\"$title\" name=\"title\" /><br /><br />
		&nbsp;Content:<br /><textarea type=\"text\" rows=\"8\" cols=\"80\" value=\"$content\" name=\"content\" />$content</textarea><br /><br />
		Current Image: <br /><br />
		");
		
		$parent_folder = floor($id * .001)*1000;
		echo("<img src=\"../gallery/$parent_folder/$id/$picture\"><br />");
		
				print("<br />
				
		Suggested Image Size - 800x265<br /><br />
		
        <input name=\"userfile\" type=\"file\"><br /><br />
        <input type=\"submit\" name=\"submit\" value=\"update\">

");
		
	
	echo("</form>
	");  
}


require_once("./inc/footer.php");

?>

