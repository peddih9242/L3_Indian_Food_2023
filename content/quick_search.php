<?php

// retrieve search type...
$search_type = clean_input($dbconnect, $_REQUEST['search_type']);
$search_term = clean_input($dbconnect, $_REQUEST['quick_search']);

// set up searches...
$name_search = "food.Name LIKE '%$search_term%'";

$flavor_search = "flavor.Flavor LIKE '%$search_term%'";

$course_search = "course.Course LIKE '%$search_term%'";

$diet_search = "diet.Diet LIKE '%$search_term%'";

$states_search = "states.State LIKE '%$search_term%'";

if ($search_type == "name") {
    $sql_conditions = "WHERE $name_search";
}

elseif ($search_type == "flavor") {
    // author doesn't work at the moment
    $sql_conditions = "WHERE $flavor_search";
}

elseif ($search_type == "course") {
    $sql_conditions = "WHERE $course_search";
}

elseif ($search_type == "flavor") {
    $sql_conditions = "WHERE $flavor_search";
}

elseif ($search_type == "diet") {
    $sql_conditions = "WHERE $diet_search";
}

else {
    $sql_conditions = "WHERE $name_search
                        OR $flavor_search
                        OR $course_search
                        OR $diet_search
                        OR $states_search";
}

$heading = "'$search_term' Foods";

include("results.php");

?>