<?php 
    if (isset($_POST['publish'])) {

        $title = $_POST['post_title'];
        $cat_id = $_POST['post_cat_id'];
        $author = $_POST['post_author'];
        $status = $_POST['post_status'];
        $tags = $_POST['post_tags'];
        $content = $_POST['post_content'];
        $date = date('d-m-y');
        $image = $_FILES['image']['name'];

        print_r($cat_id);

        $insert = "INSERT INTO posts VALUES(NULL,$cat_id, '$title', '$author', now(), '$image','$content','$tags',0,'$status')";
        $publish = mysqli_query($connection, $insert);

        if (!$publish) {
            die(mysqli_error($connection));
        }

        $img = $_FILES['image']['name'];
        $img_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($img_temp, "../images/$img");
        header('Location: posts.php');

    }

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Post Title</label>
<input type="text" class="form-control" name="post_title">
</div>

<div class="form-group">
<label for="title">Category</label>
<select name="post_cat_id" id="">
    <?php 
    
    $query = "SELECT * FROM categories";
    $category_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($category_id)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
       
      echo "<option value='$cat_id'>$cat_title</option>";
    }
    ?>
</select>
<!-- <input type="text" class="form-control" name="post_cat_id"> -->
</div>

<div class="form-group">
<label for="title">Post Author</label>
<input type="text" class="form-control" name="post_author">
</div>

<div class="form-group">
<label for="title">Post Status</label>
<input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
<label for="title">Post Tags</label>
<input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
<label for="title">Image</label>
<input type="file" name="image">
</div>

<div class="form-group">
<label for="title">Post Content</label>
<input type="text" class="form-control" name="post_content">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="publish" value="Publish">
</div>

</form>