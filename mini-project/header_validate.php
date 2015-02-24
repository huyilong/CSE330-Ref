<?php
		require "connDB.php";
		/*
				$mysqli = new mysqli('localhost', 'hu.yilong', 'hylwustl2014', 'guessPassword');
		 
				if($mysqli->connect_errno) {
					printf("Connection Failed: %s\n", $mysqli->connect_error);
					exit;
				}

				mysql> show create table luck;
		*/
		if(isset($_POST['sqlSubmit'])){

			$luckID = 66;

			$stmt = $mysqli->prepare("select password from luck where luckID=?");
			if(!$stmt){
		      printf("Query Prep Failed: %s\n", $mysqli->error);
		      exit;
		    }

		    $stmt->bind_param('s', $luckID);            
		    $stmt->execute();     
		    $stmt->bind_result($pwd_result);
		    
		    
		    while($stmt->fetch()){
		    	//if the user typed in the correct password
		    	//if using "==" the "123qwe" will also match "123"
		    	//so we always want to implement "==="  but too strong

		    	if($_POST['sqlSubmit'] == $pwd_result && strlen($_POST['sqlSubmit']) == strlen($pwd_result)){
		    		echo sprintf("You have guessed successfully ! The secret password is %d",
		    		htmlspecialchars($pwd_result)
		    		);
		      	}

		      	else{
		      		//if the user does not guessed the password stored in table named "luck"
		      		//where luckID = 66 then it should go back and stay in the index.php
		      		header("location: index.php");
		      	}
	        }
	        	   
	        $stmt->close();
		}
?>