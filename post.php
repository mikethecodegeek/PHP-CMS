<?php 
require "path.php";
include $path . "header.php";


if (isset($_POST['publish'])) {
    
            // $post_id = $_POST['post_id'];
            // $author = $_POST['post_author'];
            // $email = $_POST['post_email'];
            // $status = $_POST['post_status'];
    
            $post_id = $_GET['id'];
            $author = $_POST['comment_author'];
            $email = $_POST['comment_email'];
            $status = 'pending';
    
            $content = $_POST['comment_content'];
            $date = date('d-m-y');
    
    
            $insert = "INSERT INTO comments VALUES(NULL,$post_id, '$author', '$email', '$content','$status',now() )";
            $publish = mysqli_query($connection, $insert);
    
            if (!$publish) {
                die(mysqli_error($connection));
            }

            $comment_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
            $update_count = mysqli_query($connection, $comment_count);
    
            // header('Location: comments.php');
    
    
        }


?>


<body>

    
    <?php include $path . "nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                
                <?php 
                
                if (isset($_GET['id'])) {
                    $view_post_id = $_GET['id'];
                }

                $query = "SELECT * FROM posts WHERE post_id = $view_post_id";
                $posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($posts)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                }
                
                ?>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post_content ?></p>
                <hr>

                <!-- Blog Comments -->


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="comment_author">Your Name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="comment_email">Your Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>


                        <div class="form-group">
                        <label for="comment_content">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <input id="comment" type="submit" class="btn btn-primary" name="publish" value="Publish">
                        <!-- <input type="submit" class="btn btn-primary" name="publish" value="publish">Submit</input> -->
                    </form>
                </div>

             
                <hr>

                <!-- Posted Comments -->
                <?php 
                
                $comment_query = "SELECT * FROM comments WHERE comment_post_id = $view_post_id AND comment_status='approved'";
                $comments = mysqli_query($connection, $comment_query);

                while($row = mysqli_fetch_assoc($comments)) {
                    // print_r($row);
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                
                
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                       <?php echo $comment_content ?>
                    </div>
                </div>
            
                <?php } ?>
              

            </div>








            <?php include $path . 'sidebar.php'; ?>

           
        </div>
        <!-- /.row -->

        <hr>

       <?php include $path . "footer.php" ?>

   






