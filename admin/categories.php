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
                
                <?php insert_categories(); ?>

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
                    // Update Query with include
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

                        <?php find_all_categories();?>


                        <?php delete_category();?>

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
