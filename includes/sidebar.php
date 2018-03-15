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

                <div class="well">
                    <h4>Login</h4>
                <form action="includes/login.php" method="post">

                    <div class="form-group">
                    <!-- <label for="username">Username</label> -->
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="input-group">
                    <!-- <label for="password">Password</label> -->
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">
                                Login
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
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id']; ?>

                                <li><a href="category.php?category=<?php echo $cat_id ?>"><?php echo $cat_title ?></a>
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
