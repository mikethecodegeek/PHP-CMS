<?php 
require "path.php";
include $path . "header.php";

?>

<body>

    <div id="wrapper">

       <?php include $path . "nav.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-xs-6">

                <?php 
                   if (isset($_POST['submit'])) {
                       $new_category = $_POST['cat_title'];

                       if ($new_category) {
                           $add_category = "INSERT INTO categories(cat_title) VALUES('$new_category')";
                           $result = mysqli_query($connection, $add_category);

                           if (!$result) {
                               die("<h1>Error</h1>" . mysqli_error($connection));
                           } else {
                               echo "<h1>Added</h1>";
                           }
                       } else {
                           echo "Field cannot be empty";
                       }
                   }
                
                ?>    


                <form action="" method="post">
                    <div class="form-group">
                    <label for="cat_title">Add Category</label>
                        <input type="text" name="cat_title" class="form-control">
                    </div>

                    <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
                
                </div>

                <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                <tr>
                     <th>ID</th>
                     <th>Category</th>
                </tr>

                <?php 
                
                if (isset($_GET['delete'])) {
                    $get_id = $_GET['delete'];
                    if ($get_id !== 0) {
                    $delete_query = "DELETE FROM categories WHERE cat_id = {$get_id}";
                    $delete_result = mysqli_query($connection, $delete_query);
                    header('Location: categories.php');
                    }
                }
                
                ?>    


                <?php 
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
                         </tr>
                     <?php } ?>
                         </table>
                
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include $path . "footer.php"; ?>
