////here instead of typing in the commands by hands we use "mysqli" in php php php to manipulate mySQL
////we are using "mysqli" in php to operate queries in mysql : using prepared-statement actually!

<?php
//show favorite stories in collection
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

?>

<?php
if(!isset($_POST['username']) || !isset($_POST['pwd']) || !isset($_POST['name'])
			|| strlen(trim($_POST['username']))==0 || strlen(trim($_POST['pwd']))==0 || strlen(trim($_POST['name']))==0){
	
		    echo printf("<h3>Required fields are empty</h3><a href='signup.php'>Go back</a>");

		}else{
			$signupUsername = $_POST['username'];

			$stmt = $mysqli->prepare("select username from user where username=?");
			if(!$stmt){
				printf("Query Prep Failed: %s\n", $mysqli->error);
				exit;
			}
			$stmt->bind_param('s', $signupUsername);
			$stmt->execute();
			$stmt->bind_result($userexist);

			if($stmt->fetch()){
				echo printf("<h3>Duplicate username</h3><a href='signup.php'>Go back</a>");
			}
?>

<!DOCTYPE html>
<?php
  session_start();
  
  //html headers
  printf('<head>
         <title>Comment Page</title>
             <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
             <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
             <link rel="stylesheet" type="text/css" href="mainstyle.css"/>
             <script src="http://code.jquery.com/jquery-latest.js"></script>
             <script src="assets/js/bootstrap.min.js"></script>
             <script src="assets/js/app.js"></script>
       </head>');
  require 'database.php';


//detect request forgery
  if($_SESSION['token'] != $_POST['token']){
	 die("Request forgery detected");
   }

	if(isset($_POST['form_type'])){
	  	//post comment
		if($_POST['form_type'] == 'postComment'){
			$username = $_SESSION['username'];	
			$storyId = $_POST['commentStoryId'];
			$commentContent = $_POST['comment'];

			//prepare for the mysql statements
			$stmt = $mysqli->prepare("insert into comment (story_id, comment_content, username,comment_time) values (?, ?, ?, NOW())");
			if(!$stmt){
				printf("Query Prep Failed: %s\n", $mysqli->error);
				exit;
			}
			//bind with insertion operation
			$stmt->bind_param('sss', $storyId, $commentContent, $username);
			$stmt->execute();
	        $stmt->close();
	        
	        //link to commented story
	        printf("<form action='storyComment.php' method='POST'>
	        	      <input type='hidden' name='token' value=%s />
	        	      <input type='hidden' name='storyId' value=%s />
	        	      <button type='submit' class='btn btn-primary'>Back to story</button>
	        	     </form>", $_SESSION['token'], $_POST['commentStoryId']);
	        
	    //edit comment
		}else if($_POST['form_type'] == 'editComment'){
			$editCommentId = $_POST['editCommentId'];
			$editContent = $_POST['commentEdit'];

			$stmt = $mysqli->prepare("update comment set comment_content=?, comment_time=NOW() where comment_id=?");
			if(!$stmt){
				printf("Query Prep Failed: %s\n", $mysqli->error);
				exit;
			}
			 
			$stmt->bind_param('ss', $editContent, $editCommentId);
			$stmt->execute();
	        $stmt->close();
	  
	        echo sprintf("<h3>Edit successfully</h3><a href='person.php'>Go back</a>");

	    //delete comment
		}else if($_POST['form_type'] == 'deleteComment'){
			$deleteCommentId = $_POST['deleteCommentId'];
			$stmt = $mysqli->prepare("delete from comment where comment_id=?");
			if(!$stmt){
				printf("Query Prep Failed: %s\n", $mysqli->error);
				exit;
			}
			 
			$stmt->bind_param('s', $deleteCommentId);
			$stmt->execute();
	        $stmt->close();

	        echo sprintf("<h3>Delete successfully</h3><a href='person.php'>Go back</a>");

		}
	}
?>