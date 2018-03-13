<table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody>
                    <?php 
                    
                $query = "SELECT * FROM posts";
                $posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image']; 
                    $post_category_id = $row['post_category_id'];

            ?>          <tr>
                         <td><?php echo $post_id; ?></td>
                         <td><?php echo $post_author; ?></td>
                         <td><?php echo $post_title; ?></td>
                         <td><?php echo $post_category_id; ?></td>
                         <td><?php echo $post_status ?></td>
                         <td><img width=100px src="../images/<?php echo $post_image ?>"</td>
                         <td><?php echo $post_tags ?></td>
                         <td>Comment</td>
                         <td><?php echo $post_date ?></td> 
                         <td><a href="posts.php?delete=<?php echo $post_id ?>">Delete</a></td>
                         <td><a href="posts.php?source=edit_post&edit=<?php echo $post_id ?>">Edit</a></td> 
                        </tr>
                          

                <?php } ?>
                    </tbody>
                </table>