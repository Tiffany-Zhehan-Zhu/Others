<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title> Happy Job Seeker </title>
	<style>
		p.titles{
			background-color: orange;
			color: white;
			size: 80;
			padding-top: 5px;
	    		padding-bottom: 5px;
	    		padding-left: 10px;
			font-size: 18px;
			font-weight: bold;
			font-family: Verdana, sans-serif;
		}
		
		p.titlesResult{
			background-color: MediumVioletRed;
			color: white;
			size: 80;
			padding-top: 5px;
	    		padding-bottom: 5px;
	    		padding-left: 10px;
			font-size: 18px;
			font-weight: bold;
			font-family: Verdana, sans-serif;
		}
		
		label.QuestionsLabel{
			font-size: 18px;
			padding-left: 10px;
			font-weight: bold;
		}		
	</style>
</head>

<body>

<!-- Make sure the user enter in valid data in all input fields -->
<?php
       // Define variables and set to empty values
       $nameErr = $bdateErr = $addressErr = $cityErr = $zipErr = $phonenumErr = $emailErr = "";
       $name = $bdate = $gender = $edu = $address = $city = $state = $zip = $phonenum = $email = $type = $status = "";
       $pname = "/^[a-zA-Z]*$/";
       $pbdate = "/^[0-9]{2}-[0-9]{2}-[0-9]{4}$/";
       $paddress = "/[A-Za-z0-9\-\\,.]+/";
       $pcity = "/[a-zA-Z\-\\. ]+/";
       $pzip = "/^[0-9]{5}$/";
       $pphonenum = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";
         
         if ($_POST) {
         	if (isset($_POST["name"])){
         		$name = $_POST["name"];   
         		// check if name is well-formed
         		if (!preg_grep($pname, $name)) {
         				$nameErr = "<br>Error: Only letters allowed for name!<br>You entered: ";  
         				foreach ($name as $n){
         					$nameErr .= $n." &nbsp;&nbsp;";
         				}	         		
         		}
         	}                
            
            if (isset($_POST["bdate"])) {
            	$bdate = get_input($_POST["bdate"]);
            	// check if birthdate is well-formed
            	if (preg_match($pbdate,$bdate)==0) {
            		$bdateErr = "<br>Error: Please enter a date in 'MM-DD-YYYY' format!<br>You entered: ".$bdate;
            	}
            }
            
            if (isset($_POST["gender"])) {
            	$gender = get_input($_POST["gender"]);
            }

            if (isset($_POST["edu"])) {
            	$edu = get_input($_POST["edu"]);
            }
            
            if (isset($_POST["address"])) {
            	$address = get_input($_POST["address"]);
            	// check if street address is well-formed
            	if (preg_match($paddress,$address)==0) {
            		$addressErr = "<br>Error: Only letters, numbers, space, comma ',' and period '.' allowed for address!<br>You entered: ".$address;
            	}
            }          
            	
            if (isset($_POST["city"])) {
            	$city = get_input($_POST["city"]);
            	// check if city name is well-formed
            	if (preg_match($pcity,$city)==0) {
            		$cityErr = "<br>Error: Only letters allowed for city!<br>You entered: ".$city;
            	}            	
            }
            
            if (isset($_POST["state"])) {
            	$state = get_input($_POST["state"]);
            }
            
            if (isset($_POST["zip"])) {
            	$zip = get_input($_POST["zip"]);
            	// check if zip code is well-formed
            	if (preg_match($pzip,$zip)==0) {
            		$zipErr = "<br>Error: Please enter a 5-digit number!<br>You entered: ".$zip;
            	}
            }
            
            if (isset($_POST["phonenum"])) {
            	$phonenum = get_input($_POST["phonenum"]);
            	// check if phone number is well-formed
            	if (preg_match($pphonenum,$phonenum)==0) {
            		$phonenumErr = "<br>Error: Please enter a number in '000-000-0000' format!<br>You entered: ".$phonenum;
            	}
            }
                              
            if (isset($_POST["email"])) {
            	$email = $_POST["email"];
            	// check if e-mail address is well-formed
            	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            		$emailErr = "<br>Error: Invalid email format!<br>You entered: ".$email;
            	}
            }
            
            if (isset($_POST["type"])) {
            	$type = $_POST["type"];
            }
            
            if (isset($_POST["status"])) {
            	$status = get_input($_POST["status"]);
            }
                              
         }
         
         // Define a boolean variable to indicate if the user enter in valid data in all input fields.
         if ($nameErr=="" && $bdateErr=="" && $addressErr=="" && $cityErr=="" && $zipErr=="" && $phonenumErr=="" && $emailErr=="") {
         	$no_mistake = TRUE;
         }else{
         	$no_mistake = FALSE;
         }
         
         function get_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>


      
    	<!-- -------------------------------- -->
	<!-- The job application form -->
	<!-- -------------------------------- --> 
		
	
	<form action="jobapplication.php" method="post">
	
	<table align='center' bgcolor="lightyellow" cellpadding="5">
	<tr><td colspan="2" align='center'> <p class="titles"> Job Application Form </p></td></tr>
	<tr><td colspan="2" style="font-family: Verdana, sans-serif; color: navy" > &nbsp;&nbsp;Thank you for your interest in working with 
						<span style="font-style: italic;font-weight: bold;">Happy Job Seeker!</span><br>
						&nbsp;&nbsp;Please check below for available job opportunities and send your application by filling out the form.<br>
						&nbsp;&nbsp;Your input will be displayed in the form at the <strong>bottom</strong> of this page once you click on <strong>Submit</strong>.</td></tr>
	<tr><td colspan="2"> <span style="color: #b30401;"> &nbsp;&nbsp;* Indicates required fields.</span>
						<p class="titles"> Personal Information </p></td></tr>
	
	<!-- Use text fields for name -->
	<tr>
	<td><label for="name" class="QuestionsLabel"><span style="color: #b30401;">*</span> Name </label></td> 
	<td><input name="name[]" type="text" maxlength="30" size="20" id="name"  style="font-size: 18px;" placeholder="&nbsp;First"  required/>
		<input name="name[]" type="text" maxlength="30" size="20" id="name"  style="font-size: 18px;" placeholder="&nbsp;Middle (Optional)"/>
		<input name="name[]" type="text" maxlength="30" size="20" id="name"  style="font-size: 18px;" placeholder="&nbsp;Last" required/>
		<span style="color: #b30401;"><?php  echo $nameErr;?></span></td></tr>		
				
     	<!-- Use text fields for birthdate -->                   
    	<tr>
	<td><label for="bdate" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Birthdate  </label></td>
   	 <td><input name="bdate" type="text" maxlength="10" size="20" id="bdate" style="font-size: 18px;" placeholder="&nbsp;MM-DD-YYYY" required/>
    	<span style="color: #b30401;"><?php echo $bdateErr;?></span></td></tr>

    	<!-- Use radio buttons for gender -->
    	<tr>
	<td><label for="gender" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Gender </label></td>
	<td><input type="radio" name="gender" id="gender" style="font-size: 18px;" value="Female" required> Female &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="gender" id="gender" style="font-size: 18px;" value="Male" required> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="gender" id="gender" style="font-size: 18px;" value="Prefer not to answer" required> Prefer not to answer </td></tr>
		
   	 <!-- Use drop dwons lists for education -->
    	<tr>
	<td><label for="edu" class="QuestionsLabel"><span style="color: #b30401;">*</span> Education </label></td>
	<td><select required name="edu" style="width: 220px; height: 28px" > 
		<option value=""></option>		
		<option value="High school graduate and below">High school graduate and below</option>
		<option value="Some college, no degree">Some college, no degree</option>
		<option value="Associate's degree, occupational">Associate's degree, occupational</option>
		<option value="Associate's degree, academic">Associate's degree, academic</option>
		<option value="Bachelor's degree">Bachelor's degree</option>
		<option value="Master's degree">Master's degree</option>
		<option value="Doctoral degree and above">Doctoral degree and above</option>
	</select></td></tr>
	
	<tr><td colspan="2"><p class="titles"> Contact Information </p></td></tr>

	<!-- Use text fields for address --> 	
   	<tr>
	<td><label for="address" class="QuestionsLabel"><span style="color: #b30401;">*</span> Street Address </label></td>
	<td><input name="address" type="text" maxlength="50"  size="70" id="address" style="font-size: 18px;" required/>
		<span style="color: #b30401;"><?php echo $addressErr;?></span></td></tr>
	
	<!-- Use text fields for city --> 
    	<tr>
	<td><label for="city" class="QuestionsLabel"><span style="color: #b30401;">*</span>  City </label></td>
	<td><input name="city" type="text" maxlength="50"  size="20" id="city" style="font-size: 18px;" required/>
		<span style="color: #b30401;"><?php echo $cityErr;?></span></td></tr>

    	<!-- Use drop dwons for state -->
    	<tr>
	<td><label class="QuestionsLabel"><span style="color: #b30401;">*</span>  State </label></td>
	<td><select required name="state" style="width: 220px; height: 28px" > 
		<option value=""></option>		
		<option value="Alabama">Alabama</option>
		<option value="Alaska">Alaska</option>
		<option value="Arizona">Arizona</option>
		<option value="Arkansas">Arkansas</option>
		<option value="California">California</option>
		<option value="Colorado">Colorado</option>
		<option value="Connecticut">Connecticut</option>
		<option value="Delaware">Delaware</option>
		<option value="District of Columbia">District of Columbia</option>
		<option value="Florida">Florida</option>
		<option value="Georgia">Georgia</option>
		<option value="Hawaii">Hawaii</option>
		<option value="Idaho">Idaho</option>
		<option value="Illinois">Illinois</option>
		<option value="Indiana">Indiana</option>
		<option value="Iowa">Iowa</option>
		<option value="Kansas">Kansas</option>
		<option value="Kentucky">Kentucky</option>
		<option value="Louisiana">Louisiana</option>
		<option value="Maine">Maine</option>
		<option value="Maryland">Maryland</option>
		<option value="Massachusetts">Massachusetts</option>
		<option value="Michigan">Michigan</option>
		<option value="Minnesota">Minnesota</option>
		<option value="Mississippi">Mississippi</option>
		<option value="Missouri">Missouri</option>
		<option value="Montana">Montana</option>
		<option value="Nebraska">Nebraska</option>
		<option value="Nevada">Nevada</option>
		<option value="New Hampshire">New Hampshire</option>
		<option value="New Jersey">New Jersey</option>
		<option value="New Mexico">New Mexico</option>
		<option value="New York">New York</option>
		<option value="North Carolina">North Carolina</option>
		<option value="North Dakota">North Dakota</option>
		<option value="Ohio">Ohio</option>
		<option value="Oklahoma">Oklahoma</option>
		<option value="Oregon">Oregon</option>
		<option value="Pennsylvania">Pennsylvania</option>
		<option value="Rhode Island">Rhode Island</option>
		<option value="South Carolina">South Carolina</option>
		<option value="South Dakota">South Dakota</option>
		<option value="Tennessee">Tennessee</option>
		<option value="Texas">Texas</option>
		<option value="Utah">Utah</option>
		<option value="Vermont">Vermont</option>
		<option value="Virginia">Virginia</option>
		<option value="Washington">Washington</option>
		<option value="West Virginia">West Virginia</option>
		<option value="Wisconsin">Wisconsin</option>
		<option value="Wyoming">Wyoming</option>
	</select></td></tr>
	
	<!-- Use text fields for zip code --> 		
	<tr>
	<td><label for="zip" class="QuestionsLabel"><span style="color: #b30401;">*</span> Zip Code </label></td>
	<td><input name="zip" type="text" maxlength="5"  size="20" id="zip" style="font-size: 18px;" placeholder="&nbsp;00000" required/>
		<span style="color: #b30401;"><?php echo $zipErr;?></span></td></tr>			

	<!-- Use text fields for phone number --> 
	<tr>
	<td><label for="phonenum" class="QuestionsLabel"><span style="color: #b30401;">*</span> Phone Number &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
	<td><input name="phonenum" type="text" maxlength="12" id="phonenum" style="font-size: 18px;" placeholder="&nbsp;000-000-0000" required/>
		<span style="color: #b30401;"><?php echo $phonenumErr;?></span></td></tr>

	<!-- Use text fields for email --> 
	<tr>
	<td><label for="email" class="QuestionsLabel"><span style="color: #b30401;">*</span> Email  </label></td>
	<td><input name="email" type="text" maxlength="50" size="40" id="email" style="font-size: 18px;" placeholder="&nbsp;xxxxx@xxx.com" required/>
		<span style="color: #b30401;"><?php echo $emailErr;?></span></td></tr>
	
	<tr><td colspan="2"><p class="titles"> Additional Information </p></td></tr>
	
	<!-- Use checkboxes for job types -->
	<tr>
	<td><label for="type" class="QuestionsLabel"> &nbsp;&nbsp;&nbsp;Job Types </label></td>
	<td><input type="checkbox" name="type[]" id="type" style="font-size: 18px;" value="Full-time"> Full-time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="type[]" id="type" style="font-size: 18px;" value="Part-time"> Part-time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="type[]" id="type" style="font-size: 18px;" value="Internship"> Internship </td></tr>
	<tr></tr>
	
	<!-- Use radio buttons for current employment status -->
	<tr>
	<td><label for="status" class="QuestionsLabel"> &nbsp;&nbsp;&nbsp;Current Status </label></td>
	<td><input type="radio" name="status" id="status" style="font-size: 18px;" value="Employed" > Employed &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="status" id="status" style="font-size: 18px;" value="Self-Employed" > Self-Employed &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="status" id="status" style="font-size: 18px;" value="Unemployed" > Unemployed &nbsp;&nbsp;&nbsp;&nbsp;
	<input type="radio" name="status" id="status" style="font-size: 18px;" value="Student" > Student </td></tr>

	<tr><td colspan="2"><p class="titles"><br></p></td></tr>
	<tr><td colspan="2" align="center" ><input type="submit" value="Submit" style="font-size: 20px; background-color: orange; color: white;"></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
	</table></form><br><br>
	

	
	<!-- ------------------------------- -->
	<!-- ----The output form----- -->
	<!-- ------------------------------- -->
	
	
	<!-- Use a table to display user's input -->	
	<table align='center' bgcolor="Lavender" cellpadding="5" style="width:850px">
	
	<!-- Display a success or failure message to the user -->
	<tr><td colspan="2" align="center"> 
		<span style="font-size: 20px; color: MediumVioletRed; font-weight: bold; font-family: Verdana, sans-serif;">
		<?php if (isset($_POST["email"]) && $no_mistake == TRUE){ echo "<br>Success!<br>Your application form is completely with valid data.";}
		else if ($no_mistake == FALSE) { echo "<br>Oops...<br>You may have entered an invalid data.";}?></span></td></tr>
	
	<!-- Form title -->
	<tr><td colspan="2" align='center' > <p class="titlesResult"> Your Application Form </p></td></tr>
	<tr><td colspan="2"> <span style="color: #b30401;">&nbsp;&nbsp;* Indicates required fields.</span></td></tr>
	
	<!-- Display all the data entered by the user -->
	<tr><td><label for="name" class="QuestionsLabel"><span style="color: #b30401;">*</span> Name </label></td>
		<td><?php if (isset($_POST["name"])) {
					foreach ($name as $n) {echo $n."&nbsp;&nbsp;";}}?>
			<span style="color: #b30401;"><?php  echo $nameErr;?></span></td></tr>
	
	<tr><td><label for="bdate" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Birthdate  </label></td>
		<td><?php echo $bdate;?><span style="color: #b30401;"><?php  echo $bdateErr;?></span></td></tr>
	
	<tr><td><label for="gender" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Gender </label></td>
		<td><?php echo $gender;?></td></tr>
	
	<tr><td><label for="edu" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Education </label></td>
		<td><?php echo $edu;?></td></tr>

	<tr><td><label for="address" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Street Address </label></td>
		<td><?php echo $address;?><span style="color: #b30401;"><?php  echo $addressErr;?></span></td></tr>

	<tr><td><label for="city" class="QuestionsLabel"><span style="color: #b30401;">*</span>  City </label></td>
		<td><?php echo $city;?><span style="color: #b30401;"><?php  echo $cityErr;?></span></td></tr>
		
	<tr><td><label for="state" class="QuestionsLabel"><span style="color: #b30401;">*</span>  State </label></td>
		<td><?php echo $state;?></td></tr>
		
	<tr><td><label for="zip" class="QuestionsLabel"><span style="color: #b30401;">*</span>  Zip Code </label></td>
		<td><?php echo $zip;?><span style="color: #b30401;"><?php  echo $zipErr;?></span></td></tr>
	
	<tr><td><label for="phonenum" class="QuestionsLabel"><span style="color: #b30401;">*</span> Phone Number &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
		<td><?php echo $phonenum;?><span style="color: #b30401;"><?php  echo $phonenumErr;?></span></td></tr>
	
	<tr><td><label for="email" class="QuestionsLabel"><span style="color: #b30401;">*</span> Email  </label></td>
		<td><?php echo $email;?><span style="color: #b30401;"><?php  echo $emailErr;?></span></td></tr>	

	<tr><td><label for="type" class="QuestionsLabel"> &nbsp;&nbsp;&nbsp;Job Types </label></td>
		<td><?php if (isset($_POST["type"])) {
			         	foreach ($type as $t) {echo $t."&nbsp;&nbsp;&nbsp;";}}
			         	else {echo $type;}?></td></tr>
		
	<tr><td><label for="status" class="QuestionsLabel"> &nbsp;&nbsp;&nbsp;Current Status </label></td>
		<td><?php echo $status;?></td></tr>
	
	<!-- "Clear My Form" button and "Homework Page" button -->	
	<tr><td colspan="2"><p class="titlesResult"><br></p></td></tr>
	<tr><td align="center"><form action="" >
		<input type=submit value="Clear My Form" style="font-size: 20px; background-color: MediumVioletRed; color: white;"></form></td>	
		<td align="center"><form action="http://studentprojects.sis.pitt.edu/fall2016/zhz90/homework.html" >
		<input type=submit value="Homework Page" style="font-size: 20px; background-color: MediumVioletRed; color: white; "></form></td></tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
	
	</table>		

</body>
</html>