<?php
// retrieve data from form
    $name = $_REQUEST['name'];

    $diet_ID = $_REQUEST['diet'];
    $course_ID = $_REQUEST['course'];
    $flavor_ID = $_REQUEST['flavor'];
    $state = $_REQUEST['state'];

    // checks if state is in DB, if not then adds to DB
    
    // statement to insert state
    $stmt = $dbconnect -> prepare("INSERT INTO `states` (`State`)
    VALUES (?);");

    $state_ID = get_search_ID($dbconnect, $state);

    if ($state_ID == "no results") {
        
        // insert the subject
        $stmt -> bind_param("s", $state);
        $stmt -> execute();

        // retrieve state ID
        $state_ID = $dbconnect -> insert_id;

    }

    $stmt -> close();

?>