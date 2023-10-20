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
            <input name="state" id="state" placeholder="State" />
        </div>

        <br /><br />

        <input class="form-submit" type="submit" name="submit" value="Submit Food" />
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