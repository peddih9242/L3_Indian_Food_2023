<?php
// retrieve data from form
    $name = $_REQUEST['name'];

    $diet = $_REQUEST['diet'];
    $course = $_REQUEST['course'];
    $flavor = $_REQUEST['flavor'];
    $state = $_REQUEST['state'];

    // handle blank fields
    if ($flavor == "") {
        $flavor = "-1";
    }

    if ($state == "") {
        $state = "-1";
    }

    // checks if state is in DB, if not then adds to DB
    
    // statement to insert subject/s
    $stmt = $dbconnect -> prepare("INSERT INTO `states` (`State`)
    VALUES (?);");

    $state = get_search_ID($dbconnect, $subject);

    if ($state == "no results") {
        
        // insert the subject
        $stmt -> bind_param("s", $state);
        $stmt -> execute();

        // retrieve subject ID
        $stateID = $dbconnect -> insert_id;
    }

    $stmt -> close();

?>