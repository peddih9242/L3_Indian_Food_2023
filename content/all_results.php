<?php

// retrieve search type
$search_type = $_REQUEST['search'];

if ($search_type == "all") {
    $heading = "All Foods";
    $sql_conditions = "";
}
elseif ($search_type == "recent") {
    $heading = "Recent Foods";
    $sql_conditions = "ORDER BY q.ID DESC LIMIT 10";
}
elseif ($search_type == "random") {
    $heading = "Random Foods";
    $sql_conditions = "ORDER BY RAND() LIMIT 10";
}

// edit below code later
elseif ($search_type == "diet") {
    
    // retrieve author ID
    $diet = $_REQUEST['Diet'];

    $heading = "";
    $heading_type = "diet";

    $sql_conditions = "WHERE diet.Diet LIKE '$diet'";
}

elseif ($search_type == "flavor") {
    // retrieve subject ID
    $flavor = $_REQUEST['Flavor'];

    $heading = "";
    $heading_type = "flavor";

    $sql_conditions = "WHERE flavor.Flavor LIKE '$flavor'";
}

elseif ($search_type == "state") {
    // retrieve subject ID
    $state_name = $_REQUEST['State'];

    $heading = "";
    $heading_type = "state";

    $sql_conditions = "WHERE states.State LIKE '$state_name'";
}

else {
    $heading = "No Results";
    $sql_conditions = "WHERE q.ID = 1000";
}

include("results.php");

?>