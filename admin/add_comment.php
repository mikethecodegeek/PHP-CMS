<?php 

require "path.php";
include $path . "header.php";

    if (isset($_POST['publish'])) {

        // $post_id = $_POST['post_id'];
        // $author = $_POST['post_author'];
        // $email = $_POST['post_email'];
        // $status = $_POST['post_status'];

        $post_id = 1;
        $author = 'Mike';
        $email = 'mike@gmail.com';
        $status = 'approved';

        $content = $_POST['comment_content'];
        $date = date('d-m-y');


        $insert = "INSERT INTO comments VALUES(NULL,$post_id, '$author', '$email', '$content','$status',now() )";
        $publish = mysqli_query($connection, $insert);

        if (!$publish) {
            die(mysqli_error($connection));
        }

        // header('Location: comments.php');

        echo "Thanks for your comment";

    }

?>


<!-- 
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">ID of Post</label>
<input type="text" class="form-control" name="post_id">
</div>


<div class="form-group">
<label for="title">Author</label>
<input type="text" class="form-control" name="comment_author">
</div>

<div class="form-group">
<label for="title">Author Email</label>
<input type="text" class="form-control" name="comment_email">
</div>


<div class="form-group">
<label for="title">Comment</label>
<input type="text" class="form-control" name="coment_content">
</div>

<div class="form-group">
<label for="title">Status</label>
<input type="text" class="form-control" name="comment_status">
</div>



<div class="form-group">
<input type="submit" class="btn btn-primary" name="publish" value="Publish">
</div>

</form> -->