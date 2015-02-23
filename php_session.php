<?php
	//we must use session_start() at first
	session_start();
	 

	$oldnum = (int) @$_SESSION['inc_num'];
	if($oldnum<1) $oldnum=1;
	$newnum = $oldnum*2;
	 
	echo $newnum;
	//here we update the vlaue of session variable
	//i.e. for $_SESSION['session_var']
	$_SESSION['inc_num'] = $newnum;
?>


/////////////Start a PHP Session


<?php
		// Start the session
		session_start();
?>


<!DOCTYPE html>
<html>
<body>

<?php
		// Set session variables
		$_SESSION["favcolor"] = "green";
		$_SESSION["favanimal"] = "cat";
		echo "Session variables are set.";
?>

</body>
</html>


//////////Get PHP Session Variable Values

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
	// Echo session variables that were set on previous page
	echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
	echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>