<?php

// retrieve search type
$search_type = $_REQUEST['search'];

if ($search_type == "all") {

    $sql_conditions = "SELECT * FROM `Food`";
    $heading_type = "";

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