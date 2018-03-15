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

                <?php delete_comment() ?>

                <?php 
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = 'defaul';
                    }

                    switch ($source) {

                        case "add_comment":
                        include "add_comment.php";
                        break;

                        case "edit_comment":
                        include "edit_comment.php";
                        break;

                        case "approve":
                        approve_comment();
                        break;

                        case "unapprove":
                        unapprove_comment();
                        break;

                        default:
                        include $path . 'show_all_comments.php';
                        break;
                    }
                
                
                ?>
                

             
              
               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include $path . "footer.php"; ?>
