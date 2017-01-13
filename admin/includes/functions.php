<?php
// --------- Insert Query ---------
function insert_categories(){
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

// --------- Finds All categories Query ---------
function find_all_categories(){
	global $connection;

	// Selects all category titles from db
	$query = "SELECT * FROM categories";  // Add LIMIT at end to set max limit
	$select_categories = mysqli_query($connection, $query);


	// Loops through category title/id and displays in table
	while($row = mysqli_fetch_assoc($select_categories)){
	    $cat_id = $row['cat_id'];
	    $cat_title = $row['cat_title'];

	    echo "<tr>";
	    echo "<td>{$cat_id}</td>";
	    echo "<td>{$cat_title}</td>";
	    echo "<td><a href='categories.php?delete={$cat_id}' class='text-center'>Delete</a></td>";
	    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
	    echo "</tr>";
	}
}

// --------- Delete query ---------
function delete_category(){
	global $connection;
	if(isset($_GET['delete'])){
	    $the_cat_id = $_GET['delete'];

	    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
	    $delete_query = mysqli_query($connection, $query);
	    // Refreshes page
	    header("Location: categories.php");
	}
}

?>