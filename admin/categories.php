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

                <?php insert_categories(); ?>    

                <form action="" method="post">
                    <div class="form-group">
                    <label for="cat_title">Add Category</label>
                        <input type="text" name="cat_title" class="form-control">
                    </div>

                    <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>

                    <?php    
                    if (isset($_GET['edit'])) {
                        include $path . "update_cats.php"; 
                    } ?>

                </div>

                <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                <tr>
                     <th>ID</th>
                     <th>Category</th>
                </tr>

                <?php delete_category(); ?>    


                <?php show_categories() ?>
                  
                         </table>
                
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include $path . "footer.php"; ?>
