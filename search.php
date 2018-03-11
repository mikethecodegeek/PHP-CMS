<?php 
require "path.php";
include $path . "header.php";


?>


<body>

    
    <?php include $path . "nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $search_query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    if (!$search_query) {
                        die("Query Failed " . mysqli_error($connection));
                    }

                    $search_results = mysqli_query($connection, $search_query);
                    $results_count = mysqli_num_rows($search_results);
                        if ($results_count == 0) {
                            echo "<h1> No Result </h1>";
                            echo "<a href='index.php'>Return to Home </a>";
                        } else {
                            
                            while($row = mysqli_fetch_assoc($search_results)) {
                                  
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                ?>    

           

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  

                <?php 
                            }
                    }    
            } 
            ?>       
            </div>

            <?php include $path . 'sidebar.php'; ?>

           
        </div>
        <!-- /.row -->

        <hr>

       <?php include $path . "footer.php" ?>

   
