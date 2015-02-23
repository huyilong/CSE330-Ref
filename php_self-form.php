self-submitting form

Oftentimes we don't want to pass form values to a different page, 
but rather to the same page as contains the form so that we can process the information and 
display output on that same page. 

To do this, 
1.you can simply omit the action parameter from the form. 
2.Alternatively, you can use a PHP environment variable like $_SERVER['PHP_SELF'].


The following example simply takes the data input from a form and, 
via POST variables, echoes it back to the user as bold text on the same page:

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
		////////we must need to submit button to submit these things
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