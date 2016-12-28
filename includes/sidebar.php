<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" name="submit" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>



                <!-- Blog Categories Well -->
                <div class="well">

                <?php
                // Selects all category titles from db
                $query = "SELECT * FROM categories";  // Add LIMIT at end to set max limit
                $select_cat_sidebar = mysqli_query($connection, $query);
                
                ?>


                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                                // Loops through category titles and returns all and displays as links
                                while($row = mysqli_fetch_assoc($select_cat_sidebar)){
                                    $cat_title = $row['cat_title'];

                                    echo "<li><a href='#'>{$cat_title}</a></li>";
                                }
                                
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php
                include "widget.php";
                ?>

            </div>