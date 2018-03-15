<?php 

function approve_comment() {
    global $connection;
    $comment_id = $_GET['id'];
    $query = "UPDATE comments SET comment_status='approved' WHERE comment_id=$comment_id";
    $result = mysqli_query($connection,$query);

    if (!$result) {
        echo mysqli_error($connection);
    }
    header('Location: comments.php');
}

function unapprove_comment() {
    global $connection;
    $comment_id = $_GET['id'];
    $query = "UPDATE comments SET comment_status='denied' WHERE comment_id=$comment_id";
    $result = mysqli_query($connection,$query);

    if (!$result) {
        echo mysqli_error($connection);
    }
    header('Location: comments.php');
}

function insert_categories() {

    global $connection;

    if (isset($_POST['submit'])) {
        $new_category = $_POST['cat_title'];

        if ($new_category) {
            $add_category = "INSERT INTO categories(cat_title) VALUES('$new_category')";
            $result = mysqli_query($connection, $add_category);

            if (!$result) {
                die("<h1>Error</h1>" . mysqli_error($connection));
            } else {
                echo "Category Added";
            }
        } else {
            echo "Field cannot be empty";
        }
    } 
}


function delete_category() {
    global $connection;
    if (isset($_GET['delete'])) {
        $get_id = $_GET['delete'];
        if ($get_id !== 0) {
        $delete_query = "DELETE FROM categories WHERE cat_id = {$get_id}";
        $delete_result = mysqli_query($connection, $delete_query);
        header('Location: categories.php');
        }
    }
}

function delete_post() {
    global $connection;
    if (isset($_GET['delete'])) {
        $get_post_id = $_GET['delete'];
        if ($get_post_id !== 0) {
        $delete_query = "DELETE FROM posts WHERE post_id = {$get_post_id}";
        $delete_result = mysqli_query($connection, $delete_query);
        header('Location: posts.php');
        }
    }
}

function delete_comment() {
    global $connection;
    if (isset($_GET['delete'])) {
        $get_comment_id = $_GET['delete'];
        if ($get_comment_id !== 0) {
        $delete_query = "DELETE FROM comments WHERE comment_id = {$get_comment_id}";
        $delete_result = mysqli_query($connection, $delete_query);
        header('Location: comments.php');
        }
    }
}

function delete_user() {
    global $connection;
    if (isset($_GET['delete'])) {
        $get_user_id = $_GET['delete'];
        if ($get_user_id !== 0) {
        $delete_query = "DELETE FROM users WHERE user_id = {$get_user_id}";
        $delete_result = mysqli_query($connection, $delete_query);
        header('Location: users.php');
        }
    }
}


function show_categories() {

    global $connection;
    $query = "SELECT * FROM categories";
    $categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($categories)) {
        $cat_title = $row['cat_title']; 
        $cat_id = $row['cat_id'];
        ?>

        
        <tr>
           <td><?php echo $cat_id ?></td>
           <td><?php echo $cat_title ?></td>
           <td><a href="categories.php?delete=<?php echo $cat_id ?>">Delete</a></td>
           <td><a href="categories.php?edit=<?php echo $cat_id ?>">Edit</a></td>
        </tr>
    <?php } 
    }


?>