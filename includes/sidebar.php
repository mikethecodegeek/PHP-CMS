 <!-- Blog Sidebar Widgets Column -->
 <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">


                <form action="search.php" method="post">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                
                </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                            <?php 
                    
                            $query = "SELECT * FROM categories";
                            $categories = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($categories)) {
                                $cat_title = $row['cat_title']; ?>
                                <li><a href="#"><?php echo $cat_title ?></a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                       
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
