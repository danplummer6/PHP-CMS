<?php

// Should check for query error and display error(doesnt work - video 110)
function confirmQuery($result){

	global $connection;

	if(!$result){
		die("Query Failed Bro. " . mysqli_error($connection));
	}
}


function insert_categories(){
	// --------- Insert Query ---------

	global $connection;

	if (isset($_POST['submit'])){

	    $cat_title = $_POST['cat_title'];

	    // Checks if field is left blank

	    if($cat_title == "" || empty($cat_title)){
	        // This will display if field is blank
	        echo "<div class='alert alert-danger' role='alert'>Category field can not be empty</div>";
	    }else{

	        // If field is not blank, new cat will be inserted into db/
	        $query = "INSERT INTO categories(cat_title) ";
	        $query .= "VALUE('{$cat_title}') ";

	        $create_category_query = mysqli_query($connection, $query);

	        // If query fails
	        if(!$create_category_query){
	            die('query failed' . mysqli_error($connection));
	        }
	    }
	}
}

?>