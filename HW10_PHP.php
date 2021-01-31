<!DOCTYPE html>
<html>
<head>
<title> Homework 10 </title>
<style>
table {
    border-collapse: collapse;
}

tr:nth-child(even){
	background-color: #f2f2f2
}

td, th {
	padding: 8px 20px 8px 20px;
}

th {
    background-color: LightSeaGreen;
    color: white;
    font-size: 18px;
}
</style>

</head>

<body>
<center>
<h1 style="color: darkslategray; font-family: calibri, sans-serif;"> Homework 10 </h1>
<h2 style="color: darkslategray; font-family: calibri, sans-serif;"> JSON File of Zip Data </h2>

<table>
	<tr>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>Population</th>
	</tr>
<?php

  // Open a file, "r":Read only, starts at the beginning of the file.
  $data = fopen("zips.json", "r");
  
  while(! feof($data)){
    
    // Get the data in the json file and decode it
    $json_data = fgets($data);
    $j = json_decode($json_data);
    
    // Insert the data into a table
    echo "<tr>";
    echo "<td>". $j->{'city'} ."</td>";
    echo "<td>". $j->{'state'} . "</td>";
    echo "<td>". $j->{'pop'} ."</td>";
    echo "<td>". $j->{'_id'} ."</td>";
    echo "</tr>";
  }
  fclose($file);
?>
</table>
</center>
</body>
</html>

