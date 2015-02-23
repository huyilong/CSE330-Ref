Redirecting to a Different Page


If you want to redirect the user to a different page, 
you need to send a Location header. 
For example, a page containing only this code would redirect the user to the login.php file:
<?php
header("Location: login.php");
exit;   // we call exit here so that the script will stop executing before the connection is broken
?>
It is often useful to perform redirects after you perform server-side operations.


operation on post firstly, then header("location: sth.php") secondly

Important: You should generally not leave a user sitting on a page that has POST data, 
because if they refresh the page, their POST data will be submitted again, 
causing your server to perform an action twice. Rather, you should perform the operation, 
and then redirect them to another page that does not contain POST data in the header.

<?php
		printf("<p> Hello %s</p>", htmlentities($_SESSION['username']));
		printf("<p><strong>Now your username is changed to %s</strong></p>\n",
		       htmlentities($_POST['altername']));
?>


////////////////we could require('filepath.php'); at first line like importing functions and headers
<?php
	require('filepath.php');

	//upload file
	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		//if success we should refresh the website and go into this php page
		//if we do not use header to transition between pages we need to use form to submit instead
		header("Location: file.php");
		exit;
	}else{
	    echo sprintf("%s", htmlentities($full_path));
		exit;
	}

?>


/////////////////the following is "filepath.php" file
<?php 
	session_start ();

	// Get the filename and make sure it is valid
	$filename = basename ($_FILES['uploadedfile']['name']);
	if (!preg_match ('/^[\w_\.\-]+$/', $filename)){
	    echo "Invalid filename";
	    exit;
	}

	// Get the username and make sure it is valid
	$username = $_SESSION['username'];
	if (!preg_match ('/^[\w_\-]+$/', $username)){
	    echo "Invalid username";
	    exit;
	}

	$full_path = sprintf ("/home/jinglu/uploads/%s/%s", $username, $filename);

?>