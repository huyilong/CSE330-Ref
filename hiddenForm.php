
<!DOCTYPE html>

<html lang="en">

  <head>
     <title>Personal Page</title>
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="mainstyle.css"/>
  </head>

  <body>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
//we always use hidden input area to differentiate form that is received by another page
	<?php
       session_start();

       //if no current session, redirect to main page 
       if(!isset($_SESSION['username'])){
          header("Location: index.html");
       }
    ?>

----------------------------------------------------------------------------------------------------
///use this to <input type='hidden' name='form_type' value='post' /> to get the form later
// by using $_POST['form_type']  we could know which is which


         <?php
            printf("<form action='storyEdit.php' method='POST'>
                      <input type='hidden' name='form_type' value='postNews' />
                      <input type='hidden' name='token' value=%s />
                      <button type='submit' class='btn btn-primary'>Post story</button>
                    </form>", $_SESSION['token']);
          


          //<input type="hidden" name="form_type" value="updateUser"/>
                printf('<form class="form-update" action="user.php" method="POST">
                         <h4 class="form-update-heading">Update profile</h4>
                
                         <input type="hidden" name="form_type" value="updateUser"/>
                         <input type="hidden" name="token" value=%s />


                        <div class="form-group">
                           <label for="updatePwd">New Password</label>
                           <input type="password" class="form-control" name="updatePwd" id="updatePwd" placeholder="New Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>', $_SESSION['token']);


         ?>