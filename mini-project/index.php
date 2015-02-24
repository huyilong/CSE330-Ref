<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>hello world</title>
	<style type="text/css">
	body{
		background-color: green;
		
	}
	#content{
		position: absolute;
		top: 30%;
		left: 30%;
		margin-right: 50%;
		margin-right: 50%;
	}
	input{
		margin-right: 50%;
		margin-right: 50%;
	}
	h1{
		font-style: oblique;
		color:red;
	}
	</style>
</head>

<body>
	<div id="content">
	<h1>Session and Self-submitting form</h1>
	<b> Headers to transition between the pages</b>

	<!-- first post form with a hidden input for differentiating when all arriving sessionForm.php-->
	<form action="sessionForm.php" method = "post">

		<input name = "forPHPvar1" type = "text"/>
		<input name="button1" type="submit" value="firstSubmit"/>


		<input type="hidden" name="formID" value="firstForm" />

	</form>

	<!-- second post form with a hidden input for differentiating when all arriving sessionForm.php-->

	<!-- usually :  name is same for multiple possible values : i.e. name is php post var and value not-->
	<form action="sessionForm.php" method = "post">

		<input name = "forPHPvar2" type = "text"/>
		<!-- text field does not have a value while the button has a value: name-->
		<input name="button2" type="submit" value="secondSubmit"/>


		<input type="hidden" name="formID" value="secondForm" />
	</form>


	<?php
	//here we start a session for any information associated with the index page
	//and would be passed across other pages when submit the form
		session_start();
		$session_var = 100;
		$_SESSION['sessionVar'] = $session_var;
	?>


	<!-- this form will trigger the "header" for location in php and stay in self page -->
	<form action="sessionForm.php" method = "post">

		<input name = "forPHPvar3" type = "text"/>
		<!-- text field does not have a value while the button has a value: name-->
		<input name="button3" type="submit" value="thirdSubmit"/>

		<label> Submit this form will stay in index because of header("location: stay")</label>
		<input type="hidden" name="formID" value="thirdForm" />
	</form>



	<!-- this is gonna be a self-submitting form with session -->
	<!-- omit the "action parameter" from the form-->
	<form method = "POST">
		<p>
			<label for="name">Try this self-submit without jumping page:</label>
			<input type="text" name="selfSubmit" id="css_name" />
			<input type="submit" value="self submit form" />
		</p>
	</form>
	


	<!-- this is testing the sql database and trying to submit password -->
	<form action="header_validate.php" method="post">
		<p>
			<label> Guess A Password:</label>
			<input type="text" name="sqlSubmit"/>
			<input type="submit" value="php mysqli submit db"/>
		</p>
	</form>
	</div>

	<?php
	///this is for the last form in this page i.e. the self-submitting form 
	///while the other two forms go into another page : has no relation with this


	//what is more this will make the html no longer static
	//html and php must make the file php and upload to server!!!!
			if(isset($_POST['selfSubmit'])){
				printf("<p><strong>You have just inputed %s</strong></p>\n",
					htmlentities($_POST['selfSubmit']));
			}
	?>

</body>
	
</html>


<!--

<!DOCTYPE html>
<html>
<head><title>Bold Printer</title></head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
	<p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" />
	</p>
	<p>
		<input type="submit" value="Print in Bold" />
	</p>
</form>
 
<?php
if(isset($_POST['name'])){
	printf("<p><strong>%s</strong></p>\n",
		htmlentities($_POST['name'])
	);
}
?>
</body>
</html>


<?php
session_start();
 
$oldnum = (int) @$_SESSION['inc_num'];
if($oldnum<1) $oldnum=1;
$newnum = $oldnum*2;
 
echo $newnum;
$_SESSION['inc_num'] = $newnum;
?>

-->
