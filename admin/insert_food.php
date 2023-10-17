<?php

// check if user is logged on
if (isset($_SESSION['admin'])) {
    
    if(isset($_REQUEST['submit'])) {

    include("process_form.php");

// add quote to DB
$stmt = $dbconnect -> prepare("INSERT INTO `food` (`Name`, `Diet_ID`, `Flavor_ID`, `Course_ID`, `State_ID`) VALUES (?, ?, ?, ?, ?);");
$stmt -> bind_param("siiii", $name, $diet_ID, $flavor_ID, $course_ID, $state_ID);
$stmt -> execute();

$food_ID = $dbconnect -> insert_id;

// close stmt once everything has been inserted
$stmt -> close();

$heading = "";
$heading_type = "food_success";
$sql_conditions = "WHERE `ID` = $food_ID";

include("content/results.php");

} // submit if

} // end user is logged on if

else{
    $login_error = "Please login to access this page";
    header("Location: index.php?page=../admin/login&error=$login_error");
}
?>