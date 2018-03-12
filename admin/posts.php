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

                <?php delete_post() ?>

                <?php 
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = 'defaul';
                    }

                    switch ($source) {

                        case "add_post":
                        include "add_post.php";
                        break;

                        default:
                        include $path . 'show_all_posts.php';
                        break;
                    }
                
                
                ?>
                

             
              
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include $path . "footer.php"; ?>
