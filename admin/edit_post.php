
<?php 
  if (isset($_POST['edit_post'])) {
      $post_to_edit = $_GET['edit'];
      $post_category = $_POST['post_cat_id'];
      $post_title = $_POST['post_title'];
      $post_author = $_POST['post_author'];
    //   $post_date = $row['post_date'];
      $date = date('d-m-y');
      $post_content = $_POST['post_content'];
      $post_tags = $_POST['post_tags'];
      $post_status = $_POST['post_status'];
    //   $post_image = $row['post_image']; 
     
     $img = $_FILES['image']['name'];
     $img_temp = $_FILES['image']['tmp_name'];

     if (empty($img)) {
        $get_image_query = "SELECT * FROM posts WHERE post_id = $post_to_edit";
        $apply_post_image = mysqli_query($connection, $get_image_query);

        while($row = mysqli_fetch_assoc($apply_post_image)) {
            $img = $row['post_image']; 
        }
     }

     
     $edit_post = "UPDATE posts SET post_category_id='$post_category', post_title='$post_title',  
      post_author='$post_author', post_content='$post_content', post_status='$post_status',
      post_tags='$post_tags', post_image='$img', post_date=now() WHERE post_id = $post_to_edit";
    
    $edit_query = mysqli_query($connection, $edit_post);
    
    if (!$edit_query) {
        die('Error' . mysqli_error($connection));
    } 
      move_uploaded_file($img_temp, "../images/$img");  
      header('Location: posts.php');

  }  
?>


<form action="" method="post" enctype="multipart/form-data">

     <?php
                $post_to_edit = $_GET['edit'];
                $query = "SELECT * FROM posts WHERE post_id = $post_to_edit ";
                $post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($post)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image']; 
                    $post_category = $row['post_category_id'];

            ?>         
                          

<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>">
</div>

<div class="form-group">
<label for="title">Category</label>
<select name="post_cat_id" id="">

<?php 
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($categories)) {
        $cat_title = $row['cat_title']; 
        $cat_id = $row['cat_id'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
?>
</select>
<!-- <input type="text" class="form-control" name="" value="<?php echo $post_category;?>"> -->
</div>

<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="post_author" value="<?php echo $post_author;?>">
</div>

<div class="form-group">
<label for="title">Post Status</label>
<select name="post_status" id="">
    <option value="draft">draft</option>
    <option value="published">published</option>

</select>
<!-- <input type="text" class="form-control" name="post_status" value="<?php echo $post_status;?>"> -->
</div>

<div class="form-group">
<label for="title">Post Tags</label>
<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>">
</div>

<div class="form-group">
<img width=200px src="../images/<?php echo $post_image;?>" alt="">
<input type="file" name="image" value="">
</div>

<div class="form-group">
<label for="title">Post Content</label>
<input type="text" class="form-control" name="post_content" value="<?php echo $post_content;?>">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
</div>

                <?php } ?>
</form>