<?php




//error message could be implemented by "instantly transition between pages"
//1.  header("location:someplace.php")

//also, it could be presented permanently in a specific "error page"
//2.  using a link for user to click to go back and print out the error message on this page
/*
		echo sprintf('<strong>Incorrect usage.<strong>
                     <br /><a href=calculator.html>Try again</a>');

*/

/*

	if different pages need a common error message prompt page
	we could use 1. <input type="hidden" name="hiddenID" value="want"> with form to submit
				 2. we could use session in php to get across the pages $_SESSION
				 3. we could use submit button and certain field for user to input in form $_POST
				 4. we could use GET to transfer the certain part of string for error message

	<td> is a column and <tr> is a row
	<ul> is a list and <li> is an item


				 eg. <li>   <a href="story.php?cat=travel">travel</a>   </li>

				 like <a href = "errorMessage.php ? name=you & error=wrong"> wrong submit </a>

				 and in the errorMessage.php file we could use $_GET['name'] and $_GET['error']


				 be careful that the $_GET $_SESSION & $_POST all need quotes '' inside the []

	*/
				 ?>