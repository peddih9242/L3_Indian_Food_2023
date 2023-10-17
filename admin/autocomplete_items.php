<?php

// get all diets from database
$all_diets_sql = "SELECT * FROM `diet` ORDER BY Diet ASC";
$all_diets = autocomplete_list($dbconnect, $all_diets_sql, 'Diet');

// get all courses from database
$all_courses_sql = "SELECT * FROM `course` ORDER BY Course ASC";
$all_courses = autocomplete_list($dbconnect, $all_courses_sql, 'Course');

// get all flavors from database
$all_flavors_sql = "SELECT * FROM `flavor` ORDER BY Flavor ASC";
$all_flavors = autocomplete_list($dbconnect, $all_flavors_sql, 'Flavor');

// get all states from database
$all_states_sql = "SELECT * FROM `states` ORDER BY State ASC";
$all_states = autocomplete_list($dbconnect, $all_states_sql, 'State');


// // initialise subject variables
// $tag_1 = "";
// $tag_2 = "";
// $tag_3 = "";

// // initialise tag IDs
// $tag_1_ID = $tag_2_ID = $tag_3_ID = 0;

// // get author full name from database
// $author_full_sql = "SELECT *, CONCAT(First, ' ', Middle, ' ', Last) AS Full_Name FROM author";
// $all_authors = autocomplete_list($dbconnect, $author_full_sql, 'Full_Name');

?>