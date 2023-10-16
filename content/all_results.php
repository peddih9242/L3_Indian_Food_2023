<?php

// retrieve search type
$search_type = $_REQUEST['search'];

if ($search_type == "all") {
    $heading = "All Foods";
    $sql_conditions = "";
}
elseif ($search_type == "recent") {
    $heading = "Recent Foods";
    $sql_conditions = "ORDER BY food.ID DESC LIMIT 10";
}
elseif ($search_type == "random") {
    $heading = "Random Foods";
    $sql_conditions = "ORDER BY RAND() LIMIT 10";
}

// edit below code later
elseif ($search_type == "diet") {
    
    // retrieve author ID
    $diet_ID = $_REQUEST['Diet_ID'];

    $heading = "";
    $heading_type = "diet";

    $sql_conditions = "WHERE food.Diet_ID LIKE '$diet_ID'";
}

elseif ($search_type == "flavor") {
    // retrieve subject ID
    $flavor_ID = $_REQUEST['Flavor_ID'];

    $heading = "";
    $heading_type = "flavor";

    $sql_conditions = "WHERE food.Flavor_ID LIKE '$flavor_ID'";
}

elseif ($search_type == "state") {
    // retrieve subject ID
    $state_ID = $_REQUEST['State_ID'];

    $heading = "";
    $heading_type = "state";

    $sql_conditions = "WHERE food.State_ID LIKE '$state_ID'";
}

elseif ($search_type == "course") {

    $course_ID = $_REQUEST['Course_ID'];
    $heading = "";
    $heading_type = "course";
    
    $sql_conditions = "WHERE food.Course_ID LIKE '$course_ID'";
}

else {
    $heading = "No Results";
    $sql_conditions = "WHERE q.ID = 1000";
}

include("results.php");

?>