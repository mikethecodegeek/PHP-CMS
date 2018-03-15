<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php 

    session_start();

    if (isset($_POST['login'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       $username = mysqli_real_escape_string($connection, $username);
       $password = mysqli_real_escape_string($connection, $password);

  


       $query = "SELECT * FROM users WHERE username = '$username' ";
       $user_profile = mysqli_query($connection, $query);

  

       if (!$user_profile) {
           die(mysqli_error());
       }


       while ($row = mysqli_fetch_assoc($user_profile)) {       
          $user_id = $row['user_id'];
          $user_username = $row['username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_role = $row['user_role'];
          $user_email = $row['email'];
          $user_image = $row['user_image'];

    }
          if ($username == $user_username && $password == $user_password) {
              $_SESSION['user_id'] = $user_id;
              $_SESSION['username'] = $user_username;
              $_SESSION['firstname'] = $user_firstname;
              $_SESSION['lastname'] = $user_lastname;
              $_SESSION['role'] = $user_role;
              $_SESSION['email'] = $user_email;
              $_SESSION['image'] = $user_image;
              header("Location: ../admin/index.php");
        } else {  
            header("Location: ../index.php");
            
        }     

    }

?>