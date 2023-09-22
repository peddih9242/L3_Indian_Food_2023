<?php

// retrieve search type
$search_type = $_REQUEST['search'];

if ($search_type == "all") {

    $find_sql = "SELECT
    
    f.*,
    

    ";

}

elseif ($search_type == "recent") {

    $sql_conditions = "";
    $heading_type = "";

}

elseif ($search_type == "random") {

    $sql_conditions = "";
    $heading_type = "";

}

?>