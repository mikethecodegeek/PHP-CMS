
<?php 
  if (isset($_POST['edit_comment'])) {
      $comment_to_edit = $_GET['edit'];
      $comment_author = $_POST['comment_author'];
      $date = date('d-m-y');
      $comment_content = $_POST['comment_content'];
      $comment_status = $_POST['comment_status'];
      $comment_email = $_POST['comment_email'];
    
     
     $edit_comment = "UPDATE comments SET comment_author='$comment_author', comment_email='$comment_email',
     comment_content='$comment_content', comment_status='$comment_status', 
     comment_date=now() WHERE comment_id = $comment_to_edit";
    
    $edit_query = mysqli_query($connection, $edit_comment);
    
    if (!$edit_query) {
        die('Error' . mysqli_error($connection));
    } 
      header('Location: comments.php');

  }  
?>


<form action="" method="post" enctype="multipart/form-data">

     <?php
                $comment_to_edit = $_GET['edit'];
                $query = "SELECT * FROM comments WHERE comment_id = $comment_to_edit ";
                $post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($post)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];

            ?>         
                          


<div class="form-group">
<label for="title">Comment Author</label>
<input type="text" class="form-control" name="comment_author" value="<?php echo $comment_author;?>">
</div>

<div class="form-group">
<label for="title">Comment Status</label>
<input type="text" class="form-control" name="comment_status" value="<?php echo $comment_status;?>">
</div>

<div class="form-group">
<label for="title">Author Email</label>
<input type="text" class="form-control" name="comment_email" value="<?php echo $comment_email;?>">
</div>


<div class="form-group">
<label for="title">Comment</label>
<input type="text" class="form-control" name="comment_content" value="<?php echo $comment_content;?>">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_comment" value="Edit Post">
</div>

                <?php } ?>
</form>