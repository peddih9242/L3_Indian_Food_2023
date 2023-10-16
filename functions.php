<?php 

// function to 'clean' data
function clean_input($dbconnect, $data) {
	$data = trim($data);	
	$data = htmlspecialchars($data); //  needed for correct special character rendering
	// remove dodgy characters to prevent SQL injections
	$data = mysqli_real_escape_string($dbconnect, $data);
	return $data;
}

function get_data($dbconnect, $more_condition=null) {

	$find_sql = "SELECT * FROM food

	JOIN course ON food.Course_ID = course.Course_ID
	JOIN diet ON food.Diet_ID = diet.Diet_ID
	JOIN flavor ON food.Flavor_ID = flavor.Flavor_ID
	JOIN states ON food.State_ID = states.State_ID

	";
	
	// if we have a WHERE condition, add it to the sql
	if($more_condition != null) {
		// add extra string onto sql
		$find_sql .= $more_condition;
	}
	
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_count = mysqli_num_rows($find_query);
	
	return $find_query_count = array($find_query, $find_count);
	}


?>