<!-- db connect -->
<?php include "includes/db.php"; ?>
<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];

                    // Searches through each posts post_tags in db and displays relevant search results.
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);

                    if(!$search_query){
                        die("Query Failed" . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);

                    // If there are no matching tag words
                    if($count == 0){
                        echo "<h1>No Results</h1>";
                    }else{
                    
                    // if matching tag words, Returns relevant search results from posts post_tags
                    while($row = mysqli_fetch_assoc($search_query)){
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author'];
                           $post_date = $row['post_date'];
                           $post_image = $row['post_image'];
                           $post_content = $row['post_content'];
                    ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content;?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        

                    <?php
                    // Closes above loop
                        }
                    
                        }
                    }

                    ?>



                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

<!-- Footer -->
<?php include "includes/footer.php"; ?>