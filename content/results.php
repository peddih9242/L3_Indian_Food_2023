<h2>All Results</h2>

<div class="results"></div>

<?php

$find_sql = "SELECT
    
f.*,
c.*,
d.*,
v.*,
s.*,

FROM Food f

JOIN Course c ON f.Course_ID = c.Course_ID
JOIN Diet d ON f.Diet_ID = d.Diet_ID
JOIN Flavor v ON f.Flavor_ID = v.Flavor_ID
JOIN States s ON f.State_ID = s.State_ID

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

elseif ($heading_type == "") {
    // retrieve author name
    $author_rs = get_item_name($dbconnect, "author", "Author_ID", $author_ID);

    $heading= "";

}

elseif ($heading_type == "state") {

    $title_state = ucwords($state);
    $heading = "<h2>$title_state Quotes ($find_count $result_s)</h2>";
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

    $food = $find_rs['Food'];
    $ID = $find_rs['ID'];

    ?>

    <div class="results">
        <?php echo $food ?>

        <p><i>
            <!-- <a href="index.php?page=all_results&search=author&Author_ID=<?php echo $author_ID ?>"> </a> -->
        </i></p>

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