<?php 
    if (isset($_POST['publish'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $role = $_POST['user_role'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];

        // print_r($cat_id);

        $insert = "INSERT INTO users VALUES(NULL,'$username', '$password', 
        '$firstname','$lastname','$role','$image','$email')";
        $publish = mysqli_query($connection, $insert);

        if (!$publish) {
            die(mysqli_error($connection));
        }

        $img = $_FILES['image']['name'];
        $img_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($img_temp, "../images/$img");
        header('Location: users.php');

    }

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Username</label>
<input type="text" class="form-control" name="username">
</div>

<div class="form-group">
<label for="title">Password</label>
<input type="password" class="form-control" name="password">
</div>

<div class="form-group">
<label for="title">First Name</label>
<input type="text" class="form-control" name="first_name">
</div>

<div class="form-group">
<label for="title">Last Name</label>
<input type="text" class="form-control" name="last_name">
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
<input type="file" name="image">
</div>

<div class="form-group">
<label for="title">Email</label>
<input type="email" class="form-control" name="email">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="publish" value="Publish">
</div>

</form>