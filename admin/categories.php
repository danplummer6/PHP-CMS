<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                            <small>Add New Category</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <div class="col-md-6">

<?php

// --------- Insert Query ---------

if (isset($_POST['submit'])){

    $cat_title = $_POST['cat_title'];

    // Checks if field is left blank

    if($cat_title == "" || empty($cat_title)){
        // This will display if field is blank
        echo "Category field can not be empty";
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
?>
                    <!-- ADD FORM -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input type="text" name="cat_title" class="form-control">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <?php
                    if(isset($_GET['edit'])){
                        $cat_id = $_GET['edit'];
                        include "includes/update_categories.php";
                    }
                    ?>
                </div>

                <div class="col-md-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
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
    
?>


<?php
// --------- Delete query ---------
if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    // Refreshes page
    header("Location: categories.php");
}
?>

                        </tbody>
                    </table>
                </div>



            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include "includes/admin_footer.php"; ?>
