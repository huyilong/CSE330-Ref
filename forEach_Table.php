<?php
$medals = array(
  "United States" => array(46, 29, 29),
  "China" => array(38, 27, 23),
  "Russia" => array(24, 26, 32)
  );
  ?>
  
  <table>
    <tr>
      <th>Country</th>
      <th>Gold Medals</th>
      <th>Silver Medals</th>
      <th>Bronze Medals</th>
    </tr>
    <?php
    foreach($medals as $country => $counts){
      echo sprintf("\t<tr>\n\t\t<td>%s</td>\n\t\t<td>%d</td>\n\t\t<td>%d</td>\n\t\t<td>%d</td>\n\t</tr>\n",
        htmlentities($country),

    //echo "\t<tr>\n\t\t<td>".htmlentities($country)."</td>\n\t\t<td>".htmlentities($counts[0])."</td>\n\t\t<td>".htmlentities($counts[1])."</td>\n\t\t<td>".htmlentities($counts[2])."</td>\n\t</tr>\n";
        $counts[0],
        $counts[1],
        $counts[2]
        );
    }
    ?>

  </table>


  <!DOCTYPE html>
  <html>
  <body>

    <?php 
    $colors = array("red", "green", "blue", "yellow"); 

    foreach ($colors as $value) {
     echo "$value <br>";
   }
   ?>   

 </body>
 </html>


 <!DOCTYPE html>
 <html>
 <head>
  <style>
    table, th, td {
      border: 1px solid black;

      Month Savings
      January $100
      February  $80

    }
  </style>
</head>
<body>

  <table>
    ////////////////////////tr is for each row
    ////////////////////////th is for each column
    /////// outside - tr    inside - multiple ths
    <tr>
      <th>Month</th>
      <th>Savings</th>
    </tr>
    <tr>
      <td>January</td>
      <td>$100</td>
    </tr>
    <tr>
      <td>February</td>
      <td>$80</td>
    </tr>
  </table>

</body>
</html>
