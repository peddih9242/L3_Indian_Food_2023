<?php
// check user is logged on
if (isset($_SESSION['admin'])) {

// retrieve subjects and authors to populate combo box
include("autocomplete_items.php");

?>

<h2>Add Food</h2>

<div class="admin-form">
    <h1>Add a Food</h1>

    <form action="index.php?page=../admin/insert_food" method="post">

        <input name="name" placeholder="Name (required)" required />
        
        <div class="autocomplete">
            <input name="diet" id="diet" placeholder="Diet (required)" required /></p>
        </div>
        
        <div class="autocomplete">
            <input name="course" id="course" placeholder="Course (required)" required /></p>
        </div>

        <div class="autocomplete">
            <input name="flavor" id="flavor" placeholder="Flavor" />
        </div>

        <br /><br />

        <div class="autocomplete">
            <input name="state" id="state" placeholder="State" />
        </div>

        <br /><br />

        <input class="form-submit" type="submit" name="submit" value="Submit Food" />
    </form>

    <script>
        <?php include ("autocomplete.php") ?>

        // Arrays containing lists
        var all_diet = <?php print("$all_diets") ?>;
        autocomplete(document.getElementById("diet"), all_diet);

        var all_course = <?php print("$all_courses") ?>;
        autocomplete(document.getElementById("course"), all_course)

        var all_flavor = <?php print ("$all_flavors") ?>;
        autocomplete(document.getElementById("flavor"), all_flavor)

        var all_state = <?php print("$all_states") ?>;
        autocomplete(document.getElementById("state"), all_state)

    </script>

</div>

<?php
} // end user is logged on if

else{
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
}
?>