
<?php
//must be the first statement and be paired with session_destroyed
session_start();
/*
	<form action="sessionForm.php" method = "post">

		<input name = "forPHPvar1" type = "text"/>
		<input name="button1" type="submit" value="firstSubmit"/>


		<input type="hidden" name="formID" value="firstForm" />

	</form>

		<form action="sessionForm.php" method = "post">

		<input name = "forPHPvar2" type = "text"/>
		<!-- text field does not have a value while the button has a value: name-->
		<input name="button2" type="submit" value="secondSubmit"/>


		<input type="hidden" name="formID" value="secondForm" />
	</form>

*/
//Tip: To log out a user, you can call session_destroy() after session_start() on the logout page.
	if(isset($_POST['formID'])){
		/*
			<?php
					//here we start a session for any information associated with the index page
					//and would be passed across other pages when submit the form
						session_start();
						$session_var = 100;
						$_SESSION['sessionVar'] = $session_var;
			?>

		*/

			///////isset($_POST[forPHPvar1]) is wrong!!!!!
			/// in the post variable the name of the value must be quoted!!!
		if($_POST['formID'] == 'firstForm' && isset($_POST['forPHPvar1'])){
			//here we are using the hidden input area to differentiate the forms received
			//and we are using session for get across the information passed from the index.php
	 		$_SESSION['sessionVar'] = $_SESSION['sessionVar']*2;
	 		echo sprintf("You just typed in <b>%s</b> for the first form :)", $_POST['forPHPvar1']);
	 		echo sprintf("This is first form and the session is doubled to %d", $_SESSION['sessionVar']);
	 	}

	 	else if($_POST['formID'] == 'secondForm' && isset($_POST['forPHPvar2'])){
	 		$_SESSION['sessionVar'] = $_SESSION['sessionVar']/2;
	 		echo sprintf("You just typed in <b>%s</b> for the second form :)", $_POST['forPHPvar2']);
	 		echo sprintf("This is second form and the session is halfed to %d", $_SESSION['sessionVar']);
	 	}

	 	else if($_POST['formID'] == 'thirdForm'){
	 		header("location: index.php");
	 		session_destroy();
	 	}
	 }

	 /*
	 	in each php if block we could also get connected with the mySQL server

	 	if($_GET['show'] == 'story'){
	  		//using join statements here
	  	  	$stmt = $mysqli->prepare("select favorite.story_id, title, story.username, post_time
	  	  		     from favorite join story on (favorite.story_id=story.story_id)
	  	  		     where follower=?");

		    if(!$stmt){
		      printf("Query Prep Failed: %s\n", $mysqli->error);
		      exit;
		    }

		    $stmt->bind_param('s', $_SESSION['username']);            
		    $stmt->execute();     
		    $stmt->bind_result($favoriteStoryId, $favoriteStoryTitle, $storyAuthor, $storyTime);
		    
		    
		    while($stmt->fetch()){
		      printf("<ul class='list-group'>\n
		      	        \t
		      	        <li class='list-group-item'>Title: %s</li>
		                <li class='list-group-item'>Author: %s</li>
		                <li class='list-group-item'>Time: %s</li>
		                <form action='storyComment.php' method='POST'>
		                   <input type='hidden' name='storyId' value=%s />
		                   <input type='hidden' name='token' value=%s />
		                   <button type='submit' class='btn btn-primary'>Read more</button>
		                </form>\n
		                </ul>\n\n",
		         htmlspecialchars($favoriteStoryTitle),
		         htmlspecialchars($storyAuthor),
		         htmlspecialchars($storyTime),
		         htmlspecialchars($favoriteStoryId),
		         $_SESSION['token']
		      );
	        }
	        	   
	        $stmt->close();
	      */

?>