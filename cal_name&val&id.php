<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>My Calculator</title>
</head>

<body>
  <h2>Calculator</h2> 
  <h3>Usage</h3>
  <ul>
    <li>Input two numbers in order</li>
    <li>Choose operation to perform</li>
    <li>Click on compute</li>
  </ul>


  /////////////////////////////this is a form to transfer information
  <form action="compute.php" method="GET">
       <p>
         <label for="firstnumberinput">First Number:</label>
         <input type="text" name="firstnumber" id="firstnumberinput" />
       </p>
       <p> 
        <label for="secondnumberinput">Second Number:</label>
        <input type="text" name="secondnumber" id="secondnumberinput" />
      </p>
      <p>
       <strong>Operator:</strong>
       <input type="radio" name="operator" value="addition" id="addinput" /><label for="addinput">addition</label>
       <input type="radio" name="operator" value="subtraction" id="subinput" /><label for="subinput">subtraction</label>
       <input type="radio" name="operator" value="multiplication" id="mulinput" /><label for="mulinput">multiplication</label>
       <input type="radio" name="operator" value="division" id="divinput" /><label for="divinput">division</label>
     </p>
     <p>
       <input type="submit" value="compute" />
       <input type="reset" /> 
     </p>
  </form>
</body>
</html>

    ///////////////////////for <form action="compute.php" method="GET">
    ///////////////////////we have the "compute.php" as follows:

    //@the usage of sprintf is just return a formatted string : itself not appears : need echo
    //in php file we could directly print out the html code with tags
    //echo sprintf('<strong>Incorrect usage.<strong>
                     <br /><a href=calculator.html>Try again</a>');


<!DOCTYPE html>
<head>
  <title>Calculation Result</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<?php 
   if(!isset($_GET['firstnumber']) || !isset($_GET['secondnumber']) || !isset($_GET['operator'])){
       echo sprintf('<strong>Incorrect usage.<strong>
                     <br /><a href=calculator.html>Try again</a>');
   }else{
       $first = $_GET['firstnumber'];
       $second = $_GET['secondnumber'];
       if(!is_numeric($first) || !is_numeric($second)){
            echo "Input is not numerical value";
       }else{
           $oper = $_GET['operator'];  
           switch($oper){
             case "addition":
                echo sprintf('Result is %.2f', $first + $second);
                break;
             case "subtraction":
                echo sprintf('Result is %.2f', $first - $second);
                break;
             case "multiplication":
                echo sprintf('Result is %.2f', $first * $second);
                break;
             case "division":
               if($second == 0){
                   echo sprintf('<strong>Second input cannot be zero</strong>');
               }else{
                  echo sprintf('Result is %.2f', $first / $second);
               }
              break;
            default:
               echo 'Failure'; 
               break;
          }
        }
        echo sprintf('<br /><a href="calculator.html">Try again</a>');
  }
?>
</body>
</html>