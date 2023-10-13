<?php

$find_sql = "SELECT * FROM food

JOIN course ON food.Course_ID = course.Course_ID
JOIN diet ON food.Diet_ID = diet.Diet_ID
JOIN flavor ON food.Flavor_ID = flavor.Flavor_ID
JOIN states ON food.State_ID = states.State_ID

";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);
$find_count = mysqli_num_rows($find_query);

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

    $heading= "<h2>$diet Foods ($find_count $result_s)";

}

elseif ($heading_type == "flavor") {

    $heading= "<h2>$flavor Foods ($find_count $result_s)";

}

elseif ($heading_type == "state") {

    $title_state = ucwords($state_name);
    $heading = "<h2>$title_state Foods ($find_count $result_s)</h2>";
}

elseif ($heading_type == "food_success") {
    $heading = "<h2>Insert Food Success</h2>
    <p>You have inserted the following quote...</p>";
}

elseif ($heading_type == "edit_success") {
    $heading = "<h2>Edit Food Sucess</h2>
    <p>You have edited the quote. The entry is now...</p>";
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
            <a href="index.php?page=all_results&search=diet&Diet_ID=<?php echo $diet_ID ?>"><?php echo $diet ?></a> - <a href="index.php?page=all_results&search=course&Course_ID=<?php echo $course_ID ?>"><?php echo $course ?></a>
        </p>


        <?php if ($flavor != "-1") { ?>
        <p>
            <a href="index.php?page=all_results&search=flavor&Flavor_ID=<?php echo $flavor_ID ?>"><?php echo $flavor ?></a>
        </p>

        <?php

        }

        ?>

        <?php if ($state != "-1") { ?>
        <p>
        <a href="index.php?page=all_results&search=state&State_ID=<?php echo $state_ID ?>"><?php echo $state ?></a>
        </p>

        <?php
        
        }
        
        ?>

        <?php 
        
        // if user is logged in, show edit / delete options

        if (isset($_SESSION['admin'])) {

            ?>

            <!-- add delete and edit icons here -->

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