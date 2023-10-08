<?php

// retrieve search type
$search_type = $_REQUEST['search'];

if ($search_type == "all") {

    $find_sql = "SELECT
    
    f.*,
    
    FROM food f

    JOIN Course c ON c.Course_ID = f.Course_ID
    JOIN Diet d ON d.Diet_ID = f.Diet_ID
    JOIN Flavor v ON v.Flavor_ID = f.Flavor_ID
    JOIN States s ON s.State_ID = f.State_ID

    ";
    $find_query = mysqli_query($find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $find_count = mysqli_num_rows($find_query);

}

elseif ($search_type == "recent") {

    $sql_conditions = "";
    $heading_type = "";

}

elseif ($search_type == "random") {

    $sql_conditions = "";
    $heading_type = "";

}

include("results.php");

?>