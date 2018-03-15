
<?php 
  if (isset($_POST['edit_user'])) {
      $user_to_edit = $_GET['edit'];
      $username = $_POST['username'];
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $role = $_POST['user_role'];
      $email = $_POST['email'];
      $username = $_POST['username'];

      $img = $_FILES['image']['name'];

      if (empty($img)) {
        $get_image_query = "SELECT * FROM users WHERE user_id = $user_to_edit";
        $apply_post_image = mysqli_query($connection, $get_image_query);

        while($row = mysqli_fetch_assoc($apply_post_image)) {
            $img = $row['user_image']; 
        }
     }
    
     
     $edit_user = "UPDATE users SET username='$username', user_firstname='$firstname', 
     user_lastname='$lastname', user_role='$role', user_image='$img', email='$email' WHERE user_id = $user_to_edit";
    
    $edit_query = mysqli_query($connection, $edit_user);
    
    if (!$edit_query) {
        die('Error' . mysqli_error($connection));
    } 

    $img = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($img_temp, "../images/$img");
    header('Location: users.php');

  }  
?>


<form action="" method="post" enctype="multipart/form-data">

     <?php
                $user_to_edit = $_GET['edit'];
                $query = "SELECT * FROM users WHERE user_id = $user_to_edit ";
                $post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($post)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                    $email = $row['email'];

            ?>         
                          


<div class="form-group">
<label for="title">Username</label>
<input type="text" class="form-control" name="username" value='<?php echo $username ?>' >
</div>

<div class="form-group">
<label for="title">First Name</label>
<input type="text" class="form-control" name="first_name" value='<?php echo $user_firstname ?>'>
</div>

<div class="form-group">
<label for="title">Last Name</label>
<input type="text" class="form-control" name="last_name" value='<?php echo $user_lastname ?>'>
</div>

<div class="form-group">
<label for="title">User Role</label>
<select name="user_role" id="">
    <option value="user">user</option>
    <option value="admin">admin</option>
</select>
<!-- <input type="text" class="form-control" name="user_role"> -->
</div>

<div class="form-group">
<label for="title">User Image</label>
<img src="../images/<?php echo $image ?>" alt="">
<input type="file" name="image">
</div>

<div class="form-group">
<label for="title">Email</label>
<input type="email" class="form-control" name="email" value='<?php echo $email ?>'>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
</div>

                <?php } ?>
</form>