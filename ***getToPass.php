<!DOCTYPE html>
<?php
session_start();

require 'database.php';
//always have these things
printf('<head>
         <title>Story Page</title>
	     <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
       </head>');


//only login will appear on the page
if(isset($_SESSION['username'])){
  
  //we are using get method to pass because we do not want button 
  //we only want a link(like a button in bootstrap) to pass information and transition between pages

  //<a href="story.php?cat=education">education</a>
  //the form is <a href = "selfPage.php ? cat = education & sth = info & sth = inffo"
	printf('<div class="navbar navbar-inverse">
    <div class="navbar-inner">

                <li><a href="story.php?cat=education">education</a></li>
                <li><a href="story.php?cat=entertainment">entertainment</a></li>
                <li><a href="story.php?cat=life">life</a></li>
        
       </div>
    
      </div>
    </div>', $_SESSION['token']);
}
//only not log in will appear on the page
else{
	printf('<div class="navbar navbar-inverse">
    <div class="navbar-inner">
       <a class="brand" href="index.html">NewsBoard</a>
       <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="story.php?cat=education">education</a></li>
          <li role="presentation"><a href="story.php?cat=entertainment">entertainment</a></li>
          <li role="presentation"><a href="story.php?cat=life">life</a></li>
    </div>');
    
}



//here we are using the link and get to pass information    
//<a href="header:location page ? cat=...& e=..">  link name </a>


//rather than use button and form and post to pass information   
//<form action="" method="post">
//<input type = "text" name value/>
//<button type='submit' >Save category to favorite</button>
if(isset($_GET['cat'])){

  //<a href="story.php?cat=education">education</a>
  //the form is <a href = "selfPage.php ? cat = education & sth = info & sth = inffo"
  $test = $_GET['cat'];
  if($test!='education' && $test!='entertainment' && $test!='life' && $test!='politics'
     && $test!='society' && $test!='sports' && $test!='technology' && $test!='travel'){
      header("Location: person.php");
  }


  printf("<div id='content'>");
  printf("<h4>Posts in %s</h4>\n", htmlentities($_GET['cat']));
  
  //print like button based on if user logged in
  if(isset($_SESSION['username'])){
    printf("<form action='favorite.php' method='POST'>
            <input type='hidden' name='form_type' value='likeCategory'>
            <input type='hidden' name='likeCatName' value=%s>
            <button type='submit' class='btn btn-primary'>Save category to favorite</button>
          </form>", htmlentities($_GET['cat']));
  }


    $stmt = $mysqli->prepare("select story_id, title, story_content, username, post_time from story where cat_name=?");
    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
      exit;
    }
    $stmt->bind_param('s', $_GET['cat']);            
    $stmt->execute();     
    $stmt->bind_result($showId, $showTitle, $showContent, $showUsername, $showTime);
    
    //display stories in category
    while($stmt->fetch()){
      printf("<ul class='list-group'>\n
                \t<li class='list-group-item'>Title: %s</li>
                <li class='list-group-item'>Content: %s</li>
                <li class='list-group-item'>Author: %s</li>
                <li class='list-group-item'>Time: %s</li>
                <li><form action='storyComment.php' method='POST'>
                       <input type='hidden' name='storyId' value=%s>
                       <button type='submit' class='btn btn-info'>Read more</button>
                    </form></li>\n
                </ul>\n\n",
         htmlspecialchars($showTitle),
         htmlspecialchars($showContent),
         htmlspecialchars($showUsername),
         htmlspecialchars($showTime),
         $showId
      );
    }
   
    $stmt->close();
    
    if(!isset($_SESSION['username'])){
       printf('<a href="index.html">Go to main page</a>');
    }else{
       printf('<a href="person.php">Go to personal page</a>');
    }

    printf("</div>");

}



//this is for some of the "real buttons" on the nav bar : these are implemented with form
//and we do not use "get" for these buttons

//here is a critical disadvantage compared with "get" above
//we can not conveniently pass message around and across the pages (session, get , post, hidden input)
//so for multiple links and requent similar "error message page" we better use get <a href="sad?asdc">

//automatic transition    header("location:asdasd.php")
//manual transition form submit or href


//but for the form and post and submit
//we cannot use href= sdfasdf ? asdf=asdfas & asdf=asdfasfd
//we can instead us <input type="hidden" name="form_type" value="values"/> to transfer message
if(isset($_POST['form_type'])){

  if($_SESSION['token'] != $_POST['token']){
      die("Request forgery detected");
  }
  
  //post a new story
	if($_POST['form_type'] == 'postStory'){
		$username = $_SESSION['username'];
		
		$storyTitle = $_POST['storyTitle'];
		$storyContent = $_POST['textArea'];
		$storyCategory = $_POST['storyCategory'];

		$stmt = $mysqli->prepare("insert into story (username, title, story_content, cat_name, post_time) values (?, ?, ?, ?, NOW())");
		if(!$stmt){
			 printf("Query Prep Failed: %s\n", $mysqli->error);
			 exit;
		}
		 
		$stmt->bind_param('ssss', $username, $storyTitle, $storyContent, $storyCategory);
		$stmt->execute();
    $stmt->close();

    printf("<h3>Post successfully</h3><a href='person.php'>Go back</a>");

  //delete a story
	}else if($_POST['form_type'] == 'deleteStory'){
		$deleteStoryId = $_POST['deleteStoryId'];

    $stmt = $mysqli->prepare("delete from comment where story_id=?");

    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
      exit;
    }
     
    $stmt->bind_param('s', $deleteStoryId);
    $stmt->execute();
    $stmt->close();


    $stmt = $mysqli->prepare("delete from favorite where story_id=?");

    if(!$stmt){
      printf("Query Prep Failed: %s\n", $mysqli->error);
      exit;
    }
     
    $stmt->bind_param('s', $deleteStoryId);
    $stmt->execute();
    $stmt->close();

		$stmt = $mysqli->prepare("delete from story where story_id=?");

		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
		 
		$stmt->bind_param('s', $deleteStoryId);
		$stmt->execute();
    $stmt->close();

    printf("<h3>Delete successfully</h3><a href='person.php'>Go back</a>");
  

  //edit a story

	}





?>