<?php 
require "path.php";
include $path . "header.php";

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
}

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
                            <small>Welcome <?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <?php 
                $query = "SELECT * FROM posts";
                $posts = mysqli_query($connection, $query);
                $num_posts = mysqli_num_rows($posts);
                
                ?>

                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $num_posts ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php 
                $query = "SELECT * FROM comments";
                $comments = mysqli_query($connection, $query);
                $num_comments = mysqli_num_rows($comments);
                
                ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $num_comments ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php 
                $query = "SELECT * FROM users";
                $users = mysqli_query($connection, $query);
                $num_users = mysqli_num_rows($users);
                
                ?>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $num_users ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php 
                $query = "SELECT * FROM categories";
                $categories = mysqli_query($connection, $query);
                $num_categories = mysqli_num_rows($categories);
                
                ?>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $num_categories ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


        <div class="row">
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
          <?php 
        
            $cats = "['Data','Posts','Comments', 'Users', 'Categories']";
            $vals = "['Data', {$num_posts}, {$num_comments}, {$num_users}, {$num_categories}]";

            // for ($i = 0; $i < 4; $i++) {
            //     echo "[ '$cats[$i]', $vals[$i] ]";
            // }
            
          echo "{$cats},{$vals}";
          
          ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',

          },
          
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: auto; height: 500px;"></div>
        </div>    

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include $path . "footer.php"; ?>
