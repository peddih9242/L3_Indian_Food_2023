<?php
// check user is logged on
if (isset($_SESSION['admin'])) {

// retrieve subjects and authors to populate combo box
// include("sub_author.php");

// retrieve current values for quote
$ID = $_REQUEST['ID'];

// get values from DB
$edit_query = get_data($dbconnect, "WHERE food.ID = $ID");

$edit_results_query = $edit_query[0];
$edit_results_rs = mysqli_fetch_assoc($edit_results_query);

$diet_ID = $edit_results_rs['Diet_ID'];
$flavor_ID = $edit_results_rs['Flavor_ID'];
$food = $edit_results_rs['Name'];
$course_ID = $edit_results_rs['Course_ID'];
$state_ID = $edit_results_rs['State_ID'];

?>

<div class="admin-form">
    <h1>Edit a Quote</h1>

    <form action="index.php?page=../admin/change_quote&ID=<?php echo $ID ?>&authorID=<?php echo $author_ID ?>" method="post">
        <p><textarea name="food" placeholder="Food (required)" required><?php echo $food ?></textarea></p>
        
        <div class="important">
            If you edit a food, it will change the author name for the quote being edited. It does not edit the author name on all quotes attributed to that author.
        </div>

        <br />
        
        <select name="diet" id="diet" placeholder="Diet (required)" required >

        <option value="" disabled selected>Diet</option>

        <!-- get options from database -->

        <?php 

        $diet_sql = "SELECT * FROM `diet`
        WHERE `Diet_ID` ORDER BY `Diet` ASC
        ";
        $diet_query = mysqli_query($dbconnect, $diet_sql);
        $diet_rs = mysqli_fetch_assoc($diet_query);

        do {
            ?>
            <option value="<?php echo $diet_rs['Diet_ID']; ?>"><?php echo $diet_rs['Diet']; ?></option>

        <?php
        }

        while($diet_rs=mysqli_fetch_assoc($diet_query))

        ?>

        </select>

        <select name="course" id="course" placeholder="Course (required)" required >

        <option value="" disabled selected>Course</option>

        <?php 

        $course_sql = "SELECT * FROM `course`
        WHERE `Course_ID` ORDER BY `Course` ASC
        ";
        $course_query = mysqli_query($dbconnect, $course_sql);
        $course_rs = mysqli_fetch_assoc($course_query);

        do {
            ?>
            <option value="<?php echo $course_rs['Course_ID']; ?>"><?php echo $course_rs['Course']; ?></option>

        <?php
        }

        while($course_rs=mysqli_fetch_assoc($course_query))

        ?>

        </select>

        <select name="flavor" id="flavor" placeholder="Flavor" required>

        <option value="" disabled selected>Flavor</option>

        <?php 

        $flavor_sql = "SELECT * FROM `flavor`
        WHERE `Flavor_ID` NOT LIKE '1' ORDER BY `Flavor` ASC
        ";
        $flavor_query = mysqli_query($dbconnect, $flavor_sql);
        $flavor_rs = mysqli_fetch_assoc($flavor_query);

        do {
            ?>
            <option value="<?php echo $flavor_rs['Flavor_ID']; ?>"><?php echo $flavor_rs['Flavor']; ?></option>

        <?php
        }

        while($flavor_rs=mysqli_fetch_assoc($flavor_query))

        ?>

        </select>

        <br /><br />

        <div class="autocomplete">
            <input name="state" id="state" value="<?php echo $state_ID ?>" />
        </div>

        <br /><br />

        <input class="form-submit" type="submit" name="submit" value="Edit Food" />
    </form>

    <script>
        <?php include ("autocomplete.php") ?>

        // Arrays containing lists
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