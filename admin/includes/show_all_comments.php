<table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Post ID</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>In Response To</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tbody>
                    <?php 
                    
                $query = "SELECT * FROM comments";
                $posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($posts)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                   
            ?>          <tr>
                         <td><?php echo $comment_id; ?></td>
                         <td><?php echo $comment_post_id; ?></td>
                         <td><?php echo $comment_author; ?></td>
                         <td><?php echo $comment_email; ?></td>


                        <?php 
                        
                        $post_query = "SELECT * FROM posts where post_id=$comment_post_id";
                        $this_post = mysqli_query($connection, $post_query);
        
                        while($row = mysqli_fetch_assoc($this_post)) {
                            $this_title = $row['post_title'];
                            
                            echo "<td><a href='../post.php?id={$comment_post_id}'>{$this_title}</a></td>" ;  
                        }
                        
                        ?>
                         
                         <td><?php echo $comment_status; ?></td>
                         <td><?php echo $comment_date; ?></td>

                        <?php 
                        
                        // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                        // $category_id = mysqli_query($connection, $query);
                    
                        // while($row = mysqli_fetch_assoc($category_id)) {
                        //     $cat_title = $row['cat_title']; 
                           
                        //   echo "<td> {$cat_title} </td>";
                        // }
                        ?>
                         <td><a href="comments.php?delete=<?php echo $comment_id ?>">Delete</a></td>
                         <td><a href="comments.php?source=edit_comment&edit=<?php echo $comment_id ?>">Edit</a></td> 
                         <td><a href="comments.php?source=approve&id=<?php echo $comment_id ?>">Approve</a></td>
                         <td><a href="comments.php?source=unapprove&id=<?php echo $comment_id ?>">Unapprove</a></td> 
                        </tr>
                          

                <?php } ?>
                    </tbody>
                </table>