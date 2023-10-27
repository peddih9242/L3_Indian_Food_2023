<?php

$all_results = get_data($dbconnect, $sql_conditions);

$find_query = $all_results[0];
$find_count = $all_results[1];

if($find_count == 1) {
    $result_s = "Result";
}
else{
    $result_s = "Results";
}

// check if we have results
if ($find_count > 0) {

if ($heading != "") {
$heading = "<h2>$heading ($find_count $result_s)</h2>";
}

elseif ($heading_type == "diet") {

    $diet_name = ucwords($_REQUEST['diet']);
    $heading = "<h2>$diet_name Foods ($find_count $result_s)</h2>";

}

elseif ($heading_type == "flavor") {

    $flavor_name = ucwords($_REQUEST['flavor']);
    $heading = "<h2>$flavor_name Foods ($find_count $result_s)</h2>";

}

elseif ($heading_type == "state") {

    $title_state = ucwords($_REQUEST['state']);
    $heading = "<h2>$title_state Foods ($find_count $result_s)</h2>";
}

elseif ($heading_type == "course") {

    $course_name = ucwords($_REQUEST['course']);
    $heading = "<h2>$course_name Foods ($find_count $result_s)</h2>";
}

elseif ($heading_type == "food_success") {
    $heading = "<h2>Insert Food Success</h2>
    <p>You have inserted the following food...</p>";
}

elseif ($heading_type == "edit_success") {
    $heading = "<h2>Edit Food Sucess</h2>
    <p>You have edited the food. The entry is now...</p>";
}

elseif ($heading_type == "delete_food") {
    $heading = "<h2>Delete Food - Are you sure?</h2>
    <p>
    Do you really want to delete the food in the box below?
    </p>";
}

echo $heading;

while($find_rs = mysqli_fetch_assoc($find_query)) {

    $food = $find_rs['Name'];
    $ID = $find_rs['ID'];
    
    $diet_ID = $find_rs['Diet_ID'];
    $diet = ucwords($find_rs['Diet']);

    $course_ID = $find_rs['Course_ID'];
    $course = ucwords($find_rs['Course']);

    $flavor_ID = $find_rs['Flavor_ID'];
    $flavor = ucwords($find_rs['Flavor']);

    $state_ID = $find_rs['State_ID'];
    $state = $find_rs['State'];

    ?>

    <div class="results">
        <h3><?php echo $food ?></h3>

        <p>
            <a href="index.php?page=all_results&search=diet&Diet_ID=<?php echo $diet_ID ?>&diet=<?php echo $diet ?>"><?php echo $diet ?></a> - <a href="index.php?page=all_results&search=course&Course_ID=<?php echo $course_ID ?>&course=<?php echo $course ?>"><?php echo $course ?></a>
        </p>


        <?php if ($flavor != "-1") { ?>
        <p>
            <a href="index.php?page=all_results&search=flavor&Flavor_ID=<?php echo $flavor_ID ?>&flavor=<?php echo $flavor ?>"><?php echo $flavor ?></a>
        </p>

        <?php

        }

        ?>

        <?php if ($state != "-1") { ?>
        <p>
        <a href="index.php?page=all_results&search=state&State_ID=<?php echo $state_ID ?>&state=<?php echo $state ?>"><?php echo $state ?></a>
        </p>

        <?php
        
        }
        
        ?>

        <?php 
        
        // if user is logged in, show edit / delete options

        if (isset($_SESSION['admin'])) {

            ?>

            <div class="tools">
                <a href="index.php?page=../admin/editfood&ID=<?php echo $ID ?>"><i class="fa fa-edit fa-2x"></i></a> &nbsp;&nbsp;
                <a href="index.php?page=../admin/deleteconfirm&ID=<?php echo $ID ?>"><i class="fa fa-trash fa-2x"></i></a>
            </div>

            <?php

        }

        ?>
    </div>
    <br/>

    <?php
}

}

// if there are no results, show error message
else {
    ?>

    <h2>Sorry!</h2>

    <div class="no-results">Unfortunately - there were no results for your search. Please try again.</div>

    <?php
} // end of no results else

?>